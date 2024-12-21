<!-- home Controller -->
<?php

require_once('./app/core/Controller.php');
require_once('./app/models/homeModel.php');
class HomeController extends Controller
{
    public function index()
    {
        $data = ['default']; 
        $this->view('home', $data);
    }
    public function aboutUs()
    {
        $aboutUsModel = new HomeModel(); 
        $foodItems = $aboutUsModel->getfoodImg();
        $totalFoodItems = $aboutUsModel->getQtyFood();
        $data = [
            'foodItems' => $foodItems,
            'totalFoodItems' => $totalFoodItems
        ];
        $this->view('AboutUs', $data);
    }
}


?>