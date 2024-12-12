<?php
require_once './app/core/Controller.php';
require_once './app/models/RegisterModel.php';
require_once __DIR__ . '/../config/config.php';
global $conn;

class profileController extends Controller
{
    private $profileModel;

    public function __construct($conn)
    {
        $this->profileModel = new profileModel($conn);
    }

    public function updateProfile($userId, $fullName, $email, $address, $dob)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === true) {
                $userId = $_SESSION['userId'];
                $fullName = !empty($_POST['fullName']) ? $_POST['fullName'] : $_SESSION['fullName'];
                $email = !empty($_POST['email']) ? $_POST['email'] : $_SESSION['email'];
                $address = !empty($_POST['address']) ? $_POST['address'] : $_SESSION['address'];
                $dob = !empty($_POST['dob']) ? $_POST['dob'] : $_SESSION['dob'];
        
                $this->profileModel->updateProfile($userId, $fullName, $email, $address, $dob);
        
                // Cập nhật lại thông tin trong session
                $_SESSION['fullName'] = $fullName;
                $_SESSION['email'] = $email;
                $_SESSION['address'] = $address;
                $_SESSION['dob'] = $dob;
        
                $_SESSION['success_message'] = "Cập nhật thông tin thành công!";
            } else {
                $_SESSION['error_message'] = "Bạn cần đăng nhập để cập nhật thông tin!";
            }
            header("Location: /Profile");
            exit;
        }
        
    }

    public function updateAvatarImg($userId)
    {
        $avatarPath = "/uploads/avatars/" . basename($_FILES['avatar']['name']);
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], __DIR__ . $avatarPath)) {
            if ($this->profileModel->updateAvatarImg($userId, $avatarPath)) {
                $_SESSION['success_message'] = "Cập nhật ảnh đại diện thành công!";
            } else {
                $_SESSION['error_message'] = "Cập nhật ảnh đại diện thất bại.";
            }
        } else {
            $_SESSION['error_message'] = "Không thể tải ảnh lên.";
        }
        header("Location: /Profile");
        exit;
    }

    public function changePassword($userId, $newPassword, $confirmPassword)
    {
        if ($newPassword === $confirmPassword) {
            if ($this->profileModel->changePassword($userId, $newPassword)) {
                $_SESSION['success_message'] = "Đổi mật khẩu thành công!";
            } else {
                $_SESSION['error_message'] = "Đổi mật khẩu thất bại.";
            }
        } else {
            $_SESSION['error_message'] = "Mật khẩu xác nhận không trùng khớp.";
        }
        header("Location: /Profile");
        exit;
    }
}

?>