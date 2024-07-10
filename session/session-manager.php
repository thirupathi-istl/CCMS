<?php
class SessionManager {
    public static function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function login($clientType, $user_login_id,  $password) {
        self::startSession();
        $_SESSION['client_type'] = $clientType;
        require("../login/login.php");


    }

    public static function logout() {
        self::startSession();
        if (isset($_SESSION['client_type'])) {
            $clientType = $_SESSION['client_type'];

            $path=BASE_PATH.$clientType;            
            session_unset();
            //session_destroy();
            echo "<script>
            localStorage.removeItem('client_type');
            window.location.href = '$path/login.php';
            </script>";
            exit();
        }
    }

    public static function SessionVariables() {
        self::startSession();

        return [
            'mobile_no' => $_SESSION['mobile_no'],
            'user_id' => $_SESSION['login_user_id'],
            'user_name' => $_SESSION['user_name'],
            'user_email' => $_SESSION['user_email'],
            'role' => $_SESSION['role'],
            'user_type' => $_SESSION['user_type'],
            'client' => $_SESSION['client'],
            'status' => $_SESSION['status'],
            'client_login' => $_SESSION['client_login'],
            'user_login_id' => $_SESSION['user_login_id']
        ];


    }
    public static function checkSession() {
        self::startSession();
        if (!isset($_SESSION['client_type'])) {
            echo "<script>
            var clientType = localStorage.getItem('client_type');
            if(clientType!='0')
            {
                if (clientType) 
                {
                    window.location.href = '" . BASE_PATH . "' + clientType + '/login.php';
                } 
                else 
                {
                    window.location.href = 'login.php';
                }
            }
            else
            {
                window.location.href = 'login.php';
            }
            </script>";
            exit();

        }
    }
}
?>
