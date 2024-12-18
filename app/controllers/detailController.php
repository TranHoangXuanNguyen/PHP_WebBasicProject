
<?php
require_once(__DIR__ . '/../core/Controller.php');
require_once __DIR__ . '/../models/detailModel.php';
require_once __DIR__ . '/../config/config.php';

global $conn;

class DetailController extends Controller
{

    function show($foodId)
    {
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }

        $foodDetailModel = new FoodDetailModel();
        
        $fooddetail=  $foodDetailModel ->detailFood($foodId);
        
        // Nếu tìm thấy món ăn
        if ($fooddetail!=null) {
              // Hiển thị thông tin chi tiết của 1 món ăn 
              $this->view('DetailFood', ['fooddetail'=> $fooddetail]);
        } else {
            echo "No food items found";
        }

    }
  
   
}
