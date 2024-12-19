
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
            $relevant=$foodDetailModel ->relevantFood($foodId);

        $this->view('DetailFood', ['fooddetail'=> $fooddetail,'relevantfood'=> $relevant]);   
                     // Hiển thị thông tin chi tiết của 1 món ăn 
        } else {
            echo "No food items found";
        }

        


    }
  
   
}
