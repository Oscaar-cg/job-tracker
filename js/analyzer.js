// select form element by id
const resumeForm = document.getElementById('resume_form');
//select file input
const resumeFile = document.getElementById('resume_file');
//select textarea
const resumeText = document.getElementById('resume_text');
// select div to show analysis result
const resultDetails = document.getElementById('result_details');

let skillsList = [];

fetch('data/esco_skills.json')
.then(response => response.json())
.then(data => {
  skillsList = data;
  console.log("ESCO skills loaded:", skillsList.length);
})

//To normalyze text(simplify, plurals, abreviation, lowercase)
// Function to normalize text (simplify plurals, abbreviations, lowercase)
function normalizeText(text) {
  return text
    .toLowerCase() // met tout en minuscules
    .replace(/\bapplications\b/g, "application")
    .replace(/\bdevelopers\b/g, "developer")
    .replace(/\bengineers?\b/g, "engineer") // singulier ou pluriel
    .replace(/\bstudents?\b/g, "student")
    .replace(/\btechnologies\b/g, "technology")
    .replace(/\bskills?\b/g, "skill")
    .replace(/\bml\b/g, "machine learning")
    .replace(/\bjs\b/g, "javascript")
    .replace(/\bux\/ui\b/g, "ux ui")
    .replace(/\boop\b/g, "object oriented programming");
}

// tell PDF where to find the worker file
pdfjsLib.GlobalWorkerOptions.workerSrc = 'js/pdfjs/pdf.worker.min.js';

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
  const foundSkills = extractSkills(normalizeText(text), skillsList);

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
    const fileType = file.type;

    // if pdf file
    if (fileType === "application/pdf") {
      const fileReader = new FileReader();
      fileReader.onload = async function () {
        const typedarray = new Uint8Array(this.result);

        //load pdf document
        const pdf = await pdfjsLib.getDocument(typedarray).promise;
        let text = "";

        //Read each pdf pages
        for (let i = 1; i <= pdf.numPages; i++) {
          const page = await pdf.getPage(i);
          const content = await page.getTextContent();
          const pageText = content.items.map(item => item.str).join(" ");
          text += pageText + " ";
        }
        console.log("✅ PDF loaded. Total characters:", text.length);

        // store the extracted text inside the textarea for later comparison
        resumeText.value = text;

        displaySkills(text);
      };

      fileReader.readAsArrayBuffer(file);
    } 
    // 📄 Si c’est un fichier texte classique (.txt, .docx, etc.)
    else {
      const reader = new FileReader();
      reader.onload = function (e) {
        displaySkills(e.target.result);
      };
      reader.readAsText(file);
    }
  } else {
    displaySkills(pastedText);
  }
});

// Select job describ + compare buttton
const jobText = document.getElementById('job_text');
const compareButton = document.getElementById('compare_button');

//Select elements display
const matchScoreText = document.getElementById('match_score_text');
const matchDetails = document.getElementById('match_details');
const matchCanvas = document.getElementById('match_circle');
const ctx = matchCanvas.getContext('2d'); // canva "drawing"

function compareResumeAndJob() {
  const resumeTextValue = normalizeText(resumeText.value);
  const jobTextValue = normalizeText(jobText.value);

  //extract skills from both text
  const resumeSkills = extractSkills(resumeTextValue, skillsList);
  const jobSkills  = extractSkills(jobTextValue, skillsList);
  
  // to find common skills
  const matchingSkills = resumeSkills.filter(skill => jobSkills.includes(skill));
  const missingSkills = jobSkills.filter(skill => !resumeSkills.includes(skill));

  //score calcul
  const matchScore = jobSkills.length > 0
  ? Math.round((matchingSkills.length / jobSkills.length) * 100)
  : 0;

  //display result
  displayMatchResults(matchScore, matchingSkills, missingSkills);
}

function displayMatchResults(score, matchingSkills, missingSkills) {
  // delete canva before redrawing
  ctx.clearRect(0, 0, matchCanvas.width, matchCanvas.height);

  //draw background circle
  ctx.beginPath();
  ctx.arc(100, 100, 80, 0, 2 * Math.PI);
  ctx.strokeStyle = "#ddd";
  ctx.lineWidth = 15;
  ctx.stroke();

  //Circle score
  const endAngle = (score / 100) * 2 * Math.PI;
  ctx.beginPath();
  ctx.arc(100, 100, 80, -0.5 * Math.PI, endAngle - 0.5 * Math.PI);

  let color;
  if (score >= 70) {
    color = "#4CAF50";
  } else if (score >= 40) {
    color = "#FFC107";
  } else {
    color = "#F44336";
  }

  ctx.strokeStyle = color;
  ctx.lineWidth = 15;
  ctx.stroke();

  //display score
  ctx.font = "20px Arial";
  ctx.fillStyle = "#000";
  ctx.textAlign = "center";
  ctx.fillText(score + "%", 100, 105);

  //show list
  matchScoreText.textContent = `Match Score: ${score}%`;
  matchScoreText.style.color = color;
  matchScoreText.style.fontWeight = "bold";

  matchDetails.innerHTML = `
    <p><strong> ✅ Matching Skills:</strong> ${matchingSkills.join(", ") || "None"}</p>
    <p><strong>⚠️ Missing Skills:</strong> ${missingSkills.join(", ") || "None"}</p>
  `;
}
// Hide textarea when a PDF is uploaded, show it back if removed
resumeFile.addEventListener('change', function () {
  const resumeTextArea = document.getElementById('resume_text');

  if (resumeFile.files && resumeFile.files.length > 0) {
    const fileType = resumeFile.files[0].type;
    if (fileType === "application/pdf") {
      resumeTextArea.style.display = "none"; // hide textarea
    } else {
      resumeTextArea.style.display = "block"; // show again for other file types
    }
  } else {
    resumeTextArea.style.display = "block"; // show again if file removed
  }
});

// Show message when a PDF is successfully uploaded
resumeFile.addEventListener('change', function () {
  const uploadMsg = document.getElementById('upload_message');
  const file = resumeFile.files && resumeFile.files[0];
  if (file) {
    if (file.type === "application/pdf") {
      uploadMsg.textContent = "📄 Resume PDF uploaded successfully!";
      uploadMsg.style.color = "#4CAF50";
    } else {
      uploadMsg.textContent = "";
    }
  } else {
    uploadMsg.textContent = "";
  }
});


compareButton.addEventListener('click', compareResumeAndJob);