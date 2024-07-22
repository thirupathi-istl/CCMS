var group_name=localStorage.getItem("GroupNameValue")
if(group_name==""||group_name==null)
{
	group_name="ALL";
}
if (group_name !== "" && group_name !== null) {
	update_switchPoints_status(group_name);
	update_alerts(group_name);
	$("#pre-loader").css('display', 'block');
}


let group_list = document.getElementById('group-list');

group_list.addEventListener('change', function() {
	let group_name = group_list.value;
	if (group_name !== "" && group_name !== null) {
		update_switchPoints_status(group_name);
		update_alerts(group_name);
		$("#pre-loader").css('display', 'block');
	}
});


function update_switchPoints_status(group_id){
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
            	$("#installed_load").text("Installed Lights Load = "+response.INSTALLED_LOAD);
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
            	$("#pre-loader").css('display', 'none');
            }
        });
}


function update_alerts(group_id){

	$.ajax({
            type: "POST", // Method type
            url: "../dashboard/code/update_alerts.php", // PHP script URL
            data: {
                GROUP_ID: group_id // Optional data to send to PHP script
            },
            dataType: "json", // Expected data type from PHP script
            success: function(response) {
                // Update HTML elements with response data
            	$("#alerts_list").html(""); 
            	$("#alerts_list").html(response);     
            	//$("#pre-loader").css('display', 'none');       	
            },
            error: function(xhr, status, error) {
            	$("#alerts_list").html(""); 
            	console.error("Error:", status, error);
            	$("#pre-loader").css('display', 'none');
                // Handle errors here if necessary
            }
        });
}

document.getElementById('total_device').onclick = function() {

	let group_id = group_list.value;
	if (group_id !== "" && group_id !== null) {		
		get_devices_status( group_id, "ALL")
	}
};
document.getElementById('installed_devices_list').onclick = function() {


	let group_id = group_list.value;
	if (group_id !== "" && group_id !== null) {		
		get_devices_status( group_id, "INSTALLED")
	}
};


document.getElementById('not_installed_devices_list').onclick = function() {

	let group_id = group_list.value;
	if (group_id !== "" && group_id !== null) {		
		get_devices_status( group_id, "NOTINSTALLED")
	}
};

function get_devices_status(group_id, status)
{
	
	$("#pre-loader").css('display', 'block');		
	$.ajax({
            type: "POST", // Method type
            url: "../dashboard/code/dashboard_device_list.php", // PHP script URL
            data: {
                GROUP_ID: group_id, STATUS: status // Optional data to send to PHP script
            },
            dataType: "json", // Expected data type from PHP script
            success: function(response) {
            	$("#not_installed_device_list_table").html(""); 
            	$("#total_device_table").html("");
            	$("#installed_device_list_table").html("");  
            	if(status=="ALL")
            	{
            		$("#total_device_table").html(response); 
            	}
            	else if(status=="INSTALLED")
            	{
            		$("#installed_device_list_table").html(response); 
            	}
            	else
            	{
            		$("#not_installed_device_list_table").html(response); 
            	}
            	$("#pre-loader").css('display', 'none');       	
            },
            error: function(xhr, status, error) {
            	$("#total_device_table").html(""); 
            	console.error("Error:", status, error);
            	$("#pre-loader").css('display', 'none');
                // Handle errors here if necessary
            }
        });
}

document.getElementById('active_device_list').onclick = function() {

    let group_id = group_list.value;
    if (group_id !== "" && group_id !== null) {     
        installed_devices_status( group_id, "ACTIVE_DEVICES")
    }
};

document.getElementById('poor_nw_device_list').onclick = function() {

    let group_id = group_list.value;
    if (group_id !== "" && group_id !== null) {     
        installed_devices_status( group_id, "POOR_NW_DEVICES")
    }
};
document.getElementById('power_failure_device_list').onclick = function() {

    let group_id = group_list.value;
    if (group_id !== "" && group_id !== null) {     
        installed_devices_status( group_id, "POWER_FAIL_DEVICES")
    }
};
document.getElementById('faulty_device_list').onclick = function() {

    let group_id = group_list.value;
    if (group_id !== "" && group_id !== null) {     
        installed_devices_status( group_id, "FAULTY_DEVICES")
    }
};

function installed_devices_status(group_id, status)
{

    $("#pre-loader").css('display', 'block');       
    $.ajax({
            type: "POST", // Method type
            url: "../dashboard/code/installed_devices_status.php", // PHP script URL
            data: {
                GROUP_ID: group_id, STATUS: status // Optional data to send to PHP script
            },
            dataType: "json", // Expected data type from PHP script
            success: function(response) {



                if(status=="ACTIVE_DEVICES")
                {
                    $("#active_device_list_update_table").html(""); 
                    $("#active_device_list_update_table").html(response); 
                }
                else if(status=="POOR_NW_DEVICES")
                {
                    $("#poor_nw_list_table").html("");
                    $("#poor_nw_list_table").html(response); 
                }
                else if(status=="POWER_FAIL_DEVICES")
                {
                    $("#power_fail_devices_table").html("");
                    $("#power_fail_devices_table").html(response); 
                }

                else if(status=="FAULTY_DEVICES")
                {
                    $("#faulty_device_list_table").html("");
                    $("#faulty_device_list_table").html(response); 
                }
                $("#pre-loader").css('display', 'none');        
            },
            error: function(xhr, status, error) {
                $("#total_device_table").html(""); 
                console.error("Error:", status, error);
                $("#pre-loader").css('display', 'none');
                // Handle errors here if necessary
            }
        });
}


document.getElementById('auto_on_devices_list').onclick = function() {

    let group_id = group_list.value;
    if (group_id !== "" && group_id !== null) {     
        active_device_status( group_id, "ON_LIGHTS")
    }
};


document.getElementById('off_devices_list').onclick = function() {

    let group_id = group_list.value;
    if (group_id !== "" && group_id !== null) {     
        active_device_status( group_id, "OFF_LIGHTS")
    }
};
document.getElementById('manual_on_devices_list').onclick = function() {

    let group_id = group_list.value;
    if (group_id !== "" && group_id !== null) {     
        active_device_status( group_id, "MANUAL_ON")
    }
};


function active_device_status(group_id, status)
{

    $("#pre-loader").css('display', 'block');       
    $.ajax({
            type: "POST", // Method type
            url: "../dashboard/code/active_device_lights_status.php", // PHP script URL
            data: {
                GROUP_ID: group_id, STATUS: status // Optional data to send to PHP script
            },
            dataType: "json", // Expected data type from PHP script
            success: function(response) {



                if(status=="ON_LIGHTS")
                {
                    $("#on_devices_table").html(""); 
                    $("#on_devices_table").html(response); 
                }
                else if(status=="OFF_LIGHTS")
                {
                    $("#off_device_table").html("");
                    $("#off_device_table").html(response); 
                }

                else if(status=="MANUAL_ON")
                {
                    $("#manual_on_devices_table").html("");
                    $("#manual_on_devices_table").html(response); 
                }
                $("#pre-loader").css('display', 'none');        
            },
            error: function(xhr, status, error) {
                $("#total_device_table").html(""); 
                console.error("Error:", status, error);
                $("#pre-loader").css('display', 'none');
                // Handle errors here if necessary
            }
        });
}

function openOpenviewModal(device_id) {

    $("#pre-loader").css('display', 'block');       
    $.ajax({
            type: "POST", // Method type
            url: "../dashboard/code/device_latest_values_update.php", // PHP script URL
            data: {
                DEVICE_ID: device_id // Optional data to send to PHP script
            },
            dataType: "json", // Expected data type from PHP script
            success: function(data) {
             $('total_light').text(data.LIGHTS);     
             $('#on_percentage').text(data.LIGHTS_ON);     
             $('#off_percentage').text(data.LIGHTS_OFF);     
             $('#on_off_status').html(data.ON_OFF_STATUS);    
             $('#v_r').text(data.V_PH1);     
             $('#v_y').text(data.V_PH2);     
             $('#v_b').text(data.V_PH3);    
             $('#i_r').text(data.I_PH1);    
             $('#i_y').text(data.I_PH2);     
             $('#i_b').text(data.I_PH3);    
             $('#watt_r').text(data.KW_R);     
             $('#watt_y').text(data.KW_Y);    
             $('#watt_b').text(data.KW_B);     
             $('#kwh').text(data.KWH);     
             $('#kvah').text(data.KVAH);    
             $('#record_date_time').text(data.DATE_TIME);   
             $("#pre-loader").css('display', 'none');  
             var openviewModal = document.getElementById('openview');
             var bootstrapModal = new bootstrap.Modal(openviewModal);
             bootstrapModal.show();      
         },
         error: function(xhr, status, error) {
            $("#total_device_table").html(""); 
            console.error("Error:", status, error);
            $("#pre-loader").css('display', 'none');
                // Handle errors here if necessary
        }
    });


}

















