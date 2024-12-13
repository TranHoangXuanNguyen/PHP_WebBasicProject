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

    public function updateProfile($userId, $fullName, $email, $address, $dob)
    {
        $sql = "UPDATE user SET fullname = ?, email= ?, address=?, dob=? WHERE userId = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $fullName,  $email, $address, $dob, $userId);
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
