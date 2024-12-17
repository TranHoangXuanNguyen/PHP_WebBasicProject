<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/loginModel.php';
require_once __DIR__ . '/../config/config.php';

global $conn;

class foodlistController extends Controller
{
    // public function index()
    // {
    //     $data = ['default'];
    //     $this->view('Foodlist', $data);
    // }
    
    
    function displayFoodList()
    {
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }
        // if (!is_numeric($categoryId) || $categoryId <= 0) {
        //     echo "Invalid category ID.";
        //     return;
        // }
        
        $foodlistModel = new foodlistModel ();
        $foods=  $foodlistModel ->foodListByCategory();
        if(!empty( $foods)){
            $this->view('Foodlist', ['items' => $foods]);
        }else{
            echo" No food items found for this  category";
        }

    }
   
}


$foodlist=new foodlistController ();
$foodlist->displayFoodList();
