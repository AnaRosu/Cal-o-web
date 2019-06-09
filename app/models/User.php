<?php
 require_once '../app/db.php' ;
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

    public function verifyLogin($user,$pass)
    {
        $db = Db::getInstance();
        $password = md5($pass);
        $sql = "select * from users where username = :username AND password= :password";
        $stmt = $db->prepare($sql);
        $stmt->execute(array('username' => $user, 'password' => $password));
        $result = $stmt->fetch();
        if(!empty($result)){

        //   if(password_verify($pass,$row['password'])){
        //     echo 'parola login ' . $pass;
           return true;
        }
          else{
        //     header("Location: ../loginoregister/login?error=wrongpass");
           return false;
          }
        //
        // }
        // else{
        //   header("Location: ../loginoregister/login?error=nouser");
        //   return false;
        // }
    }

    public function executeRegister($username,$pass)
    {
      $db = Db::getInstance();
      $sql = "select username from users where username = :username";
      $stmt = $db->prepare($sql);
      /*if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../loginoregister/register?error=sqlerror");
        exit();
      }
      else{*/
      try{
        $stmt->execute(array(':username' => $username));
        $resCheck =  $stmt->fetchAll();
        if(!empty($resCheck)){
          return false;
        }
        $sql = "insert into users (username, password) values (:username, :password)";
        $stmt = $db->prepare($sql);
        echo 'parola register' . $pass;
        $hashedPass = md5($pass);
        $stmt->execute(array(
                ':username' => $username,
                ':password' => $hashedPass));
        //   header("Location: ../loginoregister/register?signup=success");
        return true;
      }catch(Exception $e){
        echo($e->getMessage());
        return false;
      }
    }

    function insertUserData($id, $lastn, $firstn, $gender, $weight, $height, $birthdate, $active, $achieve){
    $db = Db::getInstance();

    $date=date("Y-m-d",strtotime($birthdate));
    $sql = "update users set gender=:gender,firstname=:firstname, lastname=:lastname, weight=:weight, height=:height, birthdate=:birthdate, activity=:activity, purpose=:purpose where id=:id";
    $stmt = $db->prepare($sql);
    try{
      $stmt->execute(array(':gender' => $gender,':firstname' => $firstn,':lastname' => $lastn,':weight' => $weight,':height' => $height,':birthdate' => $date,':activity' => $active,':purpose' => $achieve,':id' => $id));
      return true;
    }
    catch(Exception $e){
        echo($e->getMessage());
        return false;
    }
  }
}

?>
