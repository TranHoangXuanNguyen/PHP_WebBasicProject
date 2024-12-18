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
}
