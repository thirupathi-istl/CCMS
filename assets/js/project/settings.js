let device_id = localStorage.getItem("SELECTED_ID");
if (!device_id) {
	device_id = document.getElementById('device_id').value;
}
load_threshold_settings(device_id)
let device_id_list=document.getElementById('device_id');
device_id_list.addEventListener('change', function() {
	device_id = document.getElementById('device_id').value;
	load_threshold_settings(device_id);
});

document.addEventListener('DOMContentLoaded', function() {
	
	const submitBtn = document.getElementById('voltage_values_btn');

    // Define error message containers
	const errorMessages = {
		r_lower_volt: '',
		y_lower_volt: '',
		b_lower_volt: '',
		r_upper_volt: '',
		y_upper_volt: '',
		b_upper_volt: ''
	};

    // Validation function
	function validateInput(inputId) {

		const input = document.getElementById(inputId);
		if (!input.value || input.value < 1 || input.value > 750) {
			input.classList.add('border-danger');
			return false;
		} else {
			input.classList.remove('border-danger');
			return true;
		}
	}

    // Event listener for keyup
	['r_lower_volt', 'y_lower_volt', 'b_lower_volt', 'r_upper_volt', 'y_upper_volt', 'b_upper_volt'].forEach(id => {
		document.getElementById(id).addEventListener('keyup', function() {
			validateInput(id);
		});
	});

    // Event listener for form submission
	submitBtn.onclick = function() {
		let isValid = true;       
		Object.keys(errorMessages).forEach(id => {
			if (!validateInput(id)) {
				isValid = false;
			}
		});

		if (isValid) {

			var multipleValues = $("#multi_selection_device_id").val() || [];
			var selected_devices = multipleValues.join(",");

			if (selected_devices.length > 0) {
				device_id = selected_devices;
			}
			
			var formData = new FormData();
			formData.append('LR', document.getElementById("r_lower_volt").value);
			formData.append('LY', document.getElementById("y_lower_volt").value);
			formData.append('LB', document.getElementById("b_lower_volt").value);
			formData.append('UR', document.getElementById("r_upper_volt").value);
			formData.append('UY', document.getElementById("y_upper_volt").value);
			formData.append('UB', document.getElementById("b_upper_volt").value);
			formData.append('D_ID', device_id);

			if (confirm(`Are you sure ?`)) {
				$("#pre-loader").css('display', 'block'); 
				$.ajax({
					type: "POST",
					url: '../settings/code/voltage-thresholds.php',					
					data: formData,
					processData: false,
					contentType: false,
					dataType: "json",
					success: function(response) {
						$("#pre-loader").css('display', 'none');
						alert(response.message);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#pre-loader").css('display', 'none');
						alert(`Error: ${textStatus}, ${errorThrown}`);
					}
				});
			}

		}
	};
});



document.addEventListener('DOMContentLoaded', function() {
	const submitBtn = document.getElementById('current_values_btn');

    // Define error message containers
	const errorMessages = {
		r_current: '',
		y_current: '',
		b_current: ''
		
	};

    // Validation function
	function validateInput(inputId) {

		const input = document.getElementById(inputId);
		if (!input.value || input.value < 1 || input.value > 5000) {
			input.classList.add('border-danger');
			return false;
		} else {
			input.classList.remove('border-danger');
			return true;
		}
	}

    // Event listener for keyup
	['r_current', 'y_current', 'b_current'].forEach(id => {
		document.getElementById(id).addEventListener('keyup', function() {
			validateInput(id);
		});
	});

    // Event listener for form submission
	submitBtn.onclick = function() {
		let isValid = true;       
		Object.keys(errorMessages).forEach(id => {
			if (!validateInput(id)) {
				isValid = false;
			}
		});

		if (isValid) {

			var multipleValues = $("#multi_selection_device_id").val() || [];
			var selected_devices = multipleValues.join(",");

			if (selected_devices.length > 0) {
				device_id = selected_devices;
			}
			
			var formData = new FormData();
			formData.append('IR', document.getElementById("r_current").value);
			formData.append('IY', document.getElementById("y_current").value);
			formData.append('IB', document.getElementById("b_current").value);

			formData.append('D_ID', device_id);

			if (confirm(`Are you sure ?`)) {
				$("#pre-loader").css('display', 'block'); 
				$.ajax({
					type: "POST",
					url: '../settings/code/current-thresholds.php',					
					data: formData,
					processData: false,
					contentType: false,
					dataType: "json",
					success: function(response) {
						$("#pre-loader").css('display', 'none');
						alert(response.message);
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#pre-loader").css('display', 'none');
						alert(`Error: ${textStatus}, ${errorThrown}`);
					}
				});
			}

		}
	};
});



function check_validation(id, min, max) {
	const input = document.getElementById(id);
	if (!input.value || input.value < min || input.value >= max) {
		input.classList.add('border-danger');
		return false;
	} else {
		input.classList.remove('border-danger');
		return true;
	}
}

function update_capcity(){
	isValid = true;
	if (!check_validation('unit_capacity', 1, 5000)) {
		isValid = false;
		return false;
	}
	if(isValid)
	{
		const value = document.getElementById('unit_capacity').value;
		update_settings_value("CAPACITY", value)
	}
}
function frame_interval_update(){
	
	isValid = true;
	if (!check_validation('frame_time', 1, 86400 )) {
		isValid = false;
		return false;
	}
	if(isValid)
	{
		const value = document.getElementById('frame_time').value;
		update_settings_value("FRAME_TIME", value)
	}
	
}
function update_pf(){
	isValid = true;
	if (!check_validation('pf_settings', 0.1, 0.99 )) {
		isValid = false;
		return false;
	}
	if(isValid)
	{
		const value = document.getElementById('pf_settings').value;
		update_settings_value("PF", value)
	}
	

}
function update_ct_ratio(){
	isValid = true;
	if (!check_validation('ctratio', 1, 2000)) {
		isValid = false;
		return false;
	}
	if(isValid)
	{
		const value = document.getElementById('ctratio').value;
		update_settings_value("CT_RATIO", value)
	}
	
}

function update_settings_value(parameter, update_value)
{

	var multipleValues = $("#multi_selection_device_id").val() || [];
	var selected_devices = multipleValues.join(",");

	if (selected_devices.length > 0) {
		device_id = selected_devices;
	}

	var formData = new FormData();
	formData.append('PARAMETER', parameter);
	formData.append('UPDATED_VALUE', update_value);
	formData.append('D_ID', device_id);

	if (confirm(`Are you sure ?`)) {
		$("#pre-loader").css('display', 'block'); 
		$.ajax({
			type: "POST",
			url: '../settings/code/update-prameters.php',					
			data: formData,
			processData: false,
			contentType: false,
			dataType: "json",
			success: function(response) {
				$("#pre-loader").css('display', 'none');
				alert(response.message);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$("#pre-loader").css('display', 'none');
				alert(`Error: ${textStatus}, ${errorThrown}`);
			}
		});
	}
}

function load_threshold_settings(device_id)
{
	$("#pre-loader").css('display', 'block'); 
	$.ajax({
            type: "POST", // Method type
            url: '../settings/code/load-threshold-values.php',	 // PHP script URL
            data: {
               D_ID: device_id // Optional data to send to PHP script
            },
            dataType: "json", // Expected data type from PHP script
            success: function(response) {
                // Update HTML elements with response data
            	
            	if(response.success) {
            		
            		$("#r_lower_volt").val(response.data.l_r || 0);
            		$("#y_lower_volt").val(response.data.l_y || 0);
            		$("#b_lower_volt").val(response.data.l_b || 0);
            		$("#r_upper_volt").val(response.data.u_r || 0);
            		$("#y_upper_volt").val(response.data.u_y || 0);
            		$("#b_upper_volt").val(response.data.u_b || 0);


            		$("#r_current").val(response.data.i_r || 0);
            		$("#y_current").val(response.data.i_y || 0);
            		$("#b_current").val(response.data.i_b || 0);

            		$("#pf_settings").val(response.data.pf || 0);
            		$("#unit_capacity").val(response.data.capacity || 0);

            		$("#ctratio").val(response.data.ct_ratio || 0);
            		$("#frame_time").val(response.data.frame_time || 20).change() 
            	} else {
            		// Handle error message if success is false
            		alert(response.message);
            	}	
            },
            error: function(xhr, status, error) {
            	console.error("AJAX Error:", status, error);
            	$("#pre-loader").css('display', 'none');
            }
         });
}

