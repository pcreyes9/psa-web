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
    `Department / training unit: ${field("department")}`,
    `Country / region: ${field("country")}`,
    `City: ${field("city") || "TBD"}`,
    `Program director / coordinator: ${field("programDirector") || "TBD"}`,
    `Team entry from program: ${field("teamEntry")}`,
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
    "Initial Scenario Submission",
    "Registration deadline: June 20, 2026",
    "Required worksheet sections: 1, 2, 3, and 8",
    "Sections 4-7: Not required at registration stage",
    "",
    "Section 1 - Scenario Developers",
    `Topic: ${field("topic")}`,
    `Title: ${field("scenarioTitle")}`,
    `Developer(s): ${field("scenarioDevelopers")}`,
    `Brief description: ${field("scenarioBrief") || "TBD"}`,
    "",
    "Section 2 - Scenario Demographics",
    `Target learners: ${field("targetLearners")}`,
    `Simulation location: ${field("simulationLocation")}`,
    `Learner preparation: ${field("learnerPreparation") || "TBD"}`,
    "",
    "Section 3 - Curriculum Integration",
    `Educational goal: ${field("educationalGoal")}`,
    `Objectives: ${field("objectives")}`,
    `Case summary: ${field("caseSummary")}`,
    `References: ${field("references") || "TBD"}`,
    "",
    "Section 8 - Supporting Documents and Debriefing Guide",
    `Summary: ${field("debriefingGuide")}`,
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
