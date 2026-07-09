import pandas as pd
from PIL import Image, ImageDraw, ImageFont
import qrcode
import os
import textwrap
from PIL import ImageFont


# -----------------------------
# CONFIG
# -----------------------------
TEMPLATE = "PSA ID 2026.png"
DATA_FILE = "members.xlsx"     # or members.xlsx
OUTPUT_DIR = "generated_ids"

os.makedirs(OUTPUT_DIR, exist_ok=True)

# Fonts

FONT_BOLD = r"C:\Windows\Fonts\arialbd.ttf"
FONT_REGULAR = r"C:\Windows\Fonts\arial.ttf"

NAME_FONT = ImageFont.truetype(FONT_BOLD, 50)
CHAPTER_FONT = ImageFont.truetype(FONT_BOLD, 40)
ID_FONT = ImageFont.truetype(FONT_BOLD, 28)

# -----------------------------
# LOAD DATA
# -----------------------------
if DATA_FILE.endswith(".xlsx"):
    df = pd.read_excel(DATA_FILE)
else:
    df = pd.read_csv(DATA_FILE)

# -----------------------------
# GENERATE IDS
# -----------------------------
for _, row in df.iterrows():

    card = Image.open(TEMPLATE).convert("RGB")
    draw = ImageDraw.Draw(card)

    width, height = card.size

    fullname = str(row["name"]).upper()
    chapter = str(row["chapter"])
    psa_id = f"{int(row['psa_id']):04d}"    
    # --------------------------------
    # NAME
    # --------------------------------

    name_area_top = 340
    name_area_bottom = 540
    name_area_width = width - 60  # 30px margin on each side

    font_size = 55
    min_font_size = 25

    while font_size >= min_font_size:
        font = ImageFont.truetype(FONT_BOLD, font_size)

        # Build wrapped text based on actual pixel width
        words = fullname.split()
        lines = []
        current = ""

        for word in words:
            test = current + " " + word if current else word

            bbox = draw.textbbox((0, 0), test, font=font)

            if bbox[2] - bbox[0] <= name_area_width:
                current = test
            else:
                lines.append(current)
                current = word

        if current:
            lines.append(current)

        wrapped_name = "\n".join(lines)

        bbox = draw.multiline_textbbox(
            (0, 0),
            wrapped_name,
            font=font,
            align="center",
            spacing=10
        )

        text_width = bbox[2] - bbox[0]
        text_height = bbox[3] - bbox[1]

        if (
            text_width <= name_area_width and
            text_height <= (name_area_bottom - name_area_top)
        ):
            break

        font_size -= 2

    # Center horizontally
    x = (width - text_width) / 2

    # Center vertically inside name area
    y = name_area_top + (
        (name_area_bottom - name_area_top - text_height) / 2
    )

    draw.multiline_text(
        (x, y),
        wrapped_name,
        font=font,
        fill="black",
        align="center",
        spacing=10
    )

    # --------------------------------
    # QR CODE
    # --------------------------------
    qr = qrcode.make(psa_id)
    qr = qr.resize((320, 320))

    qr_x = (width - 320) // 2
    qr_y = 540

    card.paste(qr, (qr_x, qr_y))

    # --------------------------------
    # CHAPTER
    # --------------------------------
    bbox = draw.textbbox(
        (0, 0),
        chapter,
        font=CHAPTER_FONT
    )

    chapter_width = bbox[2] - bbox[0]

    draw.text(
        ((width - chapter_width) / 2, 875),
        chapter,
        font=CHAPTER_FONT,
        fill="black"
    )

    # --------------------------------
    # PSA ID NUMBER
    # --------------------------------
    id_text = f"PSA ID NO: {psa_id}"

    bbox = draw.textbbox(
        (0, 0),
        id_text,
        font=ID_FONT
    )

    id_width = bbox[2] - bbox[0]

    draw.text(
        ((width - id_width) / 2, 955),
        id_text,
        font=ID_FONT,
        fill="white"
    )

    # --------------------------------
    # SAVE
    # --------------------------------
    safe_name = "".join(
        c for c in fullname if c.isalnum() or c in (" ", "_")
    ).strip()

    output_file = os.path.join(
        OUTPUT_DIR,
        f"{psa_id}_{safe_name}.png"
    )

    card.save(output_file)

    print(f"Created: {output_file}")