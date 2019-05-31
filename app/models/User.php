<?php
require_once '../db.php' ;
class User {
	public $username;
	public $password;
	public $passwordCode;
    /* $submitted: Whether or not the form has been submitted */
    private $submitted = false;
        public function __construct($username=null, $password=null) {
        $this->username=$username;
        $this->password=$password;
    }

    public function verifyLogin()
    {
       // $this->initiatePDO();
    	$username = $this->username;
       //echo $username;
    	$password = $this->password;
        //echo $password;
        $query = dbConnect()->prepare("SELECT username, password FROM users WHERE username=:username AND password=:password");
        					 $query->bindParam(':username', $username);
        					 $query->bindParam(':password', $password);
        					 $query->execute();
        					 $row = $query->fetch();
        					 if($row['password'] == $pass){
        						 $_SESSION['username'] = $row['username'];
        						header("Location: ../login.php");
        					 }
        					 else {
        						 echo "Wrong login or password";
        					 }
    }

    public function executeRegister()
    {
       //$this->initiatePDO();
       $username=$this->username;
       $password= $this->password;
       try
       {
        $stmt = dbConnect()->prepare('INSERT INTO users (username,password) VALUES (:username,  :password,)');
        $stmt->execute(['username' => $username, 'password' => $password]);
        return 1;
       }
       catch (Exception $e)
       {
         echo($e->getMessage());
         return 0;
       }

    }

}

?>
