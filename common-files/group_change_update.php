<?php
require_once '../base-path/config-path.php';
require_once BASE_PATH.'config_db/config.php';
require_once BASE_PATH.'session/session-manager.php';
SessionManager::checkSession();
$sessionVars = SessionManager::SessionVariables();
$mobile_no = $sessionVars['mobile_no'];
$user_id = $sessionVars['user_id'];
$role = $sessionVars['role'];
$user_login_id = $sessionVars['user_login_id'];

$return_response = "";
$add_confirm = false;
$code ="";
$user_devices="";
$device_list = array ();
// /$group_id="ALL";

if ($_SERVER["REQUEST_METHOD"] == "POST"&&isset($_POST["GROUP_ID"])) 
{
	$group_id = $_POST['GROUP_ID'];


	$group_id=strtoupper(trim($group_id));

	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_USER);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} else {

		$sql = "";
		$group_by="";
		$stmt = "";

		$group_id = htmlspecialchars(mysqli_real_escape_string($conn, $group_id));

		require_once(BASE_PATH."common-files/client-super-admin-device-names.php");
		if($group_id=="ALL")
		{

			$sql = "SELECT $list FROM user_device_list WHERE login_id = ? ORDER BY LENGTH(device_id), device_id";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "i", $user_id);
		}
		else
		{
			$sql_group = "SELECT group_by FROM device_selection_group WHERE login_id = ?";
			$stmt_group = mysqli_prepare($conn, $sql_group);
			mysqli_stmt_bind_param($stmt_group, "i", $user_id);

			if (mysqli_stmt_execute($stmt_group)) {
				mysqli_stmt_store_result($stmt_group);
				mysqli_stmt_bind_result($stmt_group, $group_by);
				mysqli_stmt_fetch($stmt_group);
			} else {
				die("Error retrieving group_by: " . mysqli_error($conn));
			}
			mysqli_stmt_close($stmt_group);

			$sql = "SELECT $list FROM device_list_by_group WHERE login_id = ? AND $group_by = ? GROUP BY $group_by ORDER BY $group_by";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "is", $user_id, $group_id);

		}
		if (mysqli_stmt_execute($stmt)) {
			$results = mysqli_stmt_get_result($stmt);
			if (mysqli_num_rows($results) > 0) {
				while ($r = mysqli_fetch_assoc($results)) {
					$device_list[] = array("D_ID" => $r['device_id'], "D_NAME" => $r['device_name']);
				}
			}
		}
		mysqli_close($conn);

		$_SESSION["DEVICES_LIST"] =json_encode($device_list);

	}
	echo json_encode($device_list);
}
else
{
	echo json_encode("FAIL");
}

?>