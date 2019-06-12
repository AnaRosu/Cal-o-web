<?php

require_once '../app/db.php';
require_once 'base.php';

class login extends Controller{
    public function index() {
	    $this->view('loginoregister/login');
 	}

    public function login(){
    	$user=$this->model('User',Db::getInstance());
    	if(isset($_POST['login-submit'])){
			ECHO "INTRA AICI";
			$username = $_POST['logid'];
			$pass = $_POST['logpass'];
			if(empty($username) || empty($pass)){
				//header("Location: ../loginoregister/login?error=emptyfields");
				exit();
			}
			else{
				/*$user->username= $username ;
        		$user->password= $pass;*/
				if($user->verifyLogin($username,$pass)==true)
	            {
                if(!isset($_SESSION))
                {
                    session_start();
                }
		            $_SESSION['idUser'] = $user->getIdUser($username,$pass);
		            $_SESSION['userName'] = $username;
                	$_SESSION['data'] =['logged' => true];
                	$user->getUserData($_SESSION['idUser']);
                	if(isset($_SESSION['idUser']) and $_SESSION['gender'] !== null){
                		header("Location: ../public/history");
                	}
                	else{
                		header("Location: ../public/userform");
                	}
	            }
                else echo "<script>alert('Eroare!')</script>";
			}
		}
    }
}
 ?>
