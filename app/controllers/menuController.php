<!-- code base for sprint 3 -->
<?php

require_once('./app/core/Controller.php');
class MenuController extends Controller
{
    public function index()
    {
        $data = ['default'];
        $this->view('menuFood', $data);
    }
    public function FoodList()
    {
        $data = ['default'];
        $this->view('FoodList', $data);
    }
}

?>