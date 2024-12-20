<?php
require_once __DIR__ . '/../config/config.php';
global $conn;
class profileModel
{
    private $conn;
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function updateProfile($userId, $fullName, $email, $address, $dob, $phoneNum, $avataImg)
    {
        $sql = "UPDATE user SET fullname = ?, email = ?, address = ?, dob = ?, phoneNum = ?, avataImg = ? WHERE userId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssisi", $fullName, $email, $address, $dob, $phoneNum, $avataImg, $userId);
        return $stmt->execute();
    }


    public function updateAvatarImg($userId, $avatarPath)
    {
        $sql = "UPDATE user SET avataImg = ? WHERE userId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $avatarPath, $userId);
        return $stmt->execute();
    }

    public function changePassword($userId, $newPassword)
    {
        $sql = "UPDATE user SET password = ? WHERE userId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $newPassword, $userId);

        return $stmt->execute();
    }
}
