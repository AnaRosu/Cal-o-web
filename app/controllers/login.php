<?php

require_once '../app/db.php';
require_once 'base.php';

class login extends Controller{

    public function index() {
	    $this->view('loginoregister/login');
	    /*if(isset($_POST['r-btn'])){
	    	$this->view('loginoregister/register/');
	    }
	    if(isset($_POST['l-btn'])){
	    	$this->view('loginoregister/login/');
	    }*/
 	}

    public function login(){
    	$user=$this->model('User',Db::getInstance());
        $this->view('loginoregister/login');
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
	                session_start();
		            $_SESSION['idUser'] = $row['id'];
		            $_SESSION['userName'] = $row['username'];
                	$_SESSION['data'] =['logged' => true];
                header("Location: ../public/userform");
                die();
	            }
                else echo "<script>alert('Eroare!')</script>";
			}
		}
    }

    public function logout(){
    	  session_unset();
          session_destroy();
          $this->redirect("public/index");
      }

}
 ?>
