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
}
