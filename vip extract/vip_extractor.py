import pandas as pd
import pyodbc
import os


# === CONFIG ===
# Get the folder where the script is located
script_dir = os.path.dirname(os.path.abspath(__file__))

# Build full path to Excel file
excel_file = os.path.join(script_dir, 'vips_MC2026.xlsx')
excel_column_name = 'member_id_no'   # change to your column name

output_file = 'result.xlsx'

# SQL Server connection
conn_str = 'DRIVER={SQL Server};Server=PSASERVER;Database=PSADBLIVE;UID=sa;PWD=p$a@dm1n'


# === READ EXCEL ===
df = pd.read_excel(excel_file)

# Get values from column
print(df.columns.tolist())
values = df[excel_column_name].dropna().tolist()

# Remove duplicates (optional but recommended)
values = list(set(values))

# === CONNECT TO SQL ===
conn = pyodbc.connect(conn_str)

# === BUILD QUERY ===
placeholders = ','.join(['?'] * len(values))

query = f"""
SELECT member_id_no, mem_prc_no
FROM member
WHERE member_id_no IN ({placeholders})
"""

result_df = pd.read_sql(query, conn, params=values)

# === OPTIONAL: MERGE BACK TO ORIGINAL EXCEL ===
merged_df = df.merge(result_df, on='member_id_no', how='left')

# === SAVE OUTPUT ===
merged_df.to_csv('result.csv', index=False)

print("Done! Output saved to:", output_file)

# Close connection
conn.close()