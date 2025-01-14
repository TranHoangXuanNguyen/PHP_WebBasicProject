<?php
//ket noi db
require_once __DIR__ . '/../config/config.php';
global $conn;
class AdminModelFooditem
{
    public $connect;
    public $foodId;
    public $foodImg;
    public $foodName;
    public $categoryId;
    public $price;
    public $detail;
    public $description;
    public $userId;
    public $fullName;
    public $email;
    public $passWord;
    public $avataImg;
    public $address;
    public $role;
    public $phoneNum;
    public $dob;
    public $order_id;
    public $status;
    public $total_amount;
    public $created_at;
    public function __construct()
    {
        global $conn;
        $this->connect = $conn;
    }
    public function getAllFoodItem()
    {
        $sql = "SELECT * FROM fooditems ORDER BY categoryId ASC";
        $result = mysqli_query($this->connect, $sql);
        $foodItems = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $foodItem = new AdminModelFooditem();
                $foodItem->foodId = $row['foodId'];
                $foodItem->foodImg = $row['foodImg'];
                $foodItem->foodName = $row['foodName'];
                $foodItem->categoryId = $row['categoryId'];
                $foodItem->price = $row['price'];
                 $foodItem->detail = $row['detail'];
                $foodItem->description = $row['description'];
                $foodItems[] = $foodItem;
            }
            return $foodItems;
        } else {
            return false;
        }
    }
    public function createFood($fooditem)
    {
        $foodName = $fooditem->foodName;
        $foodImg = $fooditem->foodImg;
        $description = $fooditem->description;
        $detail = $fooditem->detail;
        $price = $fooditem->price;
        $categoryId = $fooditem->categoryId;
        $sql = "insert INTO fooditems (foodName, foodImg, price, categoryId, detail, description) 
        VALUES ('$foodName', '$foodImg', '$price', '$categoryId', '$detail', '$description')";
        if (mysqli_query($this->connect, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function updateFood($id, $fooditem)
    {
        $foodName = $fooditem->foodName;
        $foodImg = $fooditem->foodImg;
        $description = $fooditem->description;
        $detail = $fooditem->detail;
        $price = $fooditem->price;
        $sql = "UPDATE fooditems
        SET foodName = '$foodName', foodImg = '$foodImg', price = '$price', detail = '$detail', description = '$description' 
        WHERE foodId = $id";
        if (mysqli_query($this->connect, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteFood($id)
    {
        $sql = "
        delete from fooditems
        WHERE foodId = $id";
        if (mysqli_query($this->connect, $sql)) {
            return true;
        } else {
            return false;
        }
    }
    public function getFoodById($id)
    {
        $sql = "SELECT * FROM fooditems WHERE foodId = $id";
        $result = mysqli_query($this->connect, $sql);
        return $result;
    }
    public function countItemBycategory()
    {
        $sql = "SELECT categoryId, COUNT(*) as count FROM fooditems GROUP BY categoryId;";
        $result = mysqli_query($this->connect, $sql);

        $countByCategory = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $countByCategory[$row['categoryId']] = $row['count'];
        }
        return $countByCategory;
    }
    public function getAllUser()
    {
        $sql = "SELECT * FROM user ";
        $result = mysqli_query($this->connect, $sql);
        $listUser = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user = new AdminModelFooditem();
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
    public function getOrder($status)
    {
        $sql = "
        select * from orders
        WHERE orders.status = '$status'";
        $result = mysqli_query($this->connect, $sql);
        $listOrder = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $orderItem = new AdminModelFooditem();
                $orderItem->userId = $row['userId'];
                $orderItem->order_id = $row['order_id'];
                $orderItem->status = $row['status'];
                $orderItem->total_amount = $row['total_amount'];
                $orderItem->created_at = $row['created_at'];
                $listOrder[] = $orderItem;
            }
            return $listOrder;
        }
    }
    public function confirmOrder($order_id, $isConfirm)
    {
        if ($isConfirm == 1) {
            $status = 'completed';
        } else {
            $status = 'canceled';
        }
        $sql = "UPDATE orders SET status = ? WHERE order_id = ?";
        $stmt = $this->connect->prepare($sql);
        if ($stmt === false) {
            error_log("Error preparing SQL statement: " . $this->connect->error);
            return false;
        }
        $stmt->bind_param("si", $status, $order_id);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            error_log("Error executing SQL: " . $stmt->error);
            return false;
        }
        // Close the prepared statement
        $stmt->close();
    }
    public function getTableByStatus($status)
    {
        $sql = "SELECT * FROM reservations WHERE status = '$status'";
        $result = mysqli_query($this->connect, $sql);
        $listTable = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // $table = new AdminModelFooditem();
                // $table->tableId = $row['tableId'];
                // $table->status = $row['status'];
                $listTable[] = $row;
            }
            return $listTable;
        }
    }
    public function getIncome()
    {
        $sql = "SELECT SUM(total_amount) AS total_income FROM orders WHERE status = 'completed' AND MONTH(created_at) = MONTH(NOW())";
        $result = mysqli_query($this->connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['total_income'];
        }
        return 0;
    }
    public function getIncomeEachMonth()
    {
        $sql = "SELECT 
                    MONTH(created_at) AS month,
                    SUM(total_amount) AS total_income
                FROM orders 
                WHERE status = 'completed' 
                GROUP BY MONTH(created_at);";
        $result = mysqli_query($this->connect, $sql);
        $listTable = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $listTable[$row['month']] = $row['total_income'];
            }
            return $listTable;
        }
        return [];
    }

    public function setBooking($id, $status)
    {
        if ($status === 'yes') {
            $input = 'cancelled';
        } else {
            $input = 'done';
        }
        $sql = "UPDATE `reservations` SET `status` = ? WHERE `id` = ?;";
        if ($stmt = $this->connect->prepare($sql)) {
            $stmt->bind_param("si", $input, $id);
            return $stmt->execute();
        } else {
            return false;
        }
    }
}
