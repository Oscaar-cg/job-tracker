//selecting html elements

//Form
const jobForm = document.getElementById('jobForm');
// table
const jobList = document.querySelector('#job-list tbody');

//Function to add job
function addJob(event) {
    event.preventDefault(); //no refreshing page when submit

    //Get value entered in form fields
    const title = document.getElementById('job-title').value;
    const company = document.getElementById('company').value;
    const status = document.getElementById('status').value;

    //Send data to PHP server
    fetch("php/insert_job.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `title=${encodeURIComponent(title)}&company=${encodeURIComponent(company)}&status=${encodeURIComponent(status)}`
    })

    //Server response handling
    .then(response => response.text())
    .then(data => {
        alert(data);

        //Create new table row element<tr>
        const row = document.createElement('tr');

        // fill row w/ table cell & delete button
        row.innerHTML = `
        <td>${title}</td>
        <td>${company}</td>
        <td>${status}</td>
        <td><button class="delete-btn">Delete</button></td>
        `;

        //Add new row to table
        jobList.appendChild(row);

        // Reset form, user can add another job
        jobForm.reset();
    })
    .catch(error => console.error("Error :", error));
}

// Fn to delete a job
function deleteJob(event) {
    if(event.target.classList.contains('delete-btn')) {
        const row = event.target.parentElement.parentElement;
        row.remove();
    }
}

//Event Listeners
jobForm.addEventListener('submit', addJob);
jobList.addEventListener('click', deleteJob);