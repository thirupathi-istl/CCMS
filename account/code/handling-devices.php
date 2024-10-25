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
$client_dashboard_login  = $sessionVars['client'];
$dashboard_version = $sessionVars['client_login'];

$permission_check = 0;

// Initialize the response array
$userId ="2";
/*$devices="CCMS_49,CCMS_50";
$response = ["status" => "", "message" => ""];*/

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['STATUS'] === "DELETE") {
    // Sanitize and validate input fields
    $devices = trim(filter_input(INPUT_POST, 'DEVICES', FILTER_SANITIZE_STRING));
    $userId = trim(filter_input(INPUT_POST, 'USERID', FILTER_SANITIZE_STRING));

    // Validation checks
    if (empty($devices)) {
        $response['status'] = 'error';
        $response['message'] = "Devices are required.";
        sendResponse($response);
    }

    if (empty($userId)) {
        $response['status'] = 'error';
        $response['message'] = "User_ID is required.";
        sendResponse($response);
    }

    // Proceed with database update if no errors
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_USER);

    if (!$conn) {
        $response['status'] = 'error';
        $response['message'] = "Connection failed: " . mysqli_connect_error();
        sendResponse($response);
    } else {
        // Check user permissions...
        $sql = "SELECT user_details_updates FROM user_permissions WHERE login_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $user_login_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $permission_check);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if ($permission_check != 1) {
                $response['status'] = 'error';
                $response["message"] = "This account doesn't have permission to update.";
                mysqli_close($conn);
                sendResponse($response);
            }
        } else {
            $response['status'] = 'error';
            $response["message"] = "Error preparing query for user permissions: " . mysqli_error($conn);
            mysqli_close($conn);
            sendResponse($response);
        }

        if ($permission_check == 1) {
            // Sanitize inputs
            $devices = sanitize_input($devices, $conn);
            $userId = sanitize_input($userId, $conn);

            // Convert devices to an array and prepare them for the SQL query
            $deviceArray = explode(',', $devices);
            $deviceArray = array_map('trim', $deviceArray); // Remove any extra spaces
            $devicePlaceholders = implode(',', array_fill(0, count($deviceArray), '?')); // Creates a string like "?, ?, ?"
            
            // Prepare SQL statement for delete
            $query = "DELETE FROM `user_device_list` WHERE login_id = ? AND device_id IN ($devicePlaceholders)";
            if ($stmt = mysqli_prepare($conn, $query)) {
                // Bind parameters to the prepared statement
                mysqli_stmt_bind_param($stmt, 's' . str_repeat('s', count($deviceArray)), $userId, ...$deviceArray);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    $response['status'] = 'success';
                    $response['message'] = "Devices deleted successfully.";
                } else {
                    $response['status'] = 'error';
                    $response['message'] = "Error deleting devices.";
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                $response['status'] = 'error';
                $response['message'] = "Error preparing statement.";
            }
        }

        // Close the database connection
        mysqli_close($conn);
    }

    // Output the JSON response
    sendResponse($response);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['STATUS'] === "ADD") {
    // Sanitize and validate input fields
    $devices = trim(filter_input(INPUT_POST, 'DEVICES', FILTER_SANITIZE_STRING));
    $userId = trim(filter_input(INPUT_POST, 'USERID', FILTER_SANITIZE_STRING));

    // Validation checks
    if (empty($devices)) {
        $response['status'] = 'error';
        $response['message'] = "Devices are required.";
        sendResponse($response);
    }

    if (empty($userId)) {
        $response['status'] = 'error';
        $response['message'] = "User_ID is required.";
        sendResponse($response);
    }

    // Proceed with database update if no errors
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_USER);

    if (!$conn) {
        $response['status'] = 'error';
        $response['message'] = "Connection failed: " . mysqli_connect_error();
        sendResponse($response);
    } else {
        // Check user permissions...
        $sql = "SELECT user_details_updates FROM user_permissions WHERE login_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $user_login_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $permission_check);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if ($permission_check != 1) {
                $response['status'] = 'error';
                $response["message"] = "This account doesn't have permission to update.";
                mysqli_close($conn);
                sendResponse($response);
            }
        } else {
            $response['status'] = 'error';
            $response["message"] = "Error preparing query for user permissions: " . mysqli_error($conn);
            mysqli_close($conn);
            sendResponse($response);
        }

        if ($permission_check == 1) {
            // Sanitize inputs
            $devices = sanitize_input($devices, $conn);
            $userId = sanitize_input($userId, $conn);

            // Convert devices to an array and prepare them for the SQL query
            $deviceArray = explode(',', $devices);
            $deviceArray = array_map('trim', $deviceArray); // Remove any extra spaces

            // Fetch the role from login_details table
            $roleQuery = "SELECT role FROM login_details WHERE id = ?";
            $stmt = mysqli_prepare($conn, $roleQuery);
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $userId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $userRole);
                mysqli_stmt_fetch($stmt);
                mysqli_stmt_close($stmt);
            } else {
                $response['status'] = 'error';
                $response["message"] = "Error fetching user role: " . mysqli_error($conn);
                mysqli_close($conn);
                sendResponse($response);
            }

            // Check if devices exist for the current user ($user_login_id)
            $devicePlaceholders = implode(',', array_fill(0, count($deviceArray), '?'));
            $checkQuery = "SELECT `device_id`, `c_device_name`, `s_device_name` FROM `user_device_list` WHERE login_id = ? AND device_id IN ($devicePlaceholders)";
            if ($stmt = mysqli_prepare($conn, $checkQuery)) {
                mysqli_stmt_bind_param($stmt, 's' . str_repeat('s', count($deviceArray)), $user_login_id, ...$deviceArray);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                $existingDevices = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $existingDevices[] = $row;
                }
                mysqli_stmt_close($stmt);

                if (!empty($existingDevices)) {
                    // Devices to be added to the new user ($userId)
                    $insertQuery = "INSERT INTO `user_device_list` (`device_id`, `c_device_name`, `s_device_name`, `role`, `login_id`) VALUES ";
                    $values = [];
                    $types = '';
                    $params = [];

                    foreach ($existingDevices as $device) {
                        $values[] = "(?, ?, ?, ?, ?)";
                        $types .= 'sssss';
                        $params[] = $device['device_id'];
                        $params[] = $device['c_device_name'];
                        $params[] = $device['s_device_name'];
                        $params[] = $userRole; // Add the fetched role
                        $params[] = $userId; // Add the new user id
                    }

                    $insertQuery .= implode(',', $values);

                    if ($stmt = mysqli_prepare($conn, $insertQuery)) {
                        mysqli_stmt_bind_param($stmt, $types, ...$params);

                        if (mysqli_stmt_execute($stmt)) {
                            $response['status'] = 'success';
                            $response['message'] = "Devices added successfully.";
                        } else {
                            $response['status'] = 'error';
                            $response['message'] = "Error adding devices.";
                        }

                        mysqli_stmt_close($stmt);
                    } else {
                        $response['status'] = 'error';
                        $response['message'] = "Error preparing statement for adding devices.";
                    }
                } else {
                    $response['status'] = 'error';
                    $response['message'] = "No matching devices found for the user.";
                }
            } else {
                $response['status'] = 'error';
                $response['message'] = "Error preparing statement for checking devices.";
            }
        }

        // Close the database connection
        mysqli_close($conn);
    }

    // Output the JSON response
    sendResponse($response);
}

function sendResponse($response) {
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

function sanitize_input($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($conn, $data);
}



?>