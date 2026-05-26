const form = document.querySelector("#team-form");
const note = document.querySelector("#form-note");
const summaryPanel = document.querySelector("#summary-panel");
const summaryOutput = document.querySelector("#summary-output");
const copyButton = document.querySelector("#copy-summary");

const field = (name) => form.elements[name]?.value.trim() || "";

function setNote(message, isError = false) {
  note.textContent = message;
  note.classList.toggle("is-error", isError);
}

function memberLine(index) {
  const name = field(`member${index}`);
  const year = field(`member${index}Year`);
  if (!name && !year) return "";
  return `${index}. ${name || "Name TBD"}${year ? ` (${year})` : ""}`;
}

function buildSummary() {
  const members = [1, 2, 3, 4].map(memberLine).filter(Boolean).join("\n");

  return [
    "SIM WARS TRILOGY Philippines 2026 - Registration Summary",
    "",
    `Team name: ${field("teamName")}`,
    `Training program / institution: ${field("program")}`,
    `Country / region: ${field("country")}`,
    `City: ${field("city") || "TBD"}`,
    "",
    "Coach",
    `Name: ${field("coachName")}`,
    `Title / role: ${field("coachTitle") || "TBD"}`,
    `Email: ${field("coachEmail")}`,
    `Mobile: ${field("coachPhone")}`,
    "",
    "Trainees",
    members,
    "",
    "Scenario",
    `Topic: ${field("topic")}`,
    `Title: ${field("scenarioTitle")}`,
    `Brief description: ${field("scenarioBrief") || "TBD"}`,
    "",
    "Official portal: https://forms.gle/fj1nsHf8gjn2KhcQ6",
  ].join("\n");
}

form.addEventListener("submit", (event) => {
  event.preventDefault();
  form.classList.add("was-submitted");

  if (!form.checkValidity()) {
    form.reportValidity();
    setNote("Please complete the required fields before generating the summary.", true);
    return;
  }

  summaryOutput.value = buildSummary();
  summaryPanel.hidden = false;
  setNote("Your registration summary is ready. Copy it for team review, then submit through the official form.");
  summaryOutput.focus();
});

copyButton.addEventListener("click", async () => {
  if (!summaryOutput.value) {
    setNote("Please generate a registration summary first.", true);
    return;
  }

  try {
    await navigator.clipboard.writeText(summaryOutput.value);
    setNote("Registration summary copied.");
  } catch {
    summaryOutput.select();
    document.execCommand("copy");
    setNote("Registration summary copied.");
  }
});
