<!-- blabla -->
<!-- Admin Controller -->
<?php

require_once('./app/core/Controller.php');
require_once('./app/models/adminModelUser.php');
require_once('./app/models/adminModelFoodItem.php');
require_once('./app/models/adminModelOrder.php');

class AdminController extends Controller
{
    public function index()
    {
        $data = ['default'];
        $this->view('AdminDashboard', $data);
    }
    public function Signout()
    {
        session_unset();
        session_destroy();
        header('Location: /Home');
        exit;
    }
    public function foodManager()
    {
        $data = ['default'];
        $this->view('AdminDashboard', $data);
    }
    public function fetchdata($page)
    {

        $allowed_pages = ['AdminDashboard', 'AdminFoodItem', 'profile'];
        if ($page == 'AdminDashboard') {
            $data = ['default123123123'];
        }
        if ($page == 'AdminFoodItem') {
            $data = ['defaultaaaaa'];
        }
        if (in_array($page, $allowed_pages)) {
            $this->view('/adminview/' . $page, $data);
        } else {
            echo 'Page not found.';
        }
    }
}

?>