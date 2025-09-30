//selecting html elements

//Form
const jobForm = document.getElementById('job-form');
// table
const jobList = document.getElementById('#job-list tbody');

//Function to add job
function addJob(event) {
    event.preventDefault(); //no refreshing page when submit

    //Get value entered in form fields
    const title = document.getElementById('job-title').value;
    const company = document.getElementById('company').value;
    const status = document.getElementById('status').value;

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
}