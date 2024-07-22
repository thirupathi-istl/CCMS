var group_name=localStorage.getItem("GroupNameValue")
if(group_name==""||group_name==null)
{
    group_name="ALL";
}
add_device_list(group_name);

let group_list = document.getElementById('group-list');

group_list.addEventListener('change', function() {
    let selectedValue = group_list.value;
    add_device_list(selectedValue);
});


function add_device_list(group_id) {
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
}

function delete_device_id(element, device_id) {
    if(device_id!=""&&device_id!=null)
    {
        if (confirm('Confirm '+ device_id+' deletion: Deleting the device will remove it from your list. Proceed?')) {            
            $("#pre-loader").css('display', 'block');
            $(function(){
                $.ajax({
                    type: "POST",
                    url: '../device-list/code/remove-device.php',
                    traditional : true, 
                    data:{D_ID:device_id },
                    dataType: "json", 
                    success: function(data) {
                        if(data=="Device deleted successfully")
                        {
                            element.closest('tr').remove();
                            alert(data);
                        }

                        $("#pre-loader").css('display', 'none');
                    },
                    error: function (textStatus, errorThrown) {
                        alert("Error getting the data");
                        $("#pre-loader").css('display', 'none');
                    },
                    failure: function()
                    {
                        alert("Failed to get the data");
                        $("#pre-loader").css('display', 'none');
                    }
                });
            });
        }
    }
    else
    {
        alert("Please Enter Device ID");
    }
}

function addDevice() {
    var deviceName = document.getElementById('deviceName').value;
    var device_id = document.getElementById('deviceID').value;
    var activationCode = document.getElementById('activationCode').value;
   /* var groupArea = document.getElementById('groupArea').value;
    var capacity = document.getElementById('capacity').value;*/

    if(device_id!=""&&device_id!=null)
    {
        if (confirm('Do you want to proceed and add the device?')) {            
            $("#pre-loader").css('display', 'block');
            $(function(){
                $.ajax({
                    type: "POST",
                    url: '../device-list/code/add-device.php',
                    traditional : true, 
                    data:{D_ID:device_id,D_NAME: deviceName, ACTIVATION_CODE:activationCode },
                    dataType: "json", 
                    success: function(data) {
                        alert(data);
                        $("#pre-loader").css('display', 'none');
                    },
                    error: function (textStatus, errorThrown) {
                        alert("Error getting the data");
                        $("#pre-loader").css('display', 'none');
                    },
                    failure: function()
                    {
                        alert("Failed to get the data");
                        $("#pre-loader").css('display', 'none');
                    }
                });
            });
        }
    }
    else
    {
        alert("Please Enter Device ID");
    }
}

//Installed Lights Column Buttons Open Function
function openLightsModal(device_id, device_name) {
    document.getElementById('lightsModalLabel').innerText = 'Installed Lights -' +device_name+" - ("+ device_id+")";
    var lightsTableBody = document.getElementById('lightsTableBody');
    lightsTableBody.innerHTML = ''; 
    if(device_id!=""&&device_id!=null)
    {
        localStorage.setItem('device_id_save_lights', device_id);        
        localStorage.setItem('device_name_save_lights', device_name);        
        $("#pre-loader").css('display', 'block');
        $(function() {
            $.ajax({
                type: "POST",
                url: '../lights-info/code/lights-details-table.php',
                data: { D_ID: device_id }, // Assuming device_id is defined somewhere in your JavaScript
                dataType: "json",
                success: function(data) {
                    if (data.success) 
                    {
                        if (data.data.length > 0) 
                        {                            
                            for (var i = 0; i < data.data.length; i++) {
                                var row = lightsTableBody.insertRow();

                                if((data.data.length-1)==i)
                                {
                                    row.innerHTML ='<td class="bg-success-subtle">' +  data.data[i].brand_name + '</td><td class="bg-success-subtle">' +  data.data[i].wattage + '</td><td class="fw-bold bg-success-subtle">' +  data.data[i].total_lights + '</td><td class="fw-bold bg-success-subtle">' +data.data[i].total_wattage + '</td><td class="bg-success-subtle"></td>';
                                }
                                else
                                {
                                    row.innerHTML ='<td>' +  data.data[i].brand_name + '</td><td>' +  data.data[i].wattage + '</td><td>' +  data.data[i].total_lights + '</td><td>' +data.data[i].total_wattage + '</td><td><i class="bi bi-trash-fill text-danger pointer" onclick="remove_Lights(this, \'' + data.data[i].device_id + '\', \'' + data.data[i].id + '\')"></i></td>';
                                }
                            }
                        } else {
                            var row = lightsTableBody.insertRow();
                            row.innerHTML ='<td colspan="5">No data available</td>';
                        }
                    } 
                    else {
                        var row = lightsTableBody.insertRow();
                        row.innerHTML ='<td colspan="5">Error: ' + data.message+'</td>';

                    }
                    $("#pre-loader").css('display', 'none'); 
                },
                error: function(xhr, textStatus, errorThrown) {
                    var row = lightsTableBody.insertRow();
                    row.innerHTML ='<td colspan="5" class="text-left text-danger">Error: ' +textStatus+'</td>';
                    $("#pre-loader").css('display', 'none');
                }
            });
        });
    }
    else
    {
        alert("Please Enter Device ID");
    }
    var lightsModal = new bootstrap.Modal(document.getElementById('lightsModal'));
    lightsModal.show();
}

// Function to show the add lights form
function showAddLightsForm() {
    var addLightModal = new bootstrap.Modal(document.getElementById('addLightModal'));
    addLightModal.show();
}

// Function to add a new light 
function addLight() {

    // Retrieve the device ID from localStorage
    var device_id = localStorage.getItem('device_id_save_lights');
    var device_name =localStorage.getItem('device_name_save_lights');


// Retrieve the values from input fields
    var brandName = document.getElementById('brandName').value.trim();
    var wattage = document.getElementById('wattage').value.trim();
    var lights = document.getElementById('lights').value.trim();

// Calculate total watts
    

// Function to validate input values
    function validateInputs() {
        if (!device_id) {
            alert("Device ID not found. Please try again.");
            return false;
        }
        if (!brandName) {
            alert("Brand name cannot be empty.");
            return false;
        }
        if (!wattage || isNaN(wattage) || wattage <= 0) {
            alert("Please enter a valid wattage.");
            return false;
        }
        if (!lights || isNaN(lights) || lights <= 0) {
            alert("Please enter a valid number of lights.");
            return false;
        }
        return true;
    }
    var totalWatts = lights * wattage;

// Proceed if the inputs are valid
    if (validateInputs()) {
        if (confirm('Do you want to proceed and add the details?')) {
            $("#pre-loader").css('display', 'block');
            $.ajax({
                type: "POST",
                url: '../lights-info/code/add-light_details.php',
                traditional: true,
                data: {
                    D_ID: device_id,
                    BRAND: brandName,
                    WATT: wattage,
                    LIGHTS: lights
                },
                dataType: "json",
                success: function(response) {
                    $("#pre-loader").css('display', 'none');
                    if (response.status === "success") {
                        alert(response.message);
                        document.getElementById('addLightsForm').reset();
                        var backdrops = document.querySelectorAll('.modal-backdrop');
                        backdrops.forEach(function(backdrop) {
                            backdrop.parentNode.removeChild(backdrop);
                        });
                        var addLightModal = bootstrap.Modal.getInstance(document.getElementById('addLightModal'));
                        addLightModal.hide(); 

                        openLightsModal(device_id, device_name);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#pre-loader").css('display', 'none');
                    alert("Error getting the data: " + textStatus + " - " + errorThrown);
                },
                failure: function() {
                    alert("Failed to get the data.");
                    $("#pre-loader").css('display', 'none');
                }
            });
        }
    }
    // Hide the add lights form


    // Reset the form

    
}

// Function to delete a light row
function remove_Lights(element, device_id, record_id) {
   /* element.closest('tr').remove();
    */

// Function to validate input values
    function validateInputs() {
        if(!record_id)
        {
            alert("Record ID not found. Please try again.");
            return false;
        }
        if (!device_id) {
            alert("Device ID not found. Please try again.");
            return false;
        }
        return true;
    }

// Proceed if the inputs are valid
    if (validateInputs()) {
        if (confirm('Do you want to proceed and remove the details?')) {
            $("#pre-loader").css('display', 'block');
            $.ajax({
                type: "POST",
                url: '../lights-info/code/remove-light_details.php',
                traditional: true,
                data: {
                    D_ID: device_id,
                    RECORD: record_id
                },
                dataType: "json",
                success: function(response) {
                    $("#pre-loader").css('display', 'none');
                    if (response.status === "success") {
                        alert(response.message);
                        var device_name =localStorage.getItem('device_name_save_lights');
                        
                        var backdrops = document.querySelectorAll('.modal-backdrop');
                        backdrops.forEach(function(backdrop) {
                            backdrop.parentNode.removeChild(backdrop);
                        });
                        openLightsModal(device_id, device_name);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#pre-loader").css('display', 'none');
                    alert("Error getting the data: " + textStatus + " - " + errorThrown);
                },
                failure: function() {
                    alert("Failed to get the data.");
                    $("#pre-loader").css('display', 'none');
                }
            });
        }
    }

}
