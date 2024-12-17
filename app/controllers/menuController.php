<!-- code base for sprint 3 -->
 <?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/foodlistModel.php';
require_once __DIR__ . '/../config/config.php';

global $conn;

class MenuController extends Controller
{
   
    function foodList($categoryId)
    {
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }

        $foodlistModel = new FoodlistModel();
        $foods=  $foodlistModel ->foodListByCategory($categoryId);
        if(!empty( $foods)){
            $this->view('Foodlist', ['items' => $foods]);
        }else{
            echo" No food items found for this  category";
        }

    }
   
}
