<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/loginModel.php';
require_once __DIR__ . '/../config/config.php';

global $conn;
// session_unset();
// session_start();
class loginController extends Controller
{
    public function index()
    {
        $data = ['default'];
        $this->view('Login', $data);
    }

    function userLogin($email, $passWord)
    {
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }

        $loginmodel = new loginModel();
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
            $_SESSION['isLogin'] = true;
            $_SESSION['email'] = $result->email;
            $_SESSION['userId'] = $result->userId;
            $_SESSION['fullName'] = $result->fullName;
            $_SESSION['avataImg'] = $result->avataImg;
            $_SESSION['address'] = $result->address;
            $_SESSION['phoneNum'] = $result->phoneNum;
            $_SESSION['dob'] = $result->dob;
            if ($result->role == 'admin') {
                header("Location: /admin");
                $_SESSION['role'] = 'admin';
                exit;
            } elseif ($result->role == 'user') {
                header("Location: /Home");
                $_SESSION['role'] = 'user';
                 exit;
            } else {
                echo "Role không hợp lệ";
            }
        }
    }
}

$loginControllerObj = new loginController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $passWord = htmlspecialchars($_POST['passWord']);
    $loginControllerObj->userLogin($email, $passWord);
} else {
    $loginControllerObj->index();
}
