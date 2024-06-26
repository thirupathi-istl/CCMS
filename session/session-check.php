<?php
session_start();

$timeout_duration = 900; // Set timeout duration in seconds (5 minutes = 300 seconds)

if (isset($_POST['action']) && $_POST['action'] == 'refresh') {
    $_SESSION['last_activity'] = time();
    echo json_encode(['status' => 'refreshed']);
    exit();
}

if (isset($_SESSION['last_activity'])) {
    $elapsed_time = time() - $_SESSION['last_activity'];
    if ($elapsed_time > $timeout_duration) {
        /*session_unset();
        session_destroy();*/
        echo json_encode(['status' => 'logout']);
        exit();
    }
    echo json_encode(['status' => 'active']);
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();
echo json_encode(['status' => 'active']);
?>
