document.getElementById('jobForm').addEventListener('submit', function(event) {
    event.preventDefault();

    
    const jobTitle = document.getElementById('jobTitle').value;
    const companyName = document.getElementById('companyName').value;
    const location = document.getElementById('location').value;
    const skillsRequired = document.getElementById('skillsRequired').value;
    const salary = document.getElementById('salary').value;
    const deadline = document.getElementById('deadline').value;

    
    const jobTable = document.getElementById('jobTable');
    const newRow = jobTable.insertRow();

    newRow.insertCell(0).textContent = jobTitle;
    newRow.insertCell(1).textContent = companyName;
    newRow.insertCell(2).textContent = salary;
    newRow.insertCell(3).textContent = deadline;

   
    document.getElementById('jobForm').reset();
});
