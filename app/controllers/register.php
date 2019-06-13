<?php

require_once '../app/db.php';

class register extends Controller{

    public function index() {
	    $this->view('loginoregister/register');
	    /*if(isset($_POST['r-btn'])){
	    	$this->view('loginoregister/register/');
	    }
	    if(isset($_POST['l-btn'])){
	    	$this->view('loginoregister/login/');
	    }*/
 	}


    public function register(){
    	$user=$this->model('User',Db::getInstance());
    	$this->view('loginoregister/register');
    	if(isset($_POST['register-submit'])){
			$username = $_POST['uid'];
			$pass = $_POST['pwd'];
			$passRepeat = $_POST['pwd-repeat'];
			//echo $username ." ". $pass;
			if(empty($username) || empty($pass) || empty($passRepeat)){
				//header("Location: ../login.php?error=emptyfields&uid=".$username);
				//echo "a intrat la gol";
				exit();
			}
			elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			echo "<script>alert('Invalid username!')</script>";
			}
			elseif ($pass !== $passRepeat) {
				echo "<script>alert('Password check!')</script>";
				exit();
			}
			else{
				if($user->executeRegister($username,$pass)==true)
	            {
                header("Location: http://localhost/another-tw/Cal-o-web/public/register");
           die();
	            }
			}
		}
    }
}
 ?>
