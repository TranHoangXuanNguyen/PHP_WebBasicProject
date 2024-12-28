<?php
require_once __DIR__ . '/../models/feedbackModel.php';
require_once(__DIR__ . '/../core/Controller.php');
require_once __DIR__ . '/../config/config.php';

class FeedbackController extends Controller
{
    private $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
    }
    public function index()
{
    // Lấy 5 bình luận đầu tiên từ database
    $feedbacks = $this->feedbackModel->getFeedback(5); // Chỉ lấy 5 bình luận đầu tiên

    // Lấy tổng số bình luận trong cơ sở dữ liệu để kiểm tra có "Xem thêm"
    $totalFeedbacks = count($this->feedbackModel->getFeedback());

    $data = [
        'feedbacks' => $feedbacks,
        'totalFeedbacks' => $totalFeedbacks,
    ];

    $this->view('feedback', $data); // Truyền dữ liệu tới view
}

public function viewAll()
{
    // Lấy tất cả bình luận từ database
    $feedbacks = $this->feedbackModel->getFeedback();

    $data = [
        'feedbacks' => $feedbacks,
        'totalFeedbacks' => count($feedbacks), // Lấy tổng số bình luận
    ];

    // Hiển thị tất cả bình luận
    $this->view('feedback', $data);
}


    public function addFeedback()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $userId = $_POST['userId'];
            $content = $_POST['content'];

            if (empty($content)) {
                $_SESSION['error_message'] = "Feedback cannot be empty!";
                header('Location: /Feedback');
                exit();
            }

            $result = $this->feedbackModel->addFeedback($userId, $content);

            if ($result) {
                $_SESSION['success_message'] = "Your feedback has been submitted successfully!";
            } else {
                $_SESSION['error_message'] = "Failed to submit feedback. Please try again.";
            }

            header('Location: /Feedback');
            exit();
        }
    }
}
