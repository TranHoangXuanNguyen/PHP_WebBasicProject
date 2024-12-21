<?php
require_once __DIR__ . '/../config/config.php';
global $conn;
class FoodModel
{
    private $conn;
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    public function getAllFoodItems()
    {
        $query = "
                SELECT 
                    categories.categoryId, 
                    categories.categoryName AS category, 
                    fooditems.foodId, 
                    fooditems.foodName AS item, 
                    fooditems.price, 
                    fooditems.foodImg AS image_url
                FROM 
                    categories
                INNER JOIN 
                    fooditems 
                ON 
                    categories.categoryId = fooditems.categoryId
                ORDER BY 
                  categories.categoryId, fooditems.foodName;
            ";
        $result = $this->conn->query($query);
        $data = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function foodListByCategory($categoryId)
    {
        // Lấy danh sách các món ăn
        $sql = "SELECT fooditems.foodImg, fooditems.foodName, fooditems.price ,fooditems.foodId
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
    public function detailFood($foodId)
    {
        $sql = "SELECT 
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
        } else {
            return null;
        }
    }
    // Hiển thị 4 món ăn liên quan
    public function relevantFood($foodId)
    {
        $sql = "SELECT
    fooditems.foodImg,
    fooditems.foodName,
    fooditems.price,
    fooditems.foodId
    FROM fooditems 
    WHERE fooditems.categoryId =(SELECT categoryId FROM fooditems WHERE fooditems.foodId=$foodId)
    LIMIT 3";

        $result = mysqli_query($this->conn, $sql);

        $foodrelevant = [];
        // Kiểm tra nếu có món ăn
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $foodrelevant[] = $row;
            }
        }

        return    $foodrelevant; // Trả về danh sách món ăn
    }
}
