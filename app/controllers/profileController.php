<?php
require_once './app/models/profileModel.php';
require_once('./app/core/Controller.php');
class ProfileController extends Controller
{
    public function index()
    {
        $data = ['default'];
        $this->view('Profile', $data);
    }
    public function Signout()
    {
        session_unset();
        session_destroy();
        header('Location: /Home');
        exit;
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
            $profileModelObj = new ProfileModel();
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
