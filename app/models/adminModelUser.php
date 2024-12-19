<?php
//ket noi db
require_once __DIR__ . '/../config/config.php';
global $conn;

class AdminModelUser
{
    public $connect;
    public $userId;
    public $fullName;
    public $email;
    public $passWord;
    public $avataImg;
    public $address;
    public $role;
    public $phoneNum;
    public $dob;


    public function __construct()
    {
        global $conn;
        $this->connect = $conn;
    }

    public function getAllUser()
    {
        $sql = "SELECT * FROM user ";
        $result = mysqli_query($this->connect, $sql);

        $listUser = [];

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user = new AdminModelUser();
                $user->userId = $row['userId'];
                $user->fullName = $row['fullName'];
                $user->email = $row['email'];
                $user->passWord = $row['passWord'];
                $user->avataImg = $row['avataImg'];
                $user->address = $row['address'];
                $user->role = $row['role'];
                $user->phoneNum = $row['phoneNum'];
                $user->dob = $row['dob'];
                $listUser[] = $user;
            }
            return $listUser;
        } else {
            return false;
        }
    }



    public function createUser($user)
    {
        $fullName = $user->fullName;
        $email = $user->email;
        $passWord = $user->passWord;
        $avataImg = $user->avataImg;
        $address = $user->address;
        $role = $user->role;
        $phoneNum = $user->phoneNum;
        $dob = $user->dob;


        $sql = "insert INTO user (fullName, email, passWord, avataImg, address, role,phoneNum,dob) 
        VALUES ('$fullName', '$email', '$passWord', '$avataImg', '$address', '$role','$phoneNum','$dob')";

        if (mysqli_query($this->connect, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUser($id, $user)
    {
        $fullName = $user->fullName;
        $email = $user->email;
        $passWord = $user->passWord;
        $avataImg = $user->avataImg;
        $address = $user->address;
        $role = $user->role;
        $phoneNum = $user->phoneNum;
        $dob = $user->dob;
        $sql = "UPDATE user
        SET fullName = '$fullName', email = '$email', passWord = '$passWord', avataImg = '$avataImg', address = '$address' ,role = '$role', phoneNum = '$phoneNum' , dob = '$dob'  
        WHERE userId = $id";

        if (mysqli_query($this->connect, $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($id)
    {
        $sql = "
        delete from user
        WHERE userId = $id";

        if (mysqli_query($this->connect, $sql)) {
            return true;
        } else {
            return false;
        }
    }
}
