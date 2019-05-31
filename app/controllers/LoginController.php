<?php

class LoginController extends Controller
{
	public function login( $name='')
	{
        $user=$this->model('User');
        $this->view('login');
	      $viewObject = new login();
        $viewObject->output($user);
        if(isset($_REQUEST["username"])&&isset($_REQUEST["password"]))
        {
        $user->username=$_REQUEST["username"];
        $user->password= $_REQUEST["password"];

        if($user->verifyLogin()==1)
        {
              session_start();

            $_SESSION['username']=$user->username;
	        header("Location: http://localhost/Cal-o-web/public/");
            die();
        }


	}
}
}

?>
