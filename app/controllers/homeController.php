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


}

?>