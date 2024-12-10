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

        public function login($email,$passWord){
            $bla = 'hehe';
            $sql="SELECT*FROM user where email='{$email}' and passWord='{$passWord}' ";
            
            $result =  mysqli_query($this->connect,$sql);

            if (mysqli_num_rows($result)>0){
                    $row=mysqli_fetch_assoc($result) ;//lấy từng hàng kết quả dưới dạng mảng liên kết.
                    $loginObject = new loginModel($bla);
                    $loginObject->userId = $row['userId'];
                    $loginObject->fullName=$row['fullName'];
                    $loginObject->email=$row['email'];
                    $loginObject->passWord=$row['passWord'];
                    $loginObject->avataImg= $row['avataImg'];
                    $loginObject->address=$row['address'];
                    $loginObject->role=$row['role'];
                    $loginObject->phoneNum=$row['phoneNum'];
                    $loginObject->dob=$row['dob'];
            // tuong tu gan gia tri
            return $loginObject;
            }else{
                return false;
            }
            
        }

      
            
}

?>