<!-- code base -->
<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);  //extracting the variables to local scope
        require_once "./app/views/$view.php";
    }
}
?>
<!-- class Controller
{
    public function view($viewName, $data = [])
    {
        extract($data); // Giải nén mảng $data thành các biến (ví dụ: ['error' => 'abc'] thành $error = 'abc')
        require_once "./app/views/{$viewName}.php"; // Load file view
    }
} -->
