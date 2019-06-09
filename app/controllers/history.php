<?php
require_once '../app/db.php';
/*require_once './app/models/Userform.'*/
class History extends Controller{
    public function index() {
    	$user=$this->model('User',Db::getInstance());
    	$this->view('history');
    	$user->getUserData($_SESSION['idUser']);
    }

}
