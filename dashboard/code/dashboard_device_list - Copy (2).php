<?php
require_once '../../base-path/config-path.php';
require_once BASE_PATH_1 . 'config_db/config.php';
require_once BASE_PATH_1 . 'session/session-manager.php';

// Check session and retrieve session variables
SessionManager::checkSession();
$sessionVars = SessionManager::SessionVariables();
$mobile_no = $sessionVars['mobile_no'];
$user_id = $sessionVars['user_id'];
$role = $sessionVars['role'];
$user_login_id = $sessionVars['user_login_id'];

// Initialize variables
$return_response = "";
$user_devices = "";

/*$device_status="ALL";
$group_id="ALL";*/

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
	$group_id = filter_input(INPUT_POST, 'GROUP_ID', FILTER_SANITIZE_STRING);
	$device_status = filter_input(INPUT_POST, 'STATUS', FILTER_SANITIZE_STRING);

	include_once(BASE_PATH_1 . "common-files/selecting_group_device.php");

	if ($user_devices != "") {
		$user_devices = substr($user_devices, 0, -1);
	}

	$user_devices_array = explode(',', $user_devices);
	$user_devices_array = array_map('trim', $user_devices_array);

    // Ensure $user_devices_array is non-empty and contains only valid device IDs
	$user_devices_array = array_filter($user_devices_array);

    // If there are no devices, skip the rest of the process
	if (empty($user_devices_array)) {
		$return_response .= '<tr><td colspan="6" class="text-danger">No Devices Found</td></tr>';
		echo json_encode($return_response);
		exit;
	}

    // Create placeholders for device IDs in SQL query
	$placeholders = implode(',', array_fill(0, count($user_devices_array), '?'));

    // Connect to the database using procedural mysqli
	$conn_db_all = mysqli_connect(HOST, USERNAME, PASSWORD, DB_ALL);
	if (!$conn_db_all) {
		die("Connection failed: " . mysqli_connect_error());
	}

    // Create temporary table to store device IDs
	$create_temp_table = "CREATE TEMPORARY TABLE temp_device_list (
		device_id VARCHAR(255) PRIMARY KEY,
		active_device TINYINT(1) DEFAULT 0,
		date_time DATETIME DEFAULT '2024-08-10 02:30:00',
		installed_date DATE DEFAULT '2024-08-10',
		installed_status TINYINT(1) DEFAULT 0,
		location VARCHAR(255) DEFAULT ''
	)";
	if (mysqli_query($conn_db_all, $create_temp_table)) {
        // Prepare insert statement
		$insert_stmt = mysqli_prepare($conn_db_all, "INSERT INTO temp_device_list (device_id, active_device, date_time, installed_date, installed_status, location) VALUES (?, ?, ?, ?, ?, ?)");
		if ($insert_stmt) {
            // Insert each device ID into the temporary table
			foreach ($device_list as $device) {

				$device_id =  $device['D_ID'];
				$active_device = 0;
				$date_time = '0000-00-00 00:00:00';
				$installed_date = '0000-00-00';
				$installed_status = 0;
				$location = '';

                // Fetch the live data for each device
				$query = "SELECT active_device, date_time, installed_date, installed_status, location FROM live_data_updates WHERE device_id = ?";
				$data_stmt = mysqli_prepare($conn_db_all, $query);
				if ($data_stmt) {
					mysqli_stmt_bind_param($data_stmt, 's', $device_id);
					mysqli_stmt_execute($data_stmt);
					$data_result = mysqli_stmt_get_result($data_stmt);
					if ($data_row = mysqli_fetch_assoc($data_result)) {
						$active_device = $data_row['active_device'];
						$date_time = $data_row['date_time'];
						$installed_date = $data_row['installed_date'];
						$installed_status = $data_row['installed_status'];
						$location = $data_row['location'];
					}
					mysqli_stmt_close($data_stmt);
				}

				mysqli_stmt_bind_param($insert_stmt, 'sissis', $device_id, $active_device, $date_time, $installed_date, $installed_status, $location);
				mysqli_stmt_execute($insert_stmt);
			}
			mysqli_stmt_close($insert_stmt);
		} else {
			$return_response .= '<tr><td colspan="6" class="text-danger">Failed to prepare insert statement</td></tr>';
			mysqli_close($conn_db_all);
			echo json_encode($return_response);
			exit;
		}

        // Prepare SQL statement based on the device status
		$sql = "";
		if ($device_status == "ALL") {
			$sql = "SELECT device_id, 
			COALESCE(active_device, 0) AS active_device, 
			COALESCE(date_time, '0000-00-00 00:00:00') AS date_time, 
			COALESCE(installed_date, '0000-00-00') AS installed_date, 
			COALESCE(installed_status, 0) AS installed_status, 
			COALESCE(location, '') AS location
			FROM temp_device_list ORDER BY  LENGTH(device_id), device_id";
		} elseif ($device_status == "INSTALLED") {
			$sql = "SELECT device_id, 
			COALESCE(active_device, 0) AS active_device, 
			COALESCE(date_time, '0000-00-00 00:00:00') AS date_time, 
			COALESCE(installed_date, '0000-00-00') AS installed_date, 
			COALESCE(installed_status, 0) AS installed_status, 
			COALESCE(location, '') AS location
			FROM temp_device_list
			WHERE installed_status = '1' ORDER BY LENGTH(device_id), device_id";
		} else {
			$sql = "SELECT device_id, 
			COALESCE(active_device, 0) AS active_device, 
			COALESCE(date_time, '0000-00-00 00:00:00') AS date_time, 
			COALESCE(installed_date, '0000-00-00') AS installed_date, 
			COALESCE(installed_status, 0) AS installed_status, 
			COALESCE(location, '') AS location
			FROM temp_device_list
			WHERE installed_status = '0' ORDER BY LENGTH(device_id), device_id";
		}

        // Use prepared statement to execute the query
		$stmt = mysqli_prepare($conn_db_all, $sql);
		if ($stmt) {
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

            // Check if there are rows returned
			if (mysqli_num_rows($result) > 0) {
				$return_response_1="";
				$return_response_2="";
				while ($r = mysqli_fetch_assoc($result)) {
					$installation_date = $r['installed_date'];
					if($installation_date==="0000-00-00")
					{
						$installation_date="--";

					}
					$date = date("H:i:s d-m-Y", strtotime($r['date_time']));
					$device_id = $r['device_id'];
					$status = $r['active_device'];

                    // Handle location and address
					if ($r['location'] != '0,0' && strpos($r['location'], "0000000,000000") === false) {
						$address = '<a href="#" class="pt-0 pb-0" onclick="show_location(\'' . $r['location'] . '\')">Map</a>';
					} else {

						$address = '<a href="location-details.php?id='.$device_id.'" target="blank"><button class="btn btn-primary pt-0 pb-0" >Update</button></a>';
						//$address = '<button class="address_update btn btn-primary pt-0 pb-0" onclick="address_update(\'' . $device_id . '\')">Update</button>';
					}

                    // Placeholder for $device_list (assuming it's properly populated elsewhere)
					$name = $device_id;
					foreach ($device_list as $device) {
						$c_id =  $device['D_ID'];
						if (trim($device_id) === $c_id) {
							$name = $device['D_NAME'];
						}
					}

                    // Output HTML table rows based on installation status and device_status
					
					if ($r['installed_status'] == 1) {
						
						$installation_status = "Installed";
						if ($device_status == "INSTALLED") {
							$return_response_1 .= '<tr>
							<td ><input type="checkbox" name="selectedDevice" class="selectedDevice" onclick="check_uncheck_fun(this)"></td>
							<td>' . $device_id . '</td>
							<td>' . $name . '</td>
							<td class="text-success fw-semibold">' . $installation_status . '</td>
							<td>' . $installation_date . '</td> 
							<td>' . $address . '</td> 
							</tr>';
						} else {
							$return_response_1 .= '<tr>
							<td ><input type="checkbox" name="selectedDevice" class="selectedDevice" onclick="check_uncheck_fun(this)"></td>
							<td>' . $device_id . '</td>
							<td>' . $name . '</td>
							<td class="text-success fw-semibold">' . $installation_status . '</td>
							<td>' . $installation_date . '</td> 
							<td>' . $address . '</td> 
							</tr>';
						}
						//$return_response=$return_response;
					} else {
						if ($device_status == "NOTINSTALLED") {
							$installation_status = "Not Installed";
							$return_response_2 .= '<tr>
							<td ><input type="checkbox" name="selectedDevice" class="selectedDevice" onclick="check_uncheck_fun(this)"></td>
							<td>' . $device_id . '</td>
							<td>' . $name . '</td>							
							</tr>';
						} else {
							$installation_status = "Not Installed";
							$return_response_2 .= '<tr>
							<td ><input type="checkbox" name="selectedDevice" class="selectedDevice" onclick="check_uncheck_fun(this)"></td>
							<td>' . $device_id . '</td>
							<td>' . $name . '</td>
							<td class="text-danger fw-semibold">' . $installation_status . '</td>
							<td>' . $installation_date . '</td> 
							<td>--</td> 
							</tr>';
						}
					}
					$return_response=$return_response_1.$return_response_2;
				}
			} else {
                // No devices found
				$return_response .= '<tr><td colspan="6" class="text-danger">Devices Not Found</td></tr>';
			}

            // Close statement
			mysqli_stmt_close($stmt);
		} else {
            // SQL preparation failed
			$return_response .= '<tr><td colspan="6" class="text-danger">Failed to prepare SQL statement</td></tr>';
		}

        // Close temporary table
		mysqli_query($conn_db_all, "DROP TEMPORARY TABLE IF EXISTS temp_device_list");

        // Close database connection
		mysqli_close($conn_db_all);
	} else {
		$return_response .= '<tr><td colspan="6" class="text-danger">Failed to create temporary table</td></tr>';
	}

	echo json_encode($return_response);
}
?>
