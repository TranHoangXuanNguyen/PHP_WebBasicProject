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
    public static function createFood()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $foodName = $_POST['foodName'];
            $foodImg = $_POST['foodImg'];
            $description = $_POST['description'];
            $detail = $_POST['detail'];
            $price = $_POST['price'];
            $categoryId = $_POST['categoryId'];
            $objData = new AdminModelFooditem();
            $objtransfer = new AdminModelFooditem();

            $objData->foodName = ($foodName);
            $objData->description = ($description);
            $objData->detail = ($detail);
            $objData->price = ($price);
            $objData->categoryId = ($categoryId);
            $objData->foodImg = $foodImg;
            $objtransfer->createFood($objData);
        }
        header('Location: /admin');
        exit();
    }
    public static function updateFood($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $foodName1 = $_POST['foodName1'];
            $foodImg1 = $_POST['foodImg1'];
            $description1 = $_POST['description1'];
            $detail1 = $_POST['detail1'];
            $price1 = $_POST['price1'];
            $objData1 = new AdminModelFooditem();
            $objtransfer1 = new AdminModelFooditem();

            $objData1->foodName = ($foodName1);
            $objData1->description = ($description1);
            $objData1->detail = ($detail1);
            $objData1->price = ($price1);
            $objData1->foodImg = $foodImg1;
            $resule = $objtransfer1->updateFood($id, $objData1);
        }
        if ($resule) {
            header('Location: /admin');
            exit();
        } else {
            echo 'Update failed';
        }
    }

    public function fetchdata($page)
    {

        $allowed_pages = ['AdminDashboard', 'AdminFoodItem', 'AdminUser'];
        if ($page == 'AdminDashboard') {
            $data = ['default123123123'];
        }
        if ($page == 'AdminFoodItem') {
            $objData = new AdminModelFooditem();
            $listdata = $objData->getAllFoodItem();
            $data = ['allfooditems' => $listdata];
        }
        if ($page == 'AdminUser') {
            $objData = new AdminModelUser();
            $listdata = $objData->getAllUser();
            $data = ['allusers' => $listdata];
        }
        if (in_array($page, $allowed_pages)) {
            $this->view('/adminview/' . $page, $data);
        } else {
            echo 'Page not found.';
        }
    }

    public function deleteFood($id)
    {
        $objtransfer1 = new AdminModelFooditem();
        $result = $objtransfer1->deleteFood($id);
        if ($result) {
            echo 'bla';
        } else {
            echo 'blibli';
        }
    }

    // user manager
    public static function createUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $foodName = $_POST['foodName'];
            $foodImg = $_POST['foodImg'];
            $description = $_POST['description'];
            $detail = $_POST['detail'];
            $price = $_POST['price'];
            $categoryId = $_POST['categoryId'];
            $objData = new AdminModelFooditem();
            $objtransfer = new AdminModelFooditem();

            $objData->foodName = ($foodName);
            $objData->description = ($description);
            $objData->detail = ($detail);
            $objData->price = ($price);
            $objData->categoryId = ($categoryId);
            $objData->foodImg = $foodImg;
            $objtransfer->createFood($objData);
        }
        header('Location: /admin');
        exit();
    }
    public static function updateUser($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $foodName1 = $_POST['foodName1'];
            $foodImg1 = $_POST['foodImg1'];
            $description1 = $_POST['description1'];
            $detail1 = $_POST['detail1'];
            $price1 = $_POST['price1'];
            $objData1 = new AdminModelFooditem();
            $objtransfer1 = new AdminModelFooditem();

            $objData1->foodName = ($foodName1);
            $objData1->description = ($description1);
            $objData1->detail = ($detail1);
            $objData1->price = ($price1);
            $objData1->foodImg = $foodImg1;
            $resule = $objtransfer1->updateFood($id, $objData1);
        }
        if ($resule) {
            header('Location: /admin');
            exit();
        } else {
            echo 'Update failed';
        }
    }
}

?>