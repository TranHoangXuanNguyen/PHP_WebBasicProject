<!-- home Controller -->
<?php

require_once('./app/core/Controller.php');
require_once('./app/models/homeModel.php');
class HomeController extends Controller
{
    public function index()
    {
        $data = ['default']; //init data but dont use, it only use to call function view
        $this->view('home', $data);
    }
}

?>