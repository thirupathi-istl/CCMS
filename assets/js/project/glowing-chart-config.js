initializeDateRangePicker("#date-range", 90);
const today = new Date();
const sevenDaysAgo = new Date(today);
sevenDaysAgo.setDate(today.getDate() - 7);
const formattedToday = today.toISOString().split('T')[0];
const formattedSevenDaysAgo = sevenDaysAgo.toISOString().split('T')[0];

let device_id = localStorage.getItem("SELECTED_ID");
if (!device_id) {
    device_id = document.getElementById('device_id').value;
}

load_chart(device_id);
let device_id_list=document.getElementById('device_id');
device_id_list.addEventListener('change', function() {
    device_id = document.getElementById('device_id').value;
    load_chart(device_id);
    refresh_data();
});

setTimeout(refresh_data, 50);
setInterval(refresh_data, 20000);
function refresh_data() {
    if (typeof update_frame_time === "function") {
        device_id = document.getElementById('device_id').value;
        update_frame_time(device_id);
    } 
}

function getSelectedDateRange() {
    const selectedDates = window.fp.selectedDates;
    if (selectedDates.length === 2) {
        const [startDate, endDate] = selectedDates;
        return {
            startDate: startDate,
            endDate: endDate
        };
    } else {
        return null; 
    }
}

function load_chart(device_id)
{

    updateChart("LATEST", device_id)
   // fetchPieChartData(endDate, device_id);
} 


// Ensure the plugin is registered (for module environments)
/*if (typeof Chart !== 'undefined') {
    Chart.register(ChartZoom); // For plugin version 1.x
}
*/
// Get context of the canvas element we want to select
var ctx = document.getElementById('stackedPhaseChart').getContext('2d');

// Sample data for the last 10 days
var last10Days = [];

// Glowing and non-glowing hours for each phase
var phaseR_glowingHours = [ ];
var phaseR_nonGlowingHours = [ ];

var phaseY_glowingHours = [ ];
var phaseY_nonGlowingHours = [ ];

var phaseB_glowingHours = [];
var phaseB_nonGlowingHours = [];

var activeHours = [];
var inactiveHours = [];

// Create the stacked bar chart
var stackedPhaseChart = new Chart(ctx, {
    type: 'bar', // Bar chart
    data: {
        labels: last10Days, // Labels for x-axis (last 10 days)
        datasets: [
        {
            label: 'Total Active Hours',
            data: activeHours,
            backgroundColor: 'rgba(5, 153, 0, 0.8)',
            borderColor: 'rgba(5, 153, 0, 1)',
            borderWidth: 1,
            stack: 'Active Hours'
        },
        {
            label: 'Total InActive Hours',
            data: inactiveHours,
            backgroundColor: 'rgba(192, 192, 192, 0.2)',
            borderColor: 'rgba(192, 192, 192, 0.5)',
            borderWidth: 1,
            stack: 'Active Hours'
        },
        {
            label: 'Glowing Hours (Phase A)',
            data: phaseR_glowingHours,
            backgroundColor: 'rgba(255, 71, 71, 0.8)',
            borderColor: 'rgba(255, 71, 71, 1)',
            borderWidth: 1,
            stack: 'Phase A'
        },
        {
            label: 'Non-Glowing Hours (Phase A)',
            data: phaseR_nonGlowingHours,
            backgroundColor: 'rgba(192, 192, 192, 0.2)',
            borderColor: 'rgba(192, 192, 192, 0.5)',
            borderWidth: 1,
            stack: 'Phase A'
        },
        {
            label: 'Glowing Hours (Phase B)',
            data: phaseY_glowingHours,
            backgroundColor: 'rgba(255, 140, 0, 0.6)',
            borderColor: 'rgba(255, 140, 0, 1)',
            borderWidth: 1,
            stack: 'Phase B'
        },
        {
            label: 'Non-Glowing Hours (Phase B)',
            data: phaseY_nonGlowingHours,
            backgroundColor: 'rgba(192, 192, 192, 0.2)',
            borderColor: 'rgba(192, 192, 192, 0.5)',
            borderWidth: 1,
            stack: 'Phase B'
        },
        {
            label: 'Glowing Hours (Phase C)',
            data: phaseB_glowingHours,
            backgroundColor: 'rgba(30, 144, 255, 0.6)',
            borderColor: 'rgba(30, 144, 255, 1)',
            borderWidth: 1,
            stack: 'Phase C'
        },
        {
            label: 'Non-Glowing Hours (Phase C)',
            data: phaseB_nonGlowingHours,
            backgroundColor: 'rgba(192, 192, 192, 0.2)',
            borderColor: 'rgba(192, 192, 192, 0.5)',
            borderWidth: 1,
            stack: 'Phase C'
        }
        ]
    },
    options: {
        maintainAspectRatio: false, // Disable automatic aspect ratio for better height control
        scales: {
            x: {
                stacked: true, // Group bars by day, but stack for each phase
                title: {
                    display: true,
                    text: 'Days'
                }
            },
            y: {
                stacked: true, // Stack bars on the y-axis
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Hours'
                }
            }
        },
        responsive: true,
        plugins: {
            zoom: {
                pan: {
                    enabled: true,
                    mode: 'x' // Pan in the x-direction
                },
                zoom: {
                    enabled: true,
                    wheel: {
                        enabled: true,
                    },
                    drag: {
                        enabled: true,
                    },

                    mode: 'x',  // Zoom in the x-direction
                    speed: 0.1  // Adjust zooming speed (optional)
                }
            },
            legend: {
                position: 'top',
            }

        }
    }
});

function updateChart(type, device_id) {

    $.ajax({
        url: '../device-reports/code/glowing-nonglowing-hours.php', 
        method: 'POST',
        data: {
            TYPE: type,
            D_ID: device_id
        },
        success: function(response) {
            chart_update(response);
        }
    });
}
function updateChartCustom(type,startDay, endDay, device_id) {



    $.ajax({
        url: '../device-reports/code/glowing-nonglowing-hours.php', 
        method: 'POST',
        data: {
            TYPE: type,
            D_ID: device_id,
            STARTDATE: startDay,
            ENDDATE: endDay
        },
        success: function(response) {
            chart_update(response);
        }
    });
}
function chart_update(response_data)
{
    var data = JSON.parse(response_data);


    if(data.length > 0)
    {
        var labels = data.map(item => item.day);
        var phaseR_glowing = data.map(item => parseFloat(item.glowing_hours_phaseR));
        var phaseR_nonGlowing = data.map(item => parseFloat(item.non_glowing_hours_phaseR));
        var phaseY_glowing = data.map(item => parseFloat(item.glowing_hours_phaseY));
        var phaseY_nonGlowing = data.map(item => parseFloat(item.non_glowing_hours_phaseY));
        var phaseB_glowing = data.map(item => parseFloat(item.glowing_hours_phaseB));
        var phaseB_nonGlowing = data.map(item => parseFloat(item.non_glowing_hours_phaseB));
        var TotalActiveHours = data.map(item => parseFloat(item.TotalActiveHours));
        var TotalInActiveHours = data.map(item => parseFloat(item.TotalInActiveHours));

            // Update chart data
        stackedPhaseChart.data.labels = labels;
        stackedPhaseChart.data.datasets[0].data = TotalActiveHours;
        stackedPhaseChart.data.datasets[1].data = TotalInActiveHours;

        stackedPhaseChart.data.datasets[2].data = phaseR_glowing;
        stackedPhaseChart.data.datasets[3].data = phaseR_nonGlowing;
        stackedPhaseChart.data.datasets[4].data = phaseY_glowing;
        stackedPhaseChart.data.datasets[5].data = phaseY_nonGlowing;
        stackedPhaseChart.data.datasets[6].data = phaseB_glowing;
        stackedPhaseChart.data.datasets[7].data = phaseB_nonGlowing;

        stackedPhaseChart.update();
        document.getElementById('errorMessage').style.display = 'none';
    }
    else
    {
      document.getElementById('errorMessage').innerText = 'No data available for the selected date range.';
      document.getElementById('errorMessage').style.display = 'block';
  }
}

// Event listener for selecting options
document.getElementById('typeSelect').addEventListener('change', function() {

    var selectedType = this.value;  // Get selected type (e.g., last week, current week)
    var selectedId = document.getElementById('device_id').value;  // Get selected ID
    const customRangeContainer = document.getElementById('customRangeContainer');
    if (selectedType === 'CUSTOMRANGE') {

        customRangeContainer.style.display = 'block';
    }
    else
    {
        customRangeContainer.style.display = 'none';
        updateChart(selectedType, selectedId);  
    }
});

document.getElementById('customRangeButton').addEventListener('click', function () {
    const dateRange = getSelectedDateRange();
    device_id = document.getElementById('device_id').value;
    if (dateRange) {
        const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        const startDateFormatted = dateRange.startDate.toLocaleDateString(undefined, options);
        const endDateFormatted = dateRange.endDate.toLocaleDateString(undefined, options);

        updateChartCustom("CUSTOMRANGE", startDateFormatted, endDateFormatted,  device_id );

    } 
    else
    {
        alert("Please select date range");
    }
});