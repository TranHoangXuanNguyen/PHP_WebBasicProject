<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/userModel.php';
require_once __DIR__ . '/../mailler/src/Exception.php';
require_once __DIR__ . '/../mailler/src/PHPMailer.php';
require_once __DIR__ . '/../mailler/src/SMTP.php';
global $conn;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class userController extends Controller
{
    public function login()
    {
        $data = ['default'];
        $this->view('Login', $data);
    }
    function userLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $passWord = htmlspecialchars($_POST['passWord']);
        }
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }
        $userModel = new userModel();
        $result = $userModel->login($email, $passWord);
        if ($result === false) {
            // Nếu mật khẩu hoặc email sai
            $_SESSION['error_message'] = "Invalid email or password. Please try again.";
            $_SESSION['username_input'] = $email;
            header("Location: user/Login");
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

    // register
    public function register()
    {
        $data = ['default'];
        $this->view('Register', $data);
    }
    public function userRegister()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $fullName = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $dob = $_POST['dob'];
        }
        $registerController = new userController();
        $isValid = $registerController->validateInput($email, $phone, $password, $confirmPassword);

        if (!$isValid) {
            $registerController->view('Register', ['error' => $_SESSION['error_message']]);
            unset($_SESSION['error_message']);
        } else {


            $registerModel = new userModel();
            $result = $registerModel->registerUser($fullName, $email, $phone, $password, $dob);
            if ($result === true) {
                WelcomeMailer::sendWelcomeEmail($fullName, $email, $password);
                $data = ['default'];
                $this->view('Login', $data);
                exit();
            } else {
                $_SESSION['error_message'] = $result;
                header('Location:/Register');
                exit();
            }
        }
    }
    public function validateInput($email, $phone, $password, $confirmPassword)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_message'] = "Email invalid!";
            return false;
        } elseif (!preg_match('/^[0-9]{9,11}$/', $phone)) {
            $_SESSION['error_message'] = "Phone number must contain 9-11 digits!";
            return false;
        } elseif ($password !== $confirmPassword) {
            $_SESSION['error_message'] = "Password and confirm password do not match!";
            return false;
        }
        return true;
    }

    // profile
    public function Signout()
    {
        session_unset();
        session_destroy();
        header('Location: /Home');
        exit;
    }

    public function profile()
    {
        $data = ['default'];
        $this->view('Profile', $data);
    }

    public function EditAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['userId'];
            $editname = $_POST['editname'];
            $editemail = $_POST['editemail'];
            $editdate = $_POST['editdate'];
            $editaddress = $_POST['editaddress'];
            $editphoneNum = $_POST['editphoneNum'];
            $editavataUrl = $_POST['editavataUrl'];
            $profileModelObj = new userModel();
            $result = $profileModelObj->updateProfile($userId, $editname, $editemail, $editaddress, $editdate, $editphoneNum, $editavataUrl);
            if ($result) {
                $_SESSION['email'] = $editemail;
                $_SESSION['fullName'] = $editname;
                $_SESSION['address'] = $editaddress;
                $_SESSION['dob'] = $editdate;
                $_SESSION['phoneNum'] = $editphoneNum;
                $_SESSION['avataImg'] = $editavataUrl;
                header('Location: /Profile');
            } else {
                $_SESSION['error_message'] = 'Cập nhật tài khoản thất bại!';
            }
        }
    }
}
class WelcomeMailer
{
    public static function sendWelcomeEmail($fullName, $email, $password)
    {
        $mail = new PHPMailer(true);
        try {
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'be.y26@student.passerellesnumeriques.org';
            $mail->Password = 'c s z l e m q p l n c r m a i f';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom('be.y26@student.passerellesnumeriques.org', 'MaMa Kitchen');
            $mail->addAddress($email, $fullName);
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to MaMa Kitchen';
            $mail->Body    = 'Xin chào ' . $fullName . ',<br><br>Cảm ơn bạn đã đăng ký. Chúc bạn có trải nghiệm tuyệt vời!<br><br>'
                . 'Mật khẩu của bạn là: ' . $password . '<br><br>Chúc bạn một ngày tốt lành!';
            $mail->AltBody = 'Xin chào ' . $fullName . "\n"
                . 'Mật khẩu của bạn là: ' . $password . "\n\nChúc bạn một ngày tốt lành!";
            $mail->send();
            // echo 'Email đã được gửi thành công';
        } catch (Exception $e) {
            echo "Email không gửi được. Lỗi: {$mail->ErrorInfo}";
        }
    }
}














// $loginControllerObj = new loginController();

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $email = $_POST['email'];
//     $passWord = htmlspecialchars($_POST['passWord']);
//     $loginControllerObj->userLogin($email, $passWord);
// } else {
//     $loginControllerObj->index();
// }
