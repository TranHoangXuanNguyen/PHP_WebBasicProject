<?php
require_once __DIR__ . '/../config/config.php';
global $conn;
class HomeModel
{
    private $conn;
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }
    public function getfoodImg()
    {
        $query = "
                SELECT 
                categories.categoryId, 
                categories.categoryName AS category, 
                fooditems.foodId, 
                fooditems.foodName AS item, 
                fooditems.price, 
                fooditems.foodImg AS image_url
            FROM 
                categories
            INNER JOIN 
                fooditems 
            ON 
                categories.categoryId = fooditems.categoryId
            WHERE 
                fooditems.foodId IN (12, 15, 32, 23) -- Chỉ lấy món ăn có foodId cụ thể
            GROUP BY 
                categories.categoryId;

            ";
        $result = $this->conn->query($query);
        $data = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function getQtyFood()
    {
        $query = "SELECT COUNT(*) AS total FROM fooditems";
        $result = $this->conn->query($query);
        $data = [];

        if ($result) {
            $data = $result->fetch_assoc();
        }

        return $data['total'] ?? 0;
    }
    public function findTable($date, $customerNum, $startTime, $endTime)
    {
        $sql = "SELECT * 
                FROM tables 
                WHERE capacity >= ? 
                AND id NOT IN (
                    SELECT table_id 
                    FROM reservations 
                    WHERE date = ? 
                    AND (
                        (startTime <= ? AND endTime > ?) OR 
                        (startTime < ? AND endTime >= ?) OR 
                        (startTime >= ? AND endTime <= ?)
                    )
                    AND status = 'pending'
                )";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isssssss", $customerNum, $date, $startTime, $endTime, $startTime, $endTime, $startTime, $endTime);
        $stmt->execute();
        $result = $stmt->get_result();
        $tables = [];
        while ($row = $result->fetch_assoc()) {
            $tables[] = $row;
        }
        $stmt->close();
        return $tables;
    }

    public function bookTable($date, $customerNum, $startTime, $endTime, $tableId, $useId)
    {
        // SQL query to insert a new reservation
        $sql = "INSERT INTO reservations (table_id,userId, date, startTime, num_guests, endTime, status) 
                VALUES (?, ?, ?, ?, ?, ?, 'pending')";

        // Prepare the statement
        $stmt = $this->conn->prepare($sql);

        // Bind the parameters
        $stmt->bind_param("isssis", $tableId, $useId, $date, $startTime, $customerNum, $endTime);

        // Execute the statement
        $stmt->execute();

        // Check if the insert was successful
        if ($stmt->affected_rows > 0) {
            $result = ['success' => true, 'message' => 'Table booked successfully.'];
        } else {
            $result = ['success' => false, 'message' => 'Failed to book the table.'];
        }

        // Close the statement
        $stmt->close();

        // Return the result
        return $result;
    }

    public function getRes($userId)
    {
        $sql = "SELECT * FROM reservations WHERE userId = ? and status = 'pending'";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("s", $userId);
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                $tables = [];
                while ($row = $result->fetch_assoc()) {
                    $tables[] = $row;
                }
                $stmt->close();
                return $tables;
            } else {
                echo "Error executing query: " . $stmt->error;
            }
        } else {
            echo "Error preparing statement: " . $this->conn->error;
        }
        return [];
    }

    public function setBooking($id, $status)
    {
        $sql = "UPDATE `reservations` SET `status` = ? WHERE `id` = ?;";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("si", $status, $id);
            return $stmt->execute();
        } else {
            return false;
        }
    }

   // Model
   public function getFeedback($limit, $offset) {
    $query = "SELECT feedback.*, user.avataImg, user.fullName
              FROM feedback
              JOIN user ON feedback.user_id = user.userId
              ORDER BY feedback.create_at DESC
              LIMIT ?, ?";
              
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("ii", $offset, $limit);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $stmt->close();
    return $data;
}

public function getTotalFeedback(){
    $query = "SELECT COUNT(*) AS total FROM feedback";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $total = $row['total'] ?? 0;
    $stmt->close();
    return $total;
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
