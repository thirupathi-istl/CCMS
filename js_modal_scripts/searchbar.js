//search script
function searchTable() {
    var input = document.getElementById("searchInput").value.toLowerCase().trim();
    var rows = document.querySelectorAll(".resulttable tbody tr");

    var matchFound = false;

    rows.forEach(row => {
        var cells = row.querySelectorAll("td");
        var match = false;

        cells.forEach(cell => {
            if (cell.innerText.toLowerCase().includes(input)) {
                match = true;
            }
        });

        if (match) {
            row.style.display = ""; // Show matching rows
            row.classList.add("highlight");
            matchFound = true;
        } else {
            row.style.display = "none"; // Hide non-matching rows
            row.classList.remove("highlight");
        }
    });

    if (!matchFound) {
        alert("No Data Match");
        rows.forEach(row => {
            row.style.display = ""; // Show all rows
        });
    }
}