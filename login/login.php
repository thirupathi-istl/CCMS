<?php
require("../config_db/config.php");

// Initialize variables
$mobile_no = "";
$e_mail = "";
$user_id = "";
$user_name = "";
$role = "";
$user_type = "";
$client = "";
$status = "";
$client_login = "";
$redirect = false;
$count = 0;
$login_id = 0;

// Create connection
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_USER);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$user_login_id = trim(strtolower(mysqli_real_escape_string($conn, $user_login_id)));
$password = trim(mysqli_real_escape_string($conn, $password));

// Prepare SQL statement
$sql = "SELECT * FROM login_details WHERE (mobile_no = ? OR email_id = ? OR user_id = ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $user_login_id, $user_login_id, $user_login_id);

if (mysqli_stmt_execute($stmt)) {
	$result = mysqli_stmt_get_result($stmt);
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		$r = mysqli_fetch_assoc($result);

		if (password_verify($password, $r['password'])) {
			$mobile_no = trim(strtolower($r['mobile_no']));
			$e_mail = trim(strtolower($r['email_id']));
			$user_id = $r['user_id'];
			$user_name = $r['name'];
			$role = $r['role'];
			$user_type = $r['user_type'];
			$client = $r['client'];
			$status = $r['status'];
			$client_login = $r['client_login'];
			$login_id = $r['id'];
		} else {
			$GLOBALS['login_error'] = "Invalid Credentials";
		}
	} else {
		$GLOBALS['login_error'] = $count > 1 ? "This account has multiple credentials. Please contact support." : "Invalid Credentials";
	}
} else {
	$GLOBALS['login_error'] = "Something went wrong. Please try again.";
}

mysqli_stmt_close($stmt);
if (strtoupper($status) === "ACTIVE") {
		
	$_SESSION['mobile_no'] = $mobile_no;
	$_SESSION['login_user_id'] = $user_id;
	$_SESSION['user_name'] = $user_name;
	$_SESSION['user_email'] = $e_mail;
	$_SESSION['role'] = $role;
	$_SESSION['user_type'] = $user_type;
	$_SESSION['client'] = $client;
	$_SESSION['status'] = $status;
	$_SESSION['client_login'] = $client_login;
	$_SESSION['user_login_id'] = $login_id;

	echo "<script> localStorage.setItem('client_type', '0'); </script>";

	$device_list = array();
	$group_list = array();

	$list = "`device_id`, `c_device_name` AS `device_name`";
	if ($role == "SUPERADMIN") {
		$list = "`device_id`, `s_device_name` AS `device_name`";
	}

	$sql = "SELECT $list FROM user_device_list WHERE login_id = ? ORDER BY LENGTH(device_id), device_id";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_bind_param($stmt, "i", $login_id);

	if (mysqli_stmt_execute($stmt)) {
		$result = mysqli_stmt_get_result($stmt);
		if (mysqli_num_rows($result) > 0) {
			$redirect = true;
			while ($r = mysqli_fetch_assoc($result)) {
				$device_list[] = array("d_id" => $r['device_id'], "d_name" => $r['device_name']);
			}
		} else {
			if ($role == "SUPERADMIN" || $role == "ADMIN") {
				header("location:device-list.php");
				exit();
			} else {
				$GLOBALS['login_error'] = "Please contact your admin.";
			}
		}
	} else {
		$GLOBALS['login_error'] = "Please try again later.";
	}

	mysqli_stmt_close($stmt);

	$sql_group_list = "SELECT `device_group_or_area` AS `group_list` FROM device_list_by_group WHERE login_id = ? GROUP BY device_group_or_area ORDER BY device_group_or_area";
	$stmt = mysqli_prepare($conn, $sql_group_list);
	mysqli_stmt_bind_param($stmt, "i", $user_id);

	if (mysqli_stmt_execute($stmt)) {
		$results = mysqli_stmt_get_result($stmt);
		if (mysqli_num_rows($results) > 0) {
			while ($r = mysqli_fetch_assoc($results)) {
				$group_list[] = array("GROUP" => strtoupper($r['group_list']));
			}
		}
	}

	$_SESSION["DEVICES_LIST"] = json_encode($device_list);
	$_SESSION["GROUP_LIST"] = json_encode($group_list);

	if ($redirect) {
		$_SESSION["login_time_stamp"] = time();
		header("location:index.php");
		exit();
	}
} else {
	$GLOBALS['login_error'] = "Your account is inactive.";
}


mysqli_close($conn);

function activity_log($conn, $mobile_no, $mail, $user_id)
{
	include('../account/client-login-details.php');

	$ip_address = $_SERVER['REMOTE_ADDR'];
	if ($ip_address != "::1") {
		$device_info = $_SERVER['HTTP_USER_AGENT'];
		$stmt = mysqli_prepare($conn, "INSERT INTO `user_activity_logs` (`user_id`, `mobile`, `email`, `activity`, `ip_address`, `country`, `subdivision`, `city`, `isp_name`, `device_details`, `date_time`) VALUES (?, ?, ?, 'LOGIN', ?, ?, ?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, "ssssssssss", $user_id, $mobile_no, $mail, $ip_address, $country, $subdivision, $city, $org, $device_info, $date);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
	}
}
?>
