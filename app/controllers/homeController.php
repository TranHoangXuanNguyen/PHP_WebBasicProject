<?php
require_once('./app/core/Controller.php');
require_once('./app/models/homeModel.php');
class HomeController extends Controller
{
    public $homeModel;

    public function __construct()
    {
        // parent::__construct();
        // $this->loadModel('homeModel');
        $this->homeModel = new HomeModel();
    }
    public function index()
    {
        $data = ['default'];
        $this->view('home', $data);
    }
    public function aboutUs()
    {
        $aboutUsModel = new HomeModel();
        $foodItems = $aboutUsModel->getfoodImg();
        $totalFoodItems = $aboutUsModel->getQtyFood();
        $data = [
            'foodItems' => $foodItems,
            'totalFoodItems' => $totalFoodItems
        ];
        $this->view('AboutUs', $data);
    }
    public function bookingTable()
    {
        $data = ['default'];
        $this->view('BookingTable', $data);
    }

    public function findTable()
    {
        header("Content-Type: application/json");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $date = $data['date'];
            $customerNum = $data['customerNum'];
            $startTime = $data['startTime'];
            $endTime = $data['endTime'];

            $result = $this->homeModel->findTable($date, $customerNum, $startTime, $endTime);
            // send respon
            $response = array("status" => "success", "message" => "Data received", "data" => $result);
            // convert to json format and send back
            echo json_encode($response);
        } else {
            // handle error if cannot get data
            echo json_encode(array(
                "status" => "error",
                "message" => "Invalid request method"
            ));
        }
    }

    public function bookTable()
    {
        header("Content-Type: application/json");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);
            $date = $data['date'];
            $customerNum = $data['customerNum'];
            $startTime = $data['startTime'];
            $endTime = $data['endTime'];
            $tableId = $data['tableId'];
            $userId = $_SESSION['userId'] ?? null;
            if (!$userId) {
                die("User not logged in");
            }
            $result = $this->homeModel->bookTable($date, $customerNum, $startTime, $endTime, $tableId, $userId);
            // send respon
            $response = array("status" => "success", "message" => "Data received", "data" => $result);
            // convert to json format and send back
            echo json_encode($response);
        } else {
            // handle error if cannot get data
            echo json_encode(array(
                "status" => "error",
                "message" => "Invalid request method"
            ));
        }
    }
}
