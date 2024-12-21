<!-- code base for sprint 3 -->
<?php

require_once(__DIR__ . '/../core/Controller.php');
require_once(__DIR__ . '/../models/MenuFoodModel.php');
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../config/config.php';

global $conn;

class MenuController extends Controller
{
    public function index()
    {
        $foodModel = new FoodModel();
        $data = $foodModel->getAllFoodItems();

        $this->view('MenuFood', $data);
    }

    function foodList($categoryId)
    {
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }

        $foodlistModel = new FoodModel();
        $foods =  $foodlistModel->foodListByCategory($categoryId);
        if (!empty($foods)) {
            $this->view('Foodlist', ['items' => $foods]);
        } else {
            echo " No food items found for this  category";
        }
    }

    function show($foodId)
    {
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }

        $foodDetailModel = new FoodModel();

        $fooddetail =  $foodDetailModel->detailFood($foodId);


        // Nếu tìm thấy món ăn
        if ($fooddetail != null) {
            $relevant = $foodDetailModel->relevantFood($foodId);

            $this->view('DetailFood', ['fooddetail' => $fooddetail, 'relevantfood' => $relevant]);
            // Hiển thị thông tin chi tiết của 1 món ăn 
        } else {
            echo "No food items found";
        }
    }
}
