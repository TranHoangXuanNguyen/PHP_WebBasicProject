<!-- home Controller -->
<?php

    require_once('./app/core/Controller.php');
    require_once('./app/models/homeModel.php');
    class homeController extends Controller{}
    $Home = new homeController();
    $Home->view("Home",$data);
?>