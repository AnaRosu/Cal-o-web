<?php
class logout extends Controller{

    public function index() {
    session_start();
    session_unset();
    session_destroy();
    $this->view('home/index');
    }
}
 ?>
