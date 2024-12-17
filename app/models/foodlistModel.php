<?php
require_once __DIR__ . '/../config/config.php';
global $conn;

class FoodlistModel
{
    
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function foodListByCategory($categoryId)
    {
        // Lấy danh sách các món ăn
        $sql = "SELECT fooditems.foodImg, fooditems.foodName, fooditems.price 
                FROM fooditems 
                JOIN categories ON fooditems.categoryId = categories.categoryId
                WHERE categories.categoryId = $categoryId";

        $result = mysqli_query($this->conn, $sql);

        $foodList = [];  

        // Kiểm tra nếu có món ăn
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $foodList[] = $row; 
            }
        }

        return $foodList; // Trả về danh sách món ăn
    }
}
