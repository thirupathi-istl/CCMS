<?php
$login_error="";
require_once '../base-path/config-path.php';
require_once '../session/session-manager.php';

SessionManager::startSession();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {   
	SessionManager::login("ap");
	echo "<script>
	localStorage.setItem('client_type', 'ap');
	window.location.href = '" . BASE_PATH . "0/index.php';
	</script>";
	exit();
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
	<title>Login</title>  

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="generator" content="Hugo 0.122.0">
	<link href="<?php echo BASE_PATH?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo BASE_PATH?>assets/css/sidebars.css" rel="stylesheet">
	<link href="<?php echo BASE_PATH?>assets/css/istl-styles.css" rel="stylesheet">
	<link href="<?php echo BASE_PATH?>assets/css/login-styles.css" rel="stylesheet">
	<script src="<?php echo BASE_PATH?>assets/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo BASE_PATH?>assets/js/sidebars.js"></script>
	<script src="<?php echo BASE_PATH?>assets/js/color-modes-login.js"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" ></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<?php
	include(BASE_PATH."assets/html/body-start.php");
	include(BASE_PATH."assets/icons-svg/icons.php");
	include(BASE_PATH."assets/html/theme-selection.php");
	?>
	<div class="background " >
		<?php
		//include(BASE_PATH."login/tg-redco.php");
		include(BASE_PATH."login/login-card.php");
		include(BASE_PATH."login/registration-toast.php");
		?>
	</div>
</body>
<script src="<?php echo BASE_PATH;?>assets/js/project/preloader.js"></script>
</html>
