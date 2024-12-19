<?php
    require_once __DIR__ . '/../config/config.php';
    global $conn;
    class FoodModel {
        private $conn;
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }  
        public function getAllFoodItems() {
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
        
    }    
    ?>