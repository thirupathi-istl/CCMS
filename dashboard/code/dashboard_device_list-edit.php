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

$device_status = "ALL";
$group_id = "ALL";

// Include file to get user devices
include_once(BASE_PATH_1 . "common-files/selecting_group_device.php");

if ($user_devices != "") {
    $user_devices = substr($user_devices, 0, -1); // Trim last comma
}

// Create an array from $user_devices
$user_devices_array = explode(',', $user_devices);
$user_devices_array = array_map('trim', $user_devices_array);

// Ensure the $user_devices_array contains only valid device IDs
$user_devices_array = array_filter($user_devices_array);

// If there are no devices, skip the rest of the process
if (empty($user_devices_array)) {
	$return_response .= '<tr><td colspan="6" class="text-danger">No Devices Found</td></tr>';
	echo json_encode($return_response);
	exit;
}

// Create a clean array for the devices without quotes
$fdfd = str_replace("'", "", $user_devices);
$fdfd_array = explode(",", $fdfd);

// Create a database connection
$conn_db_all = mysqli_connect(HOST, USERNAME, PASSWORD, DB_ALL);
if (!$conn_db_all) {
	die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL query to select devices from the database
$sql = "SELECT * FROM live_data_updates WHERE device_id IN ($user_devices) ORDER BY LENGTH(device_id), device_id";

// Execute the query and store available devices
$available_devices = [];
if ($result = mysqli_query($conn_db_all, $sql)) {
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$available_devices[] = $row['device_id'];
		}
	}
}

// Get the list of not available devices
$not_available_devices = array_diff($fdfd_array, $available_devices);

// Output the results
echo "Available Devices: " . implode(', ', $available_devices) . "<br><br>";
echo "Not Available Devices: " . implode(', ', $not_available_devices);

// Close the connection
mysqli_close($conn_db_all);

// Return the response in JSON format (if required)
echo json_encode($return_response);
?>
