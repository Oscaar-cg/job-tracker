// select form element by id
const resumeForm = document.getElementById('resume_form');
//select file input
const resumeFile = document.getElementById('resume_file');
//select textarea
const resumeText = document.getElementById('resume_text');
// select div to show analysis result
const resultDetails = document.getElementById('result_details');

const skillsList = [
  "JavaScript", "Python", "SQL", "HTML", "CSS", "React", "Node.js",
  "Excel", "Management", "Marketing", "Sales", "Communication",
  "Photoshop", "Illustrator", "UX", "UI", "Finance", "Leadership",
  "C++", "C#", "Java", "Kotlin", "Swift", "R", "Data Analysis",
  "Customer Service", "Project Management", "Problem Solving",
  "Machine Learning", "AI", "Database", "Networking", "Public Speaking"
];

// Function that finds skills in the text
function extractSkills(text, skills) {
  const found = [];
  for (const skill of skills) {
    const escapedSkill = skill.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    const regex = new RegExp("\\b" + escapedSkill + "\\b", "i");
    if (regex.test(text)) found.push(skill);
  }
  return found;
}

// Function that plays a sound
function playDing() {
  const audio = new Audio('sounds/bubble.wav');
  audio.volume = 0.3;
  audio.play().catch(err => console.log("Audio autoplay blocked:", err));
}

// Function that displays the results
function displaySkills(text) {
  const foundSkills = extractSkills(text, skillsList);

  if (foundSkills.length > 0) {
    const colors = ["#00bcd4", "#ff9800", "#8bc34a", "#f44336", "#9c27b0"];
    const skillTags = foundSkills.map((skill, i) =>
      `<span class="skill-tag" style="
          background:${colors[i % colors.length]};
          animation-delay:${i * 0.1}s;
      ">${skill}</span>`
    ).join('');

    resultDetails.innerHTML = `
      <h3 class="fade-in">✅ ${foundSkills.length} Skills detected:</h3>
      <div class="skills-container">${skillTags}</div>
    `;

    playDing();
  } else {
    resultDetails.innerHTML = `
      <h3>No skills detected.</h3>
      <p>Try with another resume or add more words in the dictionary.</p>
    `;
  }
}

// Add event listener when user submits form
resumeForm.addEventListener('submit', function (event) {
  event.preventDefault();

  const pastedText = resumeText.value.trim();
  const file = resumeFile.files && resumeFile.files[0];
  resultDetails.innerHTML = '';

  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      displaySkills(e.target.result);
    };
    reader.readAsText(file);
  } else {
    displaySkills(pastedText);
  }

  // Select job describ + compare buttton
  const jobText = document.getElementById('job_text');
  const compareButton = document.getElementById('compare_button');

  //Select elements display
  const matchScoreText = document.getElementById('match_score_text');
  const matchDetails = document.getElementById('match_details');
  const matchCanvas = document.getElementById('match_canvas');
  const ctx = document.getElementById('2d'); // canva "drawing"

  function compareResumeAndJob() {
    const resumeTextValue = resumeText.value.toLowerCase();
    const jobTextValue = jobText.value.toLowerCase();

    //extract skills from both text
    const resumeSkills = extractSkills(resumeTextValue, skillsList);
    const jobSkills  = extractSkills(jobTextValue, skillsList);
    
    // to find common skills
    const matchingSkills = resumeSkills.filter(skill => jobSkills.includes(skill));
    const missingSkills = jobSkills.filter(skill => !resumeSkills.includes(skill));

    //score calcul%
    const matchScore = jobSkills.length>0
    ?Math.round((matchingSkills.length/jobSkills.length)*100)
    : 0;

    //display result
    displayMatchResults(matchScore, matchingSkills, missingSkills);
  }
});
