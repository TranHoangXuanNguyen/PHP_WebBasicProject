<!-- home Controller -->
<?php
require_once(__DIR__ . '/../core/Controller.php');
require_once( __DIR__ . '/../models/MenuFoodModel.php');  
class MenuController extends Controller
{
    public function index()
    {
        $foodModel = new FoodModel();
        $data = $foodModel->getAllFoodItems(); 
        
        $this->view('MenuFood', $data);
    }
}

?>