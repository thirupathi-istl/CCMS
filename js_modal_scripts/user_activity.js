document.getElementById('dataSelect').addEventListener('change', function() {
    const selectedValue = this.value;
    const tables = document.querySelectorAll('.table-container');

    // Hide all tables
    tables.forEach(table => {
        table.style.display = 'none';
    });

    // Show the selected table
    const tableToShow = document.getElementById(selectedValue + '_table');
    if (tableToShow) {
        tableToShow.style.display = 'block';
    }
});

// Initialize with "Active All" table visible
document.getElementById('dataSelect').value = 'active_all';
document.getElementById('active_all_table').style.display = 'block';