<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/loginModel.php';
require_once __DIR__ . '/../config/config.php';

global $conn;
session_unset();

class loginController extends Controller {
    function userLogin($email, $passWord) {
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }
        $loginmodel = new loginModel($conn);
        $result = $loginmodel->login($email, $passWord);
        if ($result === false) {
            $data = "Login failed, please check your information again";
            $this->view('Login', ['error' => $data]);
        } elseif ($result) {
            $_SESSION['email'] = $result->email;
            $_SESSION['userId'] = $result->userId;
            $_SESSION['role'] = $result->role;
            if ($result->role == 'admin') {
                header("Location: /AdminDashboard.php");
                exit;
            } elseif ($result->role == 'user') {
                header("Location: /Home");
                exit;
            } else {
                echo "Role không hợp lệ";
            }
        }
    }
}

$loginControllerObj = new loginController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $passWord = htmlspecialchars($_POST['passWord']);

    if (empty($email) || empty($passWord)) {
        $loginControllerObj->view('Login', ['error' => 'Email & Password are required']);
    } else {
        $loginControllerObj->userLogin($email, $passWord);
    }
} else {
    $loginControllerObj->view('Login', []);
}
?>
