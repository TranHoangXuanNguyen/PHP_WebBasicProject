<!-- code base -->
<?php
class Controller {
    public function view($view, $data = []) {
        extract($data);  //extracting the variables to local scope
        require_once "./app/views/$view.php";
    }
}
?>