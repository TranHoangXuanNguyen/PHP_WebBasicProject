<?php
require_once __DIR__ . '/../core/Controller.php';
// require_once __DIR__ . '/../models/menuFoodController.php';
require_once __DIR__ . '/../mailler/src/Exception.php';
require_once __DIR__ . '/../mailler/src/PHPMailer.php';
require_once __DIR__ . '/../mailler/src/SMTP.php';
require_once(__DIR__ . '/../models/userModel.php');
require_once(__DIR__ . '/../models/HomeModel.php');


global $conn;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class userController extends Controller
{
    public function login()
    {
        $data = ['default'];
        $this->view('Login', $data);
    }


    function userLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $passWord = htmlspecialchars($_POST['passWord']);
        }
        global $conn;
        if (!$conn) {
            die("Connection to database failed");
        }
        $userModel = new userModel();
        $result = $userModel->login($email, $passWord);
        if ($result === false) {
            // Nếu mật khẩu hoặc email sai
            $_SESSION['error_message'] = "Invalid email or password. Please try again.";
            $_SESSION['username_input'] = $email;
            header("Location: /user/Login");
            exit;
        } elseif ($result) {
            session_unset();
            // Nếu đăng nhập thành công
            $_SESSION['isLogin'] = true;
            $_SESSION['email'] = $result->email;
            $_SESSION['userId'] = $result->userId;
            $_SESSION['fullName'] = $result->fullName;
            $_SESSION['avataImg'] = $result->avataImg;
            $_SESSION['address'] = $result->address;
            $_SESSION['phoneNum'] = $result->phoneNum;
            $_SESSION['dob'] = $result->dob;
            if ($result->role == 'admin') {
                header("Location: /admin");
                $_SESSION['role'] = 'admin';
                exit;
            } elseif ($result->role == 'user') {
                header("Location: /Home");
                $_SESSION['role'] = 'user';
                exit;
            } else {
                echo "Role không hợp lệ";
            }
        }
    }


    function userLoginByGoogle()
    {
        session_start();
        $jsonData = file_get_contents('php://input');
        $data = json_decode($jsonData, true);
        if (isset($data['uid'], $data['email'], $data['displayName'])) {
            $idFromGoogle = $data['uid'];
            $email = $data['email'];
            $username = $data['displayName'];
            $userModel = new userModel();
            $result = $userModel->userLoginByGoogle($idFromGoogle, $email, $username);
            if ($result === false) {
                $_SESSION['error_message'] = "Login by Google is not valid, try again.";
                header("Location: /user/Login");
            } elseif ($result) {
                $_SESSION['isLogin'] = true;
                $_SESSION['email'] = $result->email;
                $_SESSION['userId'] = $result->userId;
                $_SESSION['fullName'] = $result->fullName;
                $_SESSION['avataImg'] = $result->avataImg;
                $_SESSION['address'] = $result->address;
                $_SESSION['phoneNum'] = $result->phoneNum;
                $_SESSION['dob'] = $result->dob;
                if ($result->role == 'admin') {
                    $_SESSION['role'] = 'admin';
                    header("Location: /admin");
                    exit;
                } elseif ($result->role == 'user') {
                    $_SESSION['role'] = 'user';
                    header("Location: /Home");
                    exit;
                } else {
                    echo "Invalid role";
                }
            }
        } else {
            $_SESSION['error_message'] = "Invalid data received.";
            header("Location: /user/Login");
            exit;
        }
    }
    // register
    public function register()
    {
        $data = ['default'];
        $this->view('Register', $data);
    }
    public function userRegister()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $fullName = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $dob = $_POST['dob'];
        }
        $registerController = new userController();
        $isValid = $registerController->validateInput($email, $phone, $password, $confirmPassword);
        if (!$isValid) {
            $registerController->view('Register', ['error' => $_SESSION['error_message']]);
            unset($_SESSION['error_message']);
        } else {
            $registerModel = new userModel();
            $result = $registerModel->registerUser($fullName, $email, $phone, $password, $dob);
            if ($result === true) {
                WelcomeMailer::sendWelcomeEmail($fullName, $email, $password);
                $data = ['default'];
                $this->view('Login', $data);
                exit();
            } else {
                $_SESSION['error_message'] = $result;
                header('Location:/Register');
                exit();
            }
        }
    }

    public function cart()
    {
        $userId = $_SESSION['userId'] ?? null;
        if (!$userId) {
            die("User not logged in");
        }
        $userModel = new UserModel();
        $status = 'pending';
        $order = $userModel->getOrderBystatus($userId, $status);
        if ($order) {
            $orderId = $order[0]['order_id'];
        } else {
            $orderId = null;
        }

        // if (!$orderId) {
        //     die("Không tìm thấy đơn hàng với trạng thái '{$status}'!");
        // }
        $orderItems = $userModel->getOrderItemsByOrderId($orderId);
        $totalAmount = 0;
        foreach ($orderItems as &$item) {
            $item['total_price'] = $item['quantity'] * $item['price'];
            $totalAmount += $item['total_price'];
        }
        $orderProcessing = $userModel->getOrderBystatus($userId, 'processing');
        $orderComplelted = $userModel->getOrderBystatus($userId, 'completed');
        $orderCanceled = $userModel->getOrderBystatus($userId, 'canceled');

        $data = [
            'processingOrder' => $orderProcessing,
            'completedOrder' => $orderComplelted,
            'canceledOrder' => $orderCanceled,
            'orderItems' => $orderItems,
            'total_amount' => $totalAmount,
        ];
        $this->view('Cart', $data);
    }
    public function removeItem($id)
    {
        $userId = $_SESSION['userId'] ?? null;
        if (!$userId) {
            return false;
        }
        $userModel = new UserModel();
        $status = 'pending';
        $order = $userModel->getOrderBystatus($userId, $status);
        if (empty($order)) {
            return false;
        }
        $orderId = $order[0]['order_id'];
        $orderModel = new userModel();
        $result = $orderModel->removeOrderItem($id, $orderId);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public function validateInput($email, $phone, $password, $confirmPassword)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_message'] = "Email invalid!";
            return false;
        } elseif (!preg_match('/^[0-9]{9,11}$/', $phone)) {
            $_SESSION['error_message'] = "Phone number must contain 9-11 digits!";
            return false;
        } elseif ($password !== $confirmPassword) {
            $_SESSION['error_message'] = "Password and confirm password do not match!";
            return false;
        }
        return true;
    }

    // profile
    public function Signout()
    {
        session_unset();
        session_destroy();
        header('Location: /Home');
        exit;
    }

    public function profile()
    {
        $userId = $_SESSION['userId'] ?? null;
        if (!$userId) {
            return false;
        }
        $homeModel = new HomeModel();
        $data = $homeModel->getRes($userId);
        $this->view('Profile', $data);
    }

    public function EditAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = $_SESSION['userId'];
            $editname = $_POST['editname'];
            $editdate = $_POST['editdate'];
            $editaddress = $_POST['editaddress'];
            $editphoneNum = $_POST['editphoneNum'];
            $editavataUrl = $_POST['editavataUrl'];
            $profileModelObj = new userModel();
            $result = $profileModelObj->updateProfile($userId, $editname, $editaddress, $editdate, $editphoneNum, $editavataUrl);
            if ($result) {
                $_SESSION['fullName'] = $editname;
                $_SESSION['address'] = $editaddress;
                $_SESSION['dob'] = $editdate;
                $_SESSION['phoneNum'] = $editphoneNum;
                $_SESSION['avataImg'] = $editavataUrl;
                header('Location: /user/Profile');
            } else {
                $_SESSION['error_message'] = 'Cập nhật tài khoản thất bại!';
            }
        }
    }
    public function checkout()
    {
        $userId =  $_SESSION['userId'];
        $orderModel = new userModel();
        $order = $orderModel->getOrder($userId);
        $subtotal = 0;
        $_SESSION['orderIdPending'] = $order[0]['order_id'];
        if (!empty($order) && is_array($order)) {
            foreach ($order as $items) {
                $subtotal += ($items['price'] * $items['quantity']);
            }
            $this->view('Checkout', ['items' => $order, 'subtotal' => $subtotal]);
        } else {
            echo "No food items";
        }
    }

    public function confirmOrder()
    {

        $userId =  $_SESSION['userId'];
        $orderModel = new userModel();
        $order = $orderModel->getOrder($userId);
        $subtotal = 0;
        $_SESSION['orderIdPending'] = $order[0]['order_id'];

        if (!empty($order) && is_array($order)) {
            foreach ($order as $items) {
                $subtotal += ($items['price'] * $items['quantity']);
            }
            $orderId = $_SESSION['orderIdPending'];
            $confirmModel = new userModel();
            $confirm = $confirmModel->updateStatus('processing', $orderId, $subtotal);
            if ($confirm) {
                header('Location: /user/cart');
            }
        }
    }

    public function momo_post()
    {
        if (isset($_GET['resultCode']) && $_GET['resultCode'] == 7002) {

            $customer_id = $_SESSION['userId'];

            $momo_status = 0;

            $link_data = $_GET;
            $orderId = $_SESSION['orderIdPending'];


            $link_data_json = json_encode($link_data);
            // var_dump($link_data_json);
            $totalAmountMomo = $link_data['amount'];
            // var_dump($totalAmountMomo);

            // die;
            $momoModel = new  userModel();

            $totalAmountMomo = $link_data['amount'];
            $result = $momoModel->updateStatus('completed', $orderId, $totalAmountMomo);


            if ($result) {
                header('Location: /user/cart?success=Nạp momo thành công, vui lòng chờ Admin duyệt đơn nhé.');
                
            } else {
                header('Location: /user/cart?error=Không thể lưu thông tin giao dịch.');
            }
            exit;
        }

        header('Location:  /user/momo?error=Lỗi trong quá trình nạp Momo.');
        exit;
    }



    public function confirm_momo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-type: text/html; charset=utf-8');

            //  Kết qủa trả về 
            function execPostRequest($url, $data)
            {
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data)
                    )
                );
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

                $result = curl_exec($ch);

                curl_close($ch);
                return $result;
            }

            //  Trả về đường dẫn thanh toán
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            $orderInfo = "Thanh toán qua mã QR MoMo";
            $amount = $_POST['total'];
            $orderId = time() . "";
            //  Đơn hàng trả về 
            $redirectUrl = "http://localhost:3000/" . "user/momo_post";
            $ipnUrl = "http://localhost:3000/" . "user/momo";
            $extraData = "";


            $requestId = time() . "";
            $requestType = "captureWallet";

            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;

            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json
            // var_dump($jsonResult);
            // die();

            header('Location: ' . $jsonResult['payUrl']);
        }
    }
    public function confirm_atm_momo()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-type: text/html; charset=utf-8');

            //  Kết qủa trả về 
            function execPostRequest($url, $data)
            {
                $ch = curl_init(url: $url);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt(
                    $ch,
                    CURLOPT_HTTPHEADER,
                    array(
                        'Content-Type: application/json',
                        'Content-Length: ' . strlen($data)
                    )
                );
                curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                $result = curl_exec($ch);
                curl_close($ch);
                // if ($result === false) {
                //     $error = curl_error($ch);
                // Xử lý lỗi
                // }
                return $result;
            }

            //  Trả về đường dẫn thanh toán
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

            $orderInfo = "Thanh toán qua mã QR MoMo";
            $amount = $_POST['total'];

            if ($amount < 10000 || $amount > 50000000) {
                die("Transaction amount must be between 10,000 VND and 50,000,000 VND.");
            }

            $orderId = time() . "";
            //  Đơn hàng trả về  
            $redirectUrl = "http://localhost:3000/" . "user/momo_post";
            $ipnUrl = "http://localhost:3000/" . "user/confirm_atm_momo";
            $extraData = "";


            $requestId = time() . "";
            $requestType = "payWithATM";

            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;

            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );
            $result = execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json
            // var_dump($result);
            // die();
            header('Location: ' . $jsonResult['payUrl']);
        }
    }


    public function cancleBookking($id)
    {
        $homeModel = new HomeModel();
        $result = $homeModel->setBooking($id, 'cancelled');
        if ($result) {
            http_response_code(200);  // Success
            echo json_encode(['message' => 'Booking canceled successfully']);
        } else {
            http_response_code(400);  // Bad request or failure
            echo json_encode(['message' => 'Failed to cancel booking']);
        }
    }
}

class WelcomeMailer
{
    public static function sendWelcomeEmail($fullName, $email, $password)
    {
        $mail = new PHPMailer(true);
        try {
            // Cấu hình SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'be.y26@student.passerellesnumeriques.org';
            $mail->Password = 'c s z l e m q p l n c r m a i f';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->setFrom('be.y26@student.passerellesnumeriques.org', 'MaMa Kitchen');
            $mail->addAddress($email, $fullName);
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to MaMa Kitchen';
            $mail->Body    = 'Xin chào ' . $fullName . ',<br><br>Cảm ơn bạn đã đăng ký. Chúc bạn có trải nghiệm tuyệt vời!<br><br>'
                . 'Mật khẩu của bạn là: ' . $password . '<br><br>Chúc bạn một ngày tốt lành!';
            $mail->AltBody = 'Xin chào ' . $fullName . "\n"
                . 'Mật khẩu của bạn là: ' . $password . "\n\nChúc bạn một ngày tốt lành!";
            $mail->send();
            // echo 'Email đã được gửi thành công';
        } catch (Exception $e) {
            echo "Email không gửi được. Lỗi: {$mail->ErrorInfo}";
        }
    }
}
