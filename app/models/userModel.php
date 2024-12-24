<?php
require_once __DIR__ . '/../config/config.php';
global $conn;
class userModel
{
    public $userId;
    public $fullName;
    public $email;
    public $passWord;
    public $avataImg;
    public $address;
    public $role;
    public $phoneNum;
    public $dob;
    public $connect;
    public function __construct()
    {
        global $conn;
        $this->connect = $conn;
    }

    public function updateProfile($userId, $fullName, $email, $address, $dob, $phoneNum, $avataImg)
    {
        $sql = "UPDATE user SET fullname = ?, email = ?, address = ?, dob = ?, phoneNum = ?, avataImg = ? WHERE userId = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("ssssisi", $fullName, $email, $address, $dob, $phoneNum, $avataImg, $userId);
        return $stmt->execute();
    }


    public function updateAvatarImg($userId, $avatarPath)
    {
        $sql = "UPDATE user SET avataImg = ? WHERE userId = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("si", $avatarPath, $userId);
        return $stmt->execute();
    }

    public function changePassword($userId, $newPassword)
    {
        $sql = "UPDATE user SET password = ? WHERE userId = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("si", $newPassword, $userId);

        return $stmt->execute();
    }
    public function registerUser($fullName, $email, $phoneNum, $password, $dob)
    {
        // Check if email already exists
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Email already use!";
            return $error;
        }


        // $passwordHashed = password_hash($password, PASSWORD_DEFAULT);


        $query = "INSERT INTO user (fullName, email, phoneNum, passWord, dob) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        $stmt->bind_param("sssss", $fullName, $email, $phoneNum, $password, $dob);

        if ($stmt->execute()) {
            return true;
        } else {
            return "Đăng ký thất bại: " . $stmt->error;
        }
    }
    public function login($email, $passWord)
    {
        $sql = "SELECT * FROM user WHERE email='{$email}'";
        $result = mysqli_query($this->connect, $sql);

        // Kiểm tra nếu có kết quả
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if ($passWord == $row['passWord']) {
                $loginObject = new userModel();
                $loginObject->userId = $row['userId'];
                $loginObject->fullName = $row['fullName'];
                $loginObject->email = $row['email'];
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

    // Cart order
    public function getPendingOrderId($userId)
    {
        $sql = "SELECT order_id FROM orders WHERE userId = ? AND status = 'pending'";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc()['order_id'];
        }

        return null;
    }

    public function createPendingOrder($userId)
    {
        $sql = "INSERT INTO orders (userId, status, created_at) VALUES (?, 'pending', NOW())";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        return $this->connect->insert_id;
    }


    public function getOrderItemsByOrderId($orderId)
    {
        $sql = "SELECT order_items.order_id, fooditems.foodId, fooditems.foodName, fooditems.foodImg, order_items.quantity, order_items.price
            FROM order_items
            JOIN fooditems ON order_items.foodId = fooditems.foodId
            WHERE order_items.order_id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();

        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderItem($orderId, $foodId)
    {
        $sql = "SELECT * FROM order_items WHERE order_id = ? AND foodId = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("ii", $orderId, $foodId);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }

    public function updateOrderItemQuantity($orderId, $foodId, $quantity)
    {
        $sql = "UPDATE order_items SET quantity = ? WHERE order_id = ? AND foodId = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("iii", $quantity, $orderId, $foodId);
        return $stmt->execute();
    }

    public function addOrderItem($orderId, $foodId, $quantity, $price)
    {
        $sql = "INSERT INTO order_items (order_id, foodId, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("iiid", $orderId, $foodId, $quantity, $price);
        return $stmt->execute();
    }
}
