<?php
require_once 'db.php' ;
class RegisterController extends Controller
{
  public function register($name='')
	{
        $user = $this->model('User');
        $this->view('login');
	      $viewObject = new login();

	      $viewObject->output($user);
       if(isset($_POST['register-submit']))
       {
        $user->username=$_POST['uid'];

        $user->password=$_POST['pwd'];
        $passRepeat = $_POST['pwd-repeat'];
        if(empty($user->username) || empty(  $user->password) || empty($passRepeat)){
          header("Location: ../login.php?error=emptyfields&uid=".$username);
                exit();
            }
        elseif(!preg_match("/^[a-zA-Z0-9]*$/",$use-> $username)){
        header("Location: ../login.php?error=invaliduid");
        exit();
             }
         elseif ($user->$pass !== $passRepeat) {
         header("Location: ../login.php?error=passwordcheck");
         exit();
        if($user->executeRegister()==1)
        {
	        header("Location: http://localhost/Cal-o-web/public");
            die();
        }


	}
	else
		echo 'Something';
}
}
?>
