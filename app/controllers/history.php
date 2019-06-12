<?php
require_once '../app/db.php';
/*require_once './app/models/Userform.'*/
class History extends Controller{
    public function index() {
    	$user=$this->model('User',Db::getInstance());
    	$this->view('history');
    	if(isset($_POST['updateWeightBtn'])){
    		$user->updateWeight($_SESSION['idUser'],$_POST['UpdateWeight']);
    	}
    	if(isset($_POST['updateActivityBtn'])){
    		$user->updateActivity($_SESSION['idUser'],$_POST['activity']);
    	}
    	if(isset($_POST['updatePurposeBtn'])){
    		$user->updatePurpose($_SESSION['idUser'],$_POST['purpose']);
    	}
    	$user->getUserData($_SESSION['idUser']);
    }

}
