<?php
//ket noi db
require_once __DIR__ . '/../config/config.php';
global $conn;

class loginModel {
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


    public function __construct($conn) {
        $this->connect = $conn;
    }

    public function login($email, $passWord) {
        $sql = "SELECT * FROM user WHERE email='{$email}'";
        $result = mysqli_query($this->connect, $sql);
    
        // Kiểm tra nếu có kết quả
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    
            if ($passWord == $row['passWord']) { 
                $loginObject = new loginModel($this->connect);
                $loginObject->userId = $row['userId'];
                $loginObject->fullName = $row['fullName'];
                $loginObject->email = $row['email'];
                $loginObject->passWord = $row['passWord'];
                $loginObject->avataImg = $row['avataImg'];
                $loginObject->address = $row['address'];
                $loginObject->role = $row['role'];
                $loginObject->phoneNum = $row['phoneNum'];
                $loginObject->dob = $row['dob'];
                return $loginObject; 
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    

      
            
}

?>