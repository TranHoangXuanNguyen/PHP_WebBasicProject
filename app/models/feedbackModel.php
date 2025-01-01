<?php
require_once __DIR__ . '/../config/config.php';
global $conn;
class FeedbackModel
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    public function getFeedback($limit = null)
    {
        $query = "SELECT feedback.*, user.avataImg, user.fullName
                  FROM feedback
                  JOIN user ON feedback.user_id = user.userId
                  ORDER BY feedback.create_at DESC";  

        // Nếu có limit thì thêm điều kiện giới hạn số lượng
        if ($limit) {
            $query .= " LIMIT " . (int)$limit;
        }

        $result = $this->conn->query($query);
        $data = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function addFeedback($userId, $content)
    {
        $query = "INSERT INTO feedback(user_id, content) VALUES(?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $userId, $content);
        
        $result = $stmt->execute();
    
        return $result ? true : false;
    }
    
}
