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

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $type = filter_input(INPUT_POST, 'TYPE', FILTER_SANITIZE_STRING); 
    $id = filter_input(INPUT_POST, 'D_ID', FILTER_SANITIZE_STRING); 



    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_ALL);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        exit();
    }
    $type = sanitize_input($type, $conn);
    $id = sanitize_input($id, $conn);
// Initialize date range based on type
    switch ($type) {
        case 'LAST_WEEK':
        $start_date = date("Y-m-d", strtotime("-1 week"));
        $end_date = date("Y-m-d");
        break;
        case 'CURRENT_WEEK':
        $start_date = date("Y-m-d", strtotime("last Sunday"));
        $end_date = date("Y-m-d");
        break;
        case 'LAST_MONTH':
        $start_date = date("Y-m-01", strtotime("first day of last month"));
        $end_date = date("Y-m-t", strtotime("last day of last month"));
        break;
        case 'PRESENT_MONTH':
        $start_date = date("Y-m-01");
        $end_date = date("Y-m-d");
        break;

        case 'LATEST':
        $start_date = date("Y-m-01");
        $end_date = date("Y-m-d");
        break;

        case 'CUSTOMRANGE':

        $start_date = $_POST['STARTDATE'];
        $end_date = $_POST['ENDDATE'];
        $start_date = date('Y-m-d', strtotime($start_date));
        $end_date = date('Y-m-d', strtotime($end_date));
        $start_date = sanitize_input($start_date, $conn);
        $end_date = sanitize_input($end_date, $conn);
        break;
        default:
        echo json_encode([]);
        exit();
    }

    $stmt = "";
    if($type==="LATEST")
    {
        $query = "SELECT `date` AS day,`r_up` AS glowing_hours_phaseR,  `r_down` AS non_glowing_hours_phaseR, `y_up` AS glowing_hours_phaseY, 
        `y_down` AS non_glowing_hours_phaseY, `b_up` AS glowing_hours_phaseB, `b_down` AS non_glowing_hours_phaseB, `total_active_time` AS TotalActiveHours, `total_inactive_hours` AS TotalInActiveHours FROM lighthours_bar  WHERE device_id = ? ORDER BY id DESC LIMIT 10";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $id);
    }
    else
    {
        $query = "SELECT `date` AS day,`r_up` AS glowing_hours_phaseR,  `r_down` AS non_glowing_hours_phaseR, `y_up` AS glowing_hours_phaseY, 
        `y_down` AS non_glowing_hours_phaseY, `b_up` AS glowing_hours_phaseB, `b_down` AS non_glowing_hours_phaseB, `total_active_time` AS TotalActiveHours, `total_inactive_hours` AS TotalInActiveHours FROM lighthours_bar  WHERE device_id = ? AND `date` BETWEEN ? AND ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sss", $id, $start_date, $end_date);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    echo json_encode($data);
   

}
function sanitize_input($data, $conn) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return mysqli_real_escape_string($conn, $data);
}
?>
