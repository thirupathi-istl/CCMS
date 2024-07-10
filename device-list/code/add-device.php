<?php
require_once '../../base-path/config-path.php';
require_once BASE_PATH_1.'config_db/config.php';
require_once BASE_PATH_1.'session/session-manager.php';
SessionManager::checkSession();
$sessionVars = SessionManager::SessionVariables();

$mobile_no = $sessionVars['mobile_no'];
$user_id = $sessionVars['user_id'];
$role = $sessionVars['role'];
$user_login_id = $sessionVars['user_login_id'];

$return_response = "";
$add_confirm = false;
$code ="";

/*$device_id = "CCMS_2";
$device_name = $device_id;
$activation_code = "12345678";*/

// Uncomment this section if using POST method

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Check if any field is empty
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_USER);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} else {

		$device_id = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['D_ID']));
		$device_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['D_NAME']));
		$activation_code = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['ACTIVATION_CODE']));


    	// Check user permissions
		$sql = "SELECT device_add_remove FROM user_permissions WHERE login_id = ?";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "s", $user_login_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt, $device_add_remove);
		mysqli_stmt_fetch($stmt);
		mysqli_stmt_close($stmt);

		if ($device_add_remove != 1) {
			echo json_encode("No permission to add device");
			mysqli_close($conn);
			exit();
		}

		if ($role !== "SUPERADMIN") {
			if (empty($device_id) || empty($device_name) || empty($activation_code)) {
				echo json_encode("All fields are required");
				mysqli_close($conn);
				exit();
			}
		} else {
			if (empty($device_id)) {
				echo json_encode("Please enter device ID");
				mysqli_close($conn);
				exit();
			}
		}

    	// Check if deviceID already exists
		$sql = "SELECT id FROM user_device_list WHERE device_id = ? AND login_id = ?";
		$stmt = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt, "ss", $device_id, $user_login_id);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);

		if (mysqli_stmt_num_rows($stmt) > 0) {
			$return_response = "Device ID already exists.";
		} 
		else 
		{
			mysqli_stmt_close($stmt);
			
			$sql = "SELECT code FROM activation_codes WHERE device_id = ?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "s", $device_id);
			if (mysqli_stmt_execute($stmt)) 
			{
				$result = mysqli_stmt_get_result($stmt);
				if (mysqli_num_rows($result) > 0) {
					$r = mysqli_fetch_assoc($result);
					$code = $r['code']; 
					if ($role !== "SUPERADMIN") 
					{
						if ($activation_code === $code) {
							$add_confirm = true;
						} else {
							$return_response="Incorrect activation code";
						}

					} else {
						$add_confirm = true;
					}
				}
				else
				{
					$return_response="Device ID / Activation code is not Available in the database";
				}
			}
			mysqli_stmt_close($stmt);
			

			if ($add_confirm) {
				$sql = "INSERT INTO user_device_list (device_id, c_device_name, s_device_name, role, login_id) VALUES (?, ?, ?, ?, ?)";
				$stmt = mysqli_prepare($conn, $sql);
				mysqli_stmt_bind_param($stmt, "ssssi", $device_id, $device_name, $device_name, $role, $user_login_id);

				if (mysqli_stmt_execute($stmt)) {
					$return_response = "New device added successfully.";
				} else {
					$return_response = "Error: " . mysqli_stmt_error($stmt);
				}
				mysqli_stmt_close($stmt);
			}
		}
		mysqli_close($conn);
	}
}
else
{
	$return_response="Data not Available";
}

echo json_encode($return_response);
?>
