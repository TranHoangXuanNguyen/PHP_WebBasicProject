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
    // show func
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
        $userId = $_SESSION['userId'] ?? null;
        if (!$userId) {
            die("User not logged in");
        }
        $userModel = new UserModel();
        $menuModel = new FoodModel();
        $orderId = $userModel->getOrCreatePendingOrder($userId);
        $orderItem = $userModel->getOrderItem($orderId, $foodId);
        if ($orderItem) {
            $userModel->updateOrderItemQuantity($orderId, $foodId, $quantity);
        } else {
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
    // ====================================================================================================================
    public function updateQuantity($foodId, $quantity)
    {
        $userId = $_SESSION['userId'] ?? null;
        if (!$userId) {
            echo json_encode(['success' => false, 'message' => 'User not logged in']);
            exit();
        }
        $userModel = new UserModel();
        $orderId = $userModel->getOrCreatePendingOrder($userId);
        if (!$orderId) {
            echo json_encode(['success' => false, 'message' => 'No pending order found']);
            exit();
        }
        $result = $userModel->updateQuantity($orderId, $foodId, $quantity);
        if ($result) {
            echo json_encode([
                'success' => true,
                'message' => 'Quantity updated successfully',
                'newQuantity' => $result['quantity'],
                'newPrice' => number_format($result['price'], 0, ',', '.') . ' VND',
                'totalAmount' => number_format($result['total_amount'], 0, ',', '.') . ' VND'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update quantity']);
        }
    }
}
