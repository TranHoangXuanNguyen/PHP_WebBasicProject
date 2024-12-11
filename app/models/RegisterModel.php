<?php

class RegisterModel
{
    public $userId;
    public $fullName;
    public $email;
    public $phone;
    public $password;
    public $dob;

    private $conn;

    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    public function registerUser($fullName, $email, $phoneNum, $password, $dob)
    {
        // Check if email already exists
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email already use!";
            return $error;
        } 


        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);


        $query = "INSERT INTO user (fullName, email, phoneNum, passWord, dob) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssss", $fullName, $email, $phoneNum, $passwordHashed, $dob);

        if ($stmt->execute()) {
            return true;
        } else {
            return "Đăng ký thất bại: " . $stmt->error;
        }
    }
}