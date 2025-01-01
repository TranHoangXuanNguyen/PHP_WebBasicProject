<!-- Admin Controller -->
<?php
require_once('./app/core/Controller.php');
require_once('./app/models/adminModelFoodItem.php');
class AdminController extends Controller
{
    public function index()
    {
        // Create the models to handle different types of data
        $objDataF = new AdminModelFooditem();  // Model for food items
        $objDataU = new  AdminModelFooditem();      // Model for users (assuming you need a separate model for users)
        $listdataF = $objDataF->getAllFoodItem();
        $listdataU = $objDataU->getAllUser();
        $listdataFCount = $objDataF->countItemBycategory();
        $totalIncome = $objDataF->getIncome();
        $imcomeEachMonth = $objDataF->getIncomeEachMonth();
        $data = [
            'allfooditems' => $listdataF,
            'allusers' => $listdataU,
            'countbycategory' => $listdataFCount,
            'totalMoney' => $totalIncome,
            'imcomeEachMonth' => $imcomeEachMonth,
        ];
        // $data = ['blabla'];

        // Pass the data to the view
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

        $allowed_pages = ['Dashboard', 'FoodItem', 'User', 'Confirm', 'Booking'];
        if ($page == 'Dashboard') {
            $objDataF = new AdminModelFooditem();
            $objDataU = new AdminModelFooditem();
            $listdataF = $objDataF->getAllFoodItem();
            $listdataU = $objDataU->getAllUser();
            $totalMoney = $objDataU->getIncome();

            $data = ['allfooditems' => $listdataF, 'allusers' => $listdataU, 'totalMoney' => $totalMoney];
        }
        if ($page == 'FoodItem') {
            $objData = new AdminModelFooditem();
            $listdata = $objData->getAllFoodItem();
            $data = ['allfooditems' => $listdata];
        }
        if ($page == 'User') {
            $objData = new AdminModelFooditem();
            $listdata = $objData->getAllUser();
            $data = ['allusers' => $listdata];
        }
        if ($page == 'Confirm') {
            $objData = new AdminModelFooditem();
            $listdata = $objData->getOrder('processing');
            $data = ['listOrderProcess' => $listdata];
        }
        if ($page == 'Booking') {
            $objData = new AdminModelFooditem();
            $listdata = $objData->getTableByStatus('pending');
            $data = ['listTablePending' => $listdata];
        }
        if (in_array($page, $allowed_pages)) {
            $this->view('/admin/' . $page, $data);
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
            $userName = $_POST['userName'];
            $userImg = $_POST['userImg'];
            $passWord = $_POST['passWord'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            $phoneNum = $_POST['phone'];
            $birthDay = $_POST['birthDay'];
            $objData = new AdminModelFooditem();
            $objtransfer = new AdminModelFooditem();

            $objData->fullName = ($userName);
            $objData->passWord = ($passWord);
            $objData->email = ($email);
            $objData->address = ($address);
            $objData->role = ($role);
            $objData->phoneNum = ($phoneNum);
            $objData->role = ($role);
            $objData->dob = ($birthDay);
            $objData->avataImg = $userImg;
            $objtransfer->createUser($objData);
        }
        header('Location: /admin');
        exit();
    }
    public static function updateUser($id)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $userName = $_POST['userName'];
            $userImg = $_POST['userImg'];
            $passWord = $_POST['passWord'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            $phoneNum = $_POST['phone'];
            $birthDay = $_POST['birthDay'];
            $objData = new AdminModelFooditem();
            $objtransfer = new AdminModelFooditem();

            $objData->fullName = ($userName);
            $objData->passWord = ($passWord);
            $objData->email = ($email);
            $objData->address = ($address);
            $objData->role = ($role);
            $objData->phoneNum = ($phoneNum);
            $objData->role = ($role);
            $objData->dob = ($birthDay);
            $objData->avataImg = $userImg;
            $resule = $objtransfer->updateUser($id, $objData);
        }
        if ($resule) {
            header('Location: /admin');
            exit();
        } else {
            echo 'Update failed';
        }
    }
    public function deleteUser($id)
    {
        $objtransfer1 = new AdminModelFooditem();
        $result = $objtransfer1->deleteUser($id);
        if ($result) {
            echo 'bla';
        } else {
            echo 'blibli';
        }
    }
    public function confirmOrder($order_id, $isConfirm)
    {
        $objtransfer1 = new AdminModelFooditem();
        $result = $objtransfer1->confirmOrder($order_id, $isConfirm);
        return $result;
    }
    public function setBookingStatus($id, $status)
    {
        $objtransfer = new AdminModelFooditem();
        $result = $objtransfer->setBooking($id, $status);
        if ($result) {
            http_response_code(200);  // Success
            echo json_encode(['message' => 'Booking canceled successfully']);
        } else {
            http_response_code(400);  // Bad request or failure
            echo json_encode(['message' => 'Failed to cancel booking']);
        }
    }
}

?>