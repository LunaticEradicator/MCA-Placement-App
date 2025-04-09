document.getElementById('testForm').addEventListener('submit', function(event) {
    event.preventDefault();

   
    const testName = document.getElementById('testName').value;
    const testDeadline = document.getElementById('testDeadline').value;

   
    const testTable = document.getElementById('testTable');
    const newRow = testTable.insertRow();

    newRow.insertCell(0).textContent = testName;
    newRow.insertCell(1).textContent = testDeadline;

    
    document.getElementById('testForm').reset();
});
