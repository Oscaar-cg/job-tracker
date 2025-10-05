// select form element by id
const resumeForm = document.getElementById('resume_form');
//select file input
const resumeFile = document.getElementById('resume_file');
 //select textarea
 const resumeText = document.getElementById('resume_text');
 // select div to show analysis result
 const resultDetails = document.getElementById('result_details');

 //add event listener when user submits form
 resumeForm.addEventListener('submit', function(event){
    event.preventDefault();

    // get pasted txt' (del extra space)
    const pastedText = resumeText.ariaValueMax.trim();

    //get uploaded file first (trim enleve debut fin space)
    const file = resumeFile.files && resumeFile.files[0];

    //clear prev result
    resultDetails.innerHTML ='';
 });