<?php
require_once './app/models/AboutUsModel.php';
require_once('./app/core/Controller.php');

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUsModel = new AboutUsModel(); 
        $foodItems = $aboutUsModel->getfoodImg();
        $totalFoodItems = $aboutUsModel->getQtyFood();
        $data = [
            'foodItems' => $foodItems,
            'totalFoodItems' => $totalFoodItems
        ];
        $this->view('AboutUs', $data);
    }
}
