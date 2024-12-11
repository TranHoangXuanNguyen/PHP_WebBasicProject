<?php
require_once './app/core/Controller.php';
require_once './app/models/RegisterModel.php';
require_once __DIR__ . '/../config/config.php';
global $conn;

require_once __DIR__ . '/../mailler/src/Exception.php';
require_once __DIR__ . '/../mailler/src/PHPMailer.php';
require_once __DIR__ . '/../mailler/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RegisterController extends Controller
{
    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }
    public function registerController($fullName, $email, $phone, $password, $dob)
{
    $registerModel = new RegisterModel($this->conn);
    $result = $registerModel->registerUser($fullName, $email, $phone, $password, $dob);

    if ($result === true) {
        WelcomeMailer::sendWelcomeEmail($fullName, $email, $password);

        header('Location: /Login');
        exit();
    } else {
        $_SESSION['error_message'] = $result;
        header('Location: /Register');
        exit();
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
        return true; // Không có lỗi
    }
}

// Khởi tạo đối tượng controller
$registerController = new RegisterController($conn);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy dữ liệu từ form
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $dob = $_POST['dob'];

    // Kiểm tra dữ liệu nhập vào
    
    $isValid = $registerController->validateInput($email, $phone, $password, $confirmPassword);

    if (!$isValid) {
        // Nếu có lỗi, giữ lại thông báo lỗi và chuyển hướng về form đăng ký
        $registerController->view('Register', ['error' => $_SESSION['error_message']]);
        unset($_SESSION['error_message']); // Xóa thông báo lỗi sau khi hiển thị
    } else {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $registerController->registerController($fullName, $email, $phone, $hashedPassword, $dob);
    }
} else {
    // Khi không phải là POST request, hiển thị trang đăng ký
    $registerController->view('Register', []);
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

            // Thông tin người gửi và người nhận
            $mail->setFrom('be.y26@student.passerellesnumeriques.org', 'MaMa Kitchen');
            $mail->addAddress($email, $fullName);

            // Nội dung email
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to MaMa Kitchen';
            $mail->Body    = 'Xin chào ' . $fullName . ',<br><br>Cảm ơn bạn đã đăng ký. Chúc bạn có trải nghiệm tuyệt vời!<br><br>'
                . 'Mật khẩu của bạn là: ' . $password . '<br><br>Chúc bạn một ngày tốt lành!';
            $mail->AltBody = 'Xin chào ' . $fullName . "\n"
                . 'Mật khẩu của bạn là: ' . $password . "\n\nChúc bạn một ngày tốt lành!";



            // Gửi email
            $mail->send();
            echo 'Email đã được gửi thành công';
        } catch (Exception $e) {
            echo "Email không gửi được. Lỗi: {$mail->ErrorInfo}";
        }
    }
}
