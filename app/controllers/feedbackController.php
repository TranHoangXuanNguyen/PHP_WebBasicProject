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
    $feedbacks = $this->feedbackModel->getFeedback(5); 

    $totalFeedbacks = count($this->feedbackModel->getFeedback());

    $data = [
        'feedbacks' => $feedbacks,
        'totalFeedbacks' => $totalFeedbacks,
    ];

    $this->view('feedback', $data);
}

public function viewAll()
{
    $feedbacks = $this->feedbackModel->getFeedback();

    $data = [
        'feedbacks' => $feedbacks,
        'totalFeedbacks' => count($feedbacks), 
    ];

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
            header('Location: /Feedback');
            exit();
        }
    }
}
