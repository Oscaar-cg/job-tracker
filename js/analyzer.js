// select form element by id
const resumeForm = document.getElementById('resume_form');
//select file input
const resumeFile = document.getElementById('resume_file');
 //select textarea
 const resumeText = document.getElementById('resume_text');
 // select div to show analysis result
 const resultDetails = document.getElementById('result_details');

 const skillsList=[
  "JavaScript", "Python", "SQL", "HTML", "CSS", "React", "Node.js",
  "Excel", "Management", "Marketing", "Sales", "Communication",
  "Photoshop", "Illustrator", "UX", "UI", "Finance", "Leadership",
  "C++", "C#", "Java", "Kotlin", "Swift", "R", "Data Analysis",
  "Customer Service", "Project Management", "Problem Solving",
  "Machine Learning", "AI", "Database", "Networking", "Public Speaking"
 ];

 // Funtion that find skills in the txt

 function extractSkills(text, skills) {
  const found = [];

  for (const skill of skills) {
    console.log("Checking skill:", skill);
    // On échappe les caractères spéciaux comme +, #, etc.
    const escapedSkill = skill.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    const regex = new RegExp("\\b" + escapedSkill + "\\b", "i");
    if (regex.test(text)) {
      found.push(skill);
    }
  }
  
  return found;
}

  //Function that display the results
  function displaySkills(text) {
    console.log("🔍 Analyzing text...");

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
    <p id="analysis-complete" class="fade-in zoom-icon" style="animation-delay:0.8s;">🔍 Analysis complete!</p>
  `;

  playDing();

    } else {
      resultDetails.innerHTML = `
        <h3>skills not detected.</h3>
        <p>Try with another resume or add more words in the dictionary.</p>
      `;
      }
    }

    function playDing() {
      const audio = new Audio('sounds/bubble.wav');
      audio.volume = 0.3; //volume
      audio.play().catch(err=> console.log("Audio autoplay blocked:", err));

    }

 //add event listener when user submits form
 resumeForm.addEventListener('submit', function(event){
  console.log("🟢 Form submitted");
    event.preventDefault();

    // get pasted txt' (del extra space)
    const pastedText = resumeText.value.trim();

    //get uploaded file first (trim enleve debut fin space)
    const file = resumeFile.files && resumeFile.files[0];

    //clear prev result
    resultDetails.innerHTML ='';

    //verifier si fichier upload
    if(file) {
      console.log("📄 File detected:", file.name);

      const reader = new FileReader(); // create un lecteur de fichier

      reader.onload = function(e) {
         const fileText = e.target.result; // texte du fichier
         displaySkills(fileText); //Pour analyzer le contenue du fichier
      };
      reader.readAsText(file);
    }else{
      console.log("✏️ Text detected:", pastedText);

      displaySkills(pastedText); //analyze le texte collé
    }

    function lauchConfetti() {
      const colors = ["#00bcd4", "#ff9800", "#8bc34a", "#f44336", "#9c27b0"]
      
      for (let i=0; i <30; i++) {
        const confetti = document.createElement("div");
        confetti.classList.add("confetti");
    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
    confetti.style.left = Math.random() * 100 + "vw";
    confetti.style.animationDelay = Math.random() * 1 + "s";
    document.body.appendChild(confetti);

    // disparition après animation
    setTimeout(() => confetti.remove(), 3000);
  }
}
 });