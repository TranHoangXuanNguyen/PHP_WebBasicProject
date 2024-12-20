<?php
require_once __DIR__ . '/../config/config.php';
global $conn;
class AboutUsModel
{
    private $conn;
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    public function getfoodImg()
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
            WHERE 
                fooditems.foodId IN (12, 15, 32, 41) -- Chỉ lấy món ăn có foodId cụ thể
            GROUP BY 
                categories.categoryId;

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
    public function getQtyFood() {
        $query = "SELECT COUNT(*) AS total FROM fooditems";
        $result = $this->conn->query($query);
        $data = [];
    
        if ($result) {
            $data = $result->fetch_assoc(); 
        }
    
        return $data['total'] ?? 0; 
    }
    
}
