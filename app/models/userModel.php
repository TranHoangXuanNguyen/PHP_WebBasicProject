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

    public function updateProfile($userId, $fullName, $address, $dob, $phoneNum, $avataImg)
    {
        $sql = "UPDATE user SET fullname = ?, address = ?, dob = ?, phoneNum = ?, avataImg = ? WHERE userId = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("ssssiss", $fullName,  $address, $dob, $phoneNum, $avataImg, $userId);
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
        $stmt->bind_param("ss", $newPassword, $userId);

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


        $userId = bin2hex(random_bytes(8));
        $query = "INSERT INTO user (userId, fullName, email, phoneNum, passWord, dob) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $this->connect->error);
        }
        $stmt->bind_param("ssssss", $userId, $fullName, $email, $phoneNum, $password, $dob);

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
    // Lấy sản phẩm để thêm vào trang thanh toán
        public function getOrder($userId){
            $sql = "SELECT 
                        f.foodName, f.foodImg, oi.price, oi.quantity, oi.foodId, oi.order_id
                        FROM orders o JOIN order_items oi 
                        ON o.order_id = oi.order_id JOIN fooditems f 
                        ON oi.foodId = f.foodId WHERE o.status = 'pending' and o.userId = '$userId' ";
            
            $result = mysqli_query($this->connect, $sql);

            $items = [];
            if ($result) {
                
                while ($row = $result->fetch_assoc()) {
                    $items[] = $row;
                }
            }
            return $items;
    }      
    public function updateStatus($status,$order_id,$subtotal){
            
        $sql = "UPDATE orders SET status = '$status',total_amount=$subtotal WHERE order_id = '$order_id' ";


        $result = mysqli_query($this->connect, $sql);
    
        return $result;

        }  

    // Cart order
    // Hàm kiểm tra tạo và lấy orderid của bảng orders
    public function getOrCreatePendingOrder($userId)
    {
        $sql = "SELECT order_id FROM orders WHERE userId = ? AND status = 'pending'";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc()['order_id'];
        }
        $sql = "INSERT INTO orders (userId, status, created_at) VALUES (?, 'pending', NOW())";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        return $this->connect->insert_id;
    }
    public function getOrderItemsByOrderId($orderId)
    {
        $sql = "SELECT order_items.order_item_id, order_items.order_id, fooditems.foodId, fooditems.foodName, fooditems.foodImg, order_items.quantity, order_items.price
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
        $sql = "SELECT quantity FROM order_items WHERE order_id = ? AND foodId = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("ii", $orderId, $foodId);
        $stmt->execute();
        $result = $stmt->get_result();
        $currentQuantity = $result->fetch_assoc()['quantity'] ?? 0;
        $newQuantity = $currentQuantity + $quantity;
        $sql = "UPDATE order_items SET quantity = ? WHERE order_id = ? AND foodId = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("iii", $newQuantity, $orderId, $foodId);
        return $stmt->execute();
    }
    public function updateQuantity($orderId, $foodId, $quantity)
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
    public function removeOrderItem($order_item_id)
    {
        $sql = "DELETE FROM order_items WHERE order_id = ? AND order_item_id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("i", $order_item_id);
        return $stmt->execute();
    }
    public function getOrderBystatus($userId, $status)
    {
        $sql = "SELECT * FROM orders WHERE userId = ? AND status = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bind_param("ss", $userId, $status);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        }
    public function userLoginByGoogle($idFromGoogle, $email, $username)
    {
        $sql = "SELECT * FROM user WHERE userId='{$idFromGoogle}'";
        $result = mysqli_query($this->connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
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
            $sql = "INSERT INTO user (userId, fullName, email, passWord, role) VALUES ('{$idFromGoogle}', '{$username}', '{$email}', 'googleUser', 'user')";
            if (mysqli_query($this->connect, $sql)) {
                $loginObject = new userModel();
                $loginObject->userId = $idFromGoogle;
                $loginObject->fullName = $username;
                $loginObject->email = $email;
                $loginObject->avataImg = "";
                $loginObject->address = "";
                $loginObject->role = "user";
                $loginObject->phoneNum = "";
                $loginObject->dob = "";
                return $loginObject;
            } else {
                return false;
            }
        }
    }
}
