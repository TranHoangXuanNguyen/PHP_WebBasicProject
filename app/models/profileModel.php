<?php

class profileModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function updateProfile($userId, $fullName, $email, $address,$dob)
    {
        $sql = "UPDATE user SET fullname = ?, email= ?, address=?, dob=? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssi", $fullName,  $email, $address,$dob,$userId);

        return $stmt->execute();
    }

    public function updateAvatarImg($userId, $avatarPath)
    {
        $sql = "UPDATE user SET avataImg = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $avatarPath, $userId);

        return $stmt->execute();
    }
    
    public function changePassword($userId, $newPassword)
    {
        $sql = "UPDATE user SET password = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $newPassword, $userId);

        return $stmt->execute();
    }
}
