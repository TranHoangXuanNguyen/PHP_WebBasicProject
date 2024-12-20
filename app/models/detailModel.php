<?php
require_once __DIR__ . '/../config/config.php';
global $conn;

class FoodDetailModel
{
    
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    
    public function detailFood($foodId)    {
            $sql="SELECT 
                fooditems.foodImg, 
                fooditems.foodName, 
                fooditems.price, 
                fooditems.detail, 
                fooditems.description, 
                fooditems.foodId, 
                categories.categoryId, 
                categories.categoryName 
            FROM fooditems 
            JOIN categories ON fooditems.categoryId = categories.categoryId
            WHERE fooditems.foodId = $foodId";

            $result = mysqli_query($this->conn, $sql);
            
        // Kiểm tra nếu có món ăn
        if (mysqli_num_rows($result) > 0) {
                $foodDetails = mysqli_fetch_assoc($result);
                return $foodDetails;
       }else{
            return null;
       }
    
}
    // Hiển thị 4 món ăn liên quan
    public function relevantFood($foodId){
        $sql = "SELECT
        fooditems.foodImg,
        fooditems.foodName,
        fooditems.price,
        fooditems.foodId
        FROM fooditems 
        WHERE fooditems.categoryId =(SELECT categoryId FROM fooditems WHERE fooditems.foodId=$foodId)
        LIMIT 3";

            $result = mysqli_query($this->conn, $sql);
            
            $foodrelevant=[];
            // Kiểm tra nếu có món ăn
           if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $foodrelevant[] = $row; 
            }
        }

        return    $foodrelevant; // Trả về danh sách món ăn
    }
}


    
