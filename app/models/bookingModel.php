<?php
require_once __DIR__ . '/../config/config.php';
global $conn;
class BookingModel{
    private $conn;
    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    
}
