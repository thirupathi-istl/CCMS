<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Range Picker with Adjustable Day Limit</title>
    <!-- Include flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Include custom CSS -->
    <style>
        /* Custom styles for the calendar */
        .flatpickr-calendar {
            background-color: #f0f0f0; /* Light gray background */
            border: 1px solid #ccc; /* Light border */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
            position: absolute; /* Required for positioning the clear button */
        }
        
        .flatpickr-calendar .clear-button {
            display: block; /* Make button block-level */
            background-color: #ff4d4d; /* Red background for the button */
            color: white; /* White text color */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            padding: 5px 10px; /* Padding for the button */
            cursor: pointer; /* Pointer cursor on hover */
            font-size: 14px; /* Font size */
            text-align: center; /* Center text */
            margin: 10px auto; /* Center button horizontally and add margin */
        }
        
        .flatpickr-calendar .clear-button:hover {
            background-color: #cc0000; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <h1>Select a Date Range</h1>
    <form>
        <label for="date-range">Date Range:</label>
        <input type="text" id="date-range" name="date-range" placeholder="Select Date Range">
        <input type="submit" value="Submit">
    </form>

    <!-- Include flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // Number of days for date range constraint
        const DAYS_LIMIT = 4;

        let firstSelectedDate = null;
        let currentStartDate = null;

        const fp = flatpickr("#date-range", {
            mode: "range",
            dateFormat: "Y-m-d",
            onChange: function(selectedDates) {
                // Update the constraints based on the new start date
                if (selectedDates.length === 1) {
                    // Set new start date and update constraints
                    currentStartDate = selectedDates[0];
                    firstSelectedDate = currentStartDate; // Reset the first selected date
                } else if (selectedDates.length === 2) {
                    // If two dates are selected
                    const [startDate, endDate] = selectedDates;
                    const differenceInDays = Math.floor((endDate - startDate) / (24 * 60 * 60 * 1000));

                    if (differenceInDays > DAYS_LIMIT) {
                        // Adjust end date if the difference exceeds DAYS_LIMIT
                        fp.setDate([startDate, new Date(startDate.getTime() + (DAYS_LIMIT * 24 * 60 * 60 * 1000))], true);
                    }
                    
                    // Update the current start date
                    currentStartDate = startDate;
                }
                
                // Calculate the min and max dates based on the current start date
                if (currentStartDate) {
                    const minDate = new Date(currentStartDate.getTime() - (DAYS_LIMIT * 24 * 60 * 60 * 1000));
                    const maxDate = new Date(currentStartDate.getTime() + (DAYS_LIMIT * 24 * 60 * 60 * 1000));
                    fp.set('minDate', minDate);
                    fp.set('maxDate', maxDate);
                }
            },
            onReady: function() {
                // Create and add the clear button when flatpickr is ready
                const calendarContainer = document.querySelector('.flatpickr-calendar');
                if (calendarContainer && !document.querySelector('.clear-button')) {
                    const clearButton = document.createElement('button');
                    clearButton.type = 'button';
                    clearButton.textContent = 'Clear';
                    clearButton.className = 'clear-button';
                    clearButton.addEventListener('click', function() {
                        fp.clear(); // Clear the selected dates
                        firstSelectedDate = null; // Reset the first selected date
                        currentStartDate = null; // Reset the current start date
                        resetConstraints(); // Reset constraints
                    });
                    calendarContainer.appendChild(clearButton);
                }
            }
        });

        function resetConstraints() {
            // Reset min and max date constraints
            fp.set('minDate', null);
            fp.set('maxDate', null);
        }
    </script>
</body>
</html>
