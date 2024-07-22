// Retrieve the selected device ID from localStorage
let device_id = localStorage.getItem("SELECTED_ID");
if (!device_id) {
	device_id = document.getElementById('device_id').value;
}
update_data_table(device_id, "LATEST", "");

let device_id_list=document.getElementById('device_id');
device_id_list.addEventListener('change', function() {
	device_id = document.getElementById('device_id').value;
	update_data_table(device_id, "LATEST", "")

});

/*var group_name=localStorage.getItem("GroupNameValue")
if(group_name==""||group_name==null)
{
	group_name="ALL";
}
if (group_name !== "" && group_name !== null) {
	//update_device_on_off_modes(group_name);
	$("#pre-loader").css('display', 'block');
}


let group_list = document.getElementById('group-list');

group_list.addEventListener('change', function() {
	let group_name = group_list.value;
	if (group_name !== "" && group_name !== null) {
		//update_device_on_off_modes(group_name);		
		$("#pre-loader").css('display', 'block');
	}
});
*/
/*========================================================================*/
//E:\Server\htdocs\Projects\CCMS\CCMS-New-Design-git\CCMS\data-report\code\frame_data_table.php


let view_all = document.getElementById('view_all_group_device');
view_all.addEventListener('change', function() {
	document.getElementById('search_date').value = "";
	if (this.checked) {		
		update_all_group_data_table();
		document.getElementById('pre-loader').style.display = 'block';
	} else {
		let device_id = document.getElementById('device_id').value;
		update_data_table(device_id, "LATEST", "");
		document.getElementById('pre-loader').style.display = 'block';
	}
});

function search_records()
{

	let device_id = document.getElementById('device_id').value;
	let searched_date = document.getElementById('search_date').value;
	searched_date=searched_date.trim();	
	if (!document.getElementById('view_all_group_device').checked) {
		if(searched_date!=null&&searched_date!="")
		{

			update_data_table(device_id, "DATE", searched_date);

		}
		else
		{
			update_data_table(device_id, "LATEST", "");
		}
	}
	else
	{
		document.getElementById('search_date').value = "";
		update_all_group_data_table();
	}
	document.getElementById('pre-loader').style.display = 'block';

}

function add_more_records() {
	if (!document.getElementById('view_all_group_device').checked) {
		var device_id = document.getElementById('device_id').value;
		var row_cont = document.getElementById('frame_data_table').getElementsByTagName('tr').length;
		var date_id = document.querySelector('#frame_data_table tr:last-child td:nth-child(1)').innerHTML;
		if((row_cont>1 ) && (date_id.indexOf("Found")==-1))
		{
			var date_time = document.querySelector('#frame_data_table tr:last-child td:nth-child(2)').innerHTML;
			if(device_id!="")
			{
				
				document.getElementById('pre-loader').style.display = 'block';
				$.ajax({
					type: "POST",
					url: '../data-report/code/frame_data_table.php',
					traditional: true,
					data: { D_ID: device_id, RECORDS:"ADD", DATE_TIME:date_time},
					dataType: "json",
					success: function(response) {
						$("#pre-loader").css('display', 'none');
						$("#frame_data_table").append(response);

					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#pre-loader").css('display', 'none');
						alert(`Error: ${textStatus}, ${errorThrown}`);
					}
				});
			}
		}
		else
		{
			alert("Records Not Found");
		}
	}


};




function update_data_table(device_id, records, searched_date ){

	$.ajax({
		type: "POST",
		url: '../data-report/code/frame_data_table.php',
		traditional: true,
		data: { D_ID: device_id, RECORDS:records, DATE:searched_date },
		dataType: "json",
		success: function(response) {
			$("#pre-loader").css('display', 'none');

			$("#frame_data_table").html("");
			$("#frame_data_table").html(response);

		},
		error: function(jqXHR, textStatus, errorThrown) {
			$("#pre-loader").css('display', 'none');
			alert(`Error: ${textStatus}, ${errorThrown}`);
		}
	});
}

function update_all_group_data_table(){

	$.ajax({
		type: "POST",
		url: '../data-report/code/all-group-data.php',
		traditional: true,
		data: { D_ID: device_id },
		dataType: "json",
		success: function(response) {
			$("#pre-loader").css('display', 'none');

			$("#frame_data_table").html("");
			$("#frame_data_table").html(response);

		},
		error: function(jqXHR, textStatus, errorThrown) {
			$("#pre-loader").css('display', 'none');
			alert(`Error: ${textStatus}, ${errorThrown}`);
		}
	});
}
