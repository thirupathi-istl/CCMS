var group_name=localStorage.getItem("GroupNameValue")
if(group_name==""||group_name==null)
{
	group_name="ALL";
}
update_switchPoints_status(group_name);

let group_list = document.getElementById('group-list');

group_list.addEventListener('change', function() {
	let selectedValue = group_list.value;
	update_switchPoints_status(selectedValue);
});
function update_switchPoints_status(group_id){
        // AJAX request when the page is loaded or when an event triggers it
	if (group_id !== "" && group_id !== null) {
		$("#pre-loader").css('display', 'block');
		$.ajax({
            type: "POST", // Method type
            url: "../dashboard/code/switchpoint_details.php", // PHP script URL
            data: {
                GROUP_ID: group_id // Optional data to send to PHP script
            },
            dataType: "json", // Expected data type from PHP script
            success: function(response) {
                // Update HTML elements with response data
            	$("#total_devices").text(response.TOTAL_UNITS);
            	$("#installed_devices").text(response.SWITCH_POINTS);
            	$("#not_installed_devices").text(response.UNISTALLED_UNITS);
            	$("#active_devices").text(response.ACTIVE_SWITCH);
            	$("#poornetwork").text(response.POOR_NW);
            	$("#input_power_fail").text(response.POWER_FAILURE);
            	$("#faulty").text(response.FAULTY_SWITCH);
            	$("#auto_on").text(response.ON_UNITS);
            	$("#manual_on").text(response.MANUAL_ON);
            	$("#off").text(response.OFF);
            	$("#installed_lights").text(response.TOTAL_LIGHTS);
            	$("#installed_lights_on").text(response.ON_LIGHTS);
            	$("#installed_lights_off").text(response.OFF_LIGHT);
            	$("#installed_load").text(response.INSTALLED_LOAD);
            	$("#active_load").text(response.ACTIVE_LOAD);
            	$("#total_consumption_units").text(response.KWH);
            	$("#energy_saved_units").text(response.SAVED_UNITS);
            	$("#amount_saved").text(response.SAVED_AMOUNT);
            	$("#co2_saved").text(response.SAVED_CO2);


            	var totalLights = response.TOTAL_LIGHTS;
            	var onLights = response.ON_LIGHTS;
            	var offLights = response.OFF_LIGHT;

            	var activeLoad = response.ACTIVE_LOAD; // Assuming this key exists in your JSON response
                var installedLoad = response.INSTALLED_LOAD; // Assuming this key exists in your JSON response

                // Calculate the percentage for the active load
                var activeLoadPercentage = (activeLoad / installedLoad) * 100;

                // Update progress bar for installed lights ON
                $('#installed_lights_on').css('width', onLights + '%');
                $('#installed_lights_on').attr('aria-valuenow', onLights);
                $('#installed_lights_on').text(onLights + '%-ON');

                // Update progress bar for installed lights OFF
                $('#installed_lights_off').css('width', offLights + '%');
                $('#installed_lights_off').attr('aria-valuenow', offLights);
                $('#installed_lights_off').text(offLights + '%-OFF');

                // Update progress bar for active load
                $('#active_load').css('width', activeLoadPercentage + '%');
                $('#active_load').attr('aria-valuenow', activeLoadPercentage);
                $('#active_load').text('Active - ' + activeLoad);
            },
            error: function(xhr, status, error) {
            	console.error("AJAX Error:", status, error);
                // Handle errors here if necessary
            }
        });
	}
}


//=========================================================
//=========================================================
//=========================================================




	/*function add_device_list(group_id) {
   // var group_id = document.getElementById('group-list').value;

		if (group_id !== "" && group_id !== null) {
			$("#pre-loader").css('display', 'block');
			$.ajax({
				type: "POST",
				url: '../device-list/code/device-list-table.php',
				traditional: true,
				data: { GROUP_ID: group_id },
				dataType: "json",
				success: function (data) {
					const device_list_table = document.getElementById('device_list_table');
					device_list_table.innerHTML = '';

					if (Object.keys(data).length) {
						for (var i = 0; i < data.length; i++) {
							if (data[i].ACTIVE_STATUS == 0) {
								var newRow = document.createElement('tr');
								newRow.innerHTML =
								'<td>' + data[i].D_ID + '</td>' +
								'<td>' + data[i].D_NAME + '</td>' +
								'<td>' + data[i].INSTALLED_STATUS + '</td>' +
								'<td>' + data[i].INSTALLED_DATE + '</td>' +
								'<td>' + data[i].KW + '</td>' +
								'<td class="col-size-1">' + data[i].DATE_TIME + '</td>' +
								'<td>' + data[i].ON_OFF_STATUS + '</td>' +
								'<td>' + data[i].OPERATION_MODE + '</td>' +
								'<td>' + data[i].WORKING_STATUS + '</td>' +
								'<td>' + data[i].LMARK + '</td>' +
								'<td>' + data[i].INSTALLED_LIGHTS + '</td>' +
								'<td><i class="bi bi-trash-fill text-danger pointer h5" onclick="delete_device_id(this, \'' + data[i].REMOVE + '\')"></i></td>';
								device_list_table.appendChild(newRow);
							}
						}

						for (var i = 0; i < data.length; i++) {
							if (data[i].ACTIVE_STATUS == 1) {
								var newRow = document.createElement('tr');
								newRow.innerHTML =
								'<td>' + data[i].D_ID + '</td>' +
								'<td>' + data[i].D_NAME + '</td>' +
								'<td>' + data[i].INSTALLED_STATUS + '</td>' +
								'<td>' + data[i].INSTALLED_DATE + '</td>' +
								'<td>' + data[i].KW + '</td>' +
								'<td class="col-size-1">' + data[i].DATE_TIME + '</td>' +
								'<td>' + data[i].ON_OFF_STATUS + '</td>' +
								'<td>' + data[i].OPERATION_MODE + '</td>' +
								'<td>' + data[i].WORKING_STATUS + '</td>' +
								'<td>' + data[i].LMARK + '</td>' +
								'<td>' + data[i].INSTALLED_LIGHTS + '</td>' +                           
								'<td><i class="bi bi-trash-fill text-danger pointer h5" onclick="delete_device_id(this, \'' + data[i].REMOVE + '\')"></i></td>';
								device_list_table.appendChild(newRow);
							}

						}
					}
					else
					{
						var newRow = document.createElement('tr');
						newRow.innerHTML ='<td class="text-danger" colspan="12">Device List not found</td>';
						device_list_table.appendChild(newRow); 
					}
					$("#pre-loader").css('display', 'none');
				},
				error: function (textStatus, errorThrown) {
					alert("Error getting the data");
					$("#pre-loader").css('display', 'none');
				},
				failure: function () {
					alert("Failed to get the data");
					$("#pre-loader").css('display', 'none');
				}
			});
		}
	}*/



