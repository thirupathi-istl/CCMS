
    
let userCount = 1;
function addUser() {
    const modal = new bootstrap.Modal(document.getElementById('adduser'));
    modal.show();
}

function addDevice() {
    const name = document.getElementById('userName').value;
    const role = document.getElementById('userRole').value;

    if (name && role) {
        const table = document.querySelector('.styled-table tbody');
        const newRow = table.insertRow();
        newRow.innerHTML =
            "<td>" + (++userCount) + "</td>" +
            "<td>" + name + "</td>" +
            "<td>" + role + "</td>" +
            "<td><i class='bi bi-trash-fill text-danger' onclick='deleteRow(this)'></i></td>" +
            "<td><button type='button' class='btn btn-primary' onclick='userview(this)'>Devices Handled</button></td>";
        clearForm();
        const modal = bootstrap.Modal.getInstance(document.getElementById('adduser'));
        modal.hide();
    }
}


function deleteRow(button) {
    const row = button.closest('tr');
    row.remove();
    updateSerialNumbers();
}

function updateSerialNumbers() {
    const table = document.querySelector('.styled-table tbody');
    userCount = 0;
    Array.from(table.rows).forEach((row, index) => {
        row.cells[0].innerText = ++userCount;
    });
}

function clearForm() {
    document.getElementById('userName').value = '';
    document.getElementById('userRole').value = '';
}

function userview(button) {
    const row = button.closest('tr');
    const cells = row.cells;
    
    // Assuming cells[0] is the S.No column, cells[1] is Name, and cells[2] is Role
    const name = cells[1].innerText;
    const role = cells[2].innerText;
    
    // Now you can populate the userview modal with this data
    const modalTitle = document.getElementById('addUserModalLabel');
    modalTitle.textContent = 'User Details';
    
    // Additional logic to populate the userview modal with relevant data
    // Example: Populate fields in userview modal with Name and Role
    
    // Show the userview modal
    const userviewModal = new bootstrap.Modal(document.getElementById('userview'));
    userviewModal.show();
}

function updatedata(){
    var updatedata=new bootstrap.Modal(document.getElementById("updatebutton")).show();
}

//update button script

function openUpdateModal() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    let selectedRow = null;

    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            selectedRow = checkbox.closest('tr');
        }
    });

    if (selectedRow) {
        const cells = selectedRow.cells;
        document.getElementById('devicename').value = cells[2].innerText; // Device Name
        document.getElementById('deviceid').value = cells[1].innerText; // Device ID
        document.getElementById('devicegroup').value = cells[3].innerText; // Group/Area

        const updateModal = new bootstrap.Modal(document.getElementById('updatebutton'));
        updateModal.show();
    } else {
        alert('Please select a row to update.');
    }
}

// Function to save the updated data
function saveUpdate() {
    const devicename = document.getElementById('devicename').value;
    const deviceid = document.getElementById('deviceid').value;
    const devicegroup = document.getElementById('devicegroup').value;

    if (devicename && deviceid && devicegroup) {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        let selectedRow = null;

        checkboxes.forEach((checkbox) => {
            if (checkbox.checked) {
                selectedRow = checkbox.closest('tr');
            }
        });

        if (selectedRow) {
            const cells = selectedRow.cells;
            cells[2].innerText = devicename; // Update Device Name
            cells[1].innerText = deviceid; // Update Device ID
            cells[3].innerText = devicegroup; // Update Group/Area

            const updateModal = bootstrap.Modal.getInstance(document.getElementById('updatebutton'));
            updateModal.hide();
        }
    } else {
        alert('Please fill in all fields.');
    }
}

//delete button script
function deleteSelectedRows() {
    const checkboxes = document.querySelectorAll('#userview input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            const row = checkbox.closest('tr');
            row.remove();
        }
    });
}

function addnewDevice(){
    var addnewDevice=new bootstrap.Modal(document.getElementById("addnewdevice")).show();
}

//add device button script

function addSelectedDevices() {
    // Select all checkboxes in the addnewdevice modal
    const checkboxes = document.querySelectorAll('#addnewdevice input[type="checkbox"]:checked');

    // Reference to the table body in userview modal
    const tableBody = document.querySelector('#userview table tbody');

    // Array to store rows to be removed
    const rowsToRemove = [];

    // Iterate over each checked checkbox
    checkboxes.forEach(checkbox => {
        // Get the closest row (parent <tr> of the checkbox)
        const row = checkbox.closest('tr');

        // Create a new row in the userview table
        const newRow = document.createElement('tr');

        // Clone each cell from the selected row in addnewdevice modal
        for (let i = 1; i < row.cells.length; i++) {
            const cell = document.createElement('td');
            cell.textContent = row.cells[i].textContent;
            newRow.appendChild(cell);
        }

        // Add checkbox (assuming it's the first column in userview modal)
        const selectCell = document.createElement('td');
        const newCheckbox = document.createElement('input');
        newCheckbox.type = 'checkbox';
        selectCell.appendChild(newCheckbox);
        newRow.insertBefore(selectCell, newRow.firstChild);

        // Append the new row to the table body in userview modal
        tableBody.appendChild(newRow);

        // Add the row to rowsToRemove array
        rowsToRemove.push(row);
    });

    // Remove selected rows from addnewdevice modal
    rowsToRemove.forEach(row => {
        row.remove();
    });

    // Close the addnewdevice modal
    const addNewDeviceModal = bootstrap.Modal.getInstance(document.getElementById('addnewdevice'));
    addNewDeviceModal.hide();
}
