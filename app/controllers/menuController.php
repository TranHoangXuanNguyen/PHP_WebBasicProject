<!-- code base for sprint 3 -->
<?php

require_once(__DIR__ . '/../core/Controller.php');
require_once(__DIR__ . '/../models/MenuFoodModel.php');
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../config/config.php';
require_once(__DIR__ . '/../models/userModel.php');


global $conn;

class MenuController extends Controller
{
    public function index()
    {
        $foodModel = new FoodModel();
        $data = $foodModel->getAllFoodItems();

        $this->view('MenuFood', $data);
    }

    function foodList($categoryId)
    {
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }

        $foodlistModel = new FoodModel();
        $foods =  $foodlistModel->foodListByCategory($categoryId);
        if (!empty($foods)) {
            $this->view('Foodlist', ['items' => $foods]);
        } else {
            echo " No food items found for this  category";
        }
    }

    function show($foodId)
    {
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }

        $foodDetailModel = new FoodModel();

        $fooddetail =  $foodDetailModel->detailFood($foodId);


        // Nếu tìm thấy món ăn
        if ($fooddetail != null) {
            $relevant = $foodDetailModel->relevantFood($foodId);

            $this->view('DetailFood', ['fooddetail' => $fooddetail, 'relevantfood' => $relevant]);
            // Hiển thị thông tin chi tiết của 1 món ăn 
        } else {
            echo "No food items found";
        }

    }
    public function addtocart($foodId, $quantity)
{
    // session_start();
    $userId = $_SESSION['userId'] ?? null;

    if (!$userId) {
        die("User not logged in");
    }

    $userModel = new UserModel();
    $menuModel = new FoodModel();
    $orderId = $userModel->getPendingOrderId($userId);

    if (!$orderId) {
        $orderId = $userModel->createPendingOrder($userId);
    }

    // Lấy thông tin orderItem từ giỏ hàng
    $orderItem = $userModel->getOrderItem($orderId, $foodId);

    if ($orderItem) {
        // Nếu món ăn đã tồn tại trong giỏ hàng, cập nhật số lượng
        $newQuantity = $orderItem['quantity'] + $quantity;
        $userModel->updateOrderItemQuantity($orderId, $foodId, $newQuantity);
    } else {
        // Nếu món ăn chưa có trong giỏ hàng, thêm mới
        $foodDetails = $menuModel->detailFood($foodId); // Lấy thông tin món ăn
        if (!$foodDetails) {
            die("Food item not found.");
        }

        $price = $foodDetails['price']; // Lấy giá món ăn
        $userModel->addOrderItem($orderId, $foodId, $quantity, $price);
    }

    // Trả về thông báo thành công
    echo json_encode([
        'status' => 'success',
        'message' => 'Sản phẩm đã được thêm vào giỏ hàng!',
    ]);
}
}



