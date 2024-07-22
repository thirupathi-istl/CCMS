<?php
require_once '../../base-path/config-path.php';
require_once BASE_PATH_1 . 'config_db/config.php';
require_once BASE_PATH_1 . 'session/session-manager.php';
SessionManager::checkSession();
$sessionVars = SessionManager::SessionVariables();

$mobile_no = $sessionVars['mobile_no'];
$user_id = $sessionVars['user_id'];
$role = $sessionVars['role'];
$user_login_id = $sessionVars['user_login_id'];
$user_name = $sessionVars['user_name'];
$user_email = $sessionVars['user_email'];
$permission_check = 0;

$d_name = "";
$data = "";
$count = 0;
$device_list = json_decode($_SESSION["DEVICES_LIST"]);

$send = array();
$send = "";
$user_devices = "";
foreach ($device_list as $key => $value) {
	$id = $value->D_ID;
	$user_devices = $user_devices . "'" . $id . "',";
}
if ($user_devices != "") {
	$user_devices = substr($user_devices, 0, -1);
}

$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_ALL);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
} else {
	$sql = "SELECT * FROM live_data_updates WHERE device_id IN ($user_devices) ORDER BY LENGTH(device_id), device_id";

	if ($result = mysqli_query($conn, $sql)) {
		if (mysqli_num_rows($result) > 0) {
			$count = 1;

			while ($r = mysqli_fetch_assoc($result)) {
				foreach ($device_list as $key => $value) {
					$id = $value->D_ID;

					if ($r['device_id'] == $id) {
						$d_name = "<small class='font-small'> (" . $value->D_NAME . ")</small>";
						$db = strtolower($id);
						include("set_parameters.php");
						include("table_cells.php");
						break;
					}
				}
			}
		} else {
			$data = '<tr><td class="text-danger" colspan="75">No records found</td></tr>';
		}
	} else {
		$data = '<tr><td class="text-danger" colspan="75">Error executing query: ' . mysqli_error($conn) . '</td></tr>';
	}
	mysqli_close($conn);
}

echo json_encode($data);
?>
