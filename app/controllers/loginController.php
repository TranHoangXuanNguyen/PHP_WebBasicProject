<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/loginModel.php';
require_once __DIR__ . '/../config/config.php';

global $conn;
// session_unset();
// session_start();
class loginController extends Controller {
    function userLogin($email, $passWord) {
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }

        $loginmodel = new loginModel($conn);
        $result = $loginmodel->login($email, $passWord);
        if ($result === false) {
            // Nếu mật khẩu hoặc email sai
            $_SESSION['error_message'] = "Invalid email or password. Please try again.";
            $_SESSION['username_input'] = $email;
            header("Location: /Login");
            exit;
        } elseif ($result) {
            session_unset();
            // Nếu đăng nhập thành công
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
    $loginControllerObj->userLogin($email, $passWord);
} else {
    $loginControllerObj->view('Login', []);
}
?>
