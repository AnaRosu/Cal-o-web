<?php
 require_once '../app/db.php' ;
 require_once '../app/models/UserStatistics.php' ;
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

  function getIdUser($username, $pass){
    $db = Db::getInstance();
    $password = md5($pass);
    $sql = "select * from users where username = :username AND password= :password";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('username' => $username, 'password' => $password));
    $result = $stmt->fetch();

    return $result['id'];
  }

  function getUserData($id){
    $db = Db::getInstance();
    $sql = "select gender, firstname, lastname, weight, height, birthdate, activity, purpose from users where id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('id' => $id));
    $result = $stmt->fetch();

    if(isset($_SESSION['idUser'])){
      $_SESSION['gender'] = $result['gender'];
      $_SESSION['firstname'] = $result['firstname'];
      $_SESSION['lastname'] = $result['lastname'];
      $_SESSION['weight'] = $result['weight'];
      $_SESSION['height'] = $result['height'];
      $date = new DateTime($result['birthdate']);
      $now = new DateTime();
      $interval = $now->diff($date);
      $_SESSION['age'] =  $interval->y;
      switch ($result['activity']) {
        case 'sedentary':
          $_SESSION['activity'] = 'Sedentary';
          break;
        case 'moderate':
          $_SESSION['activity'] = 'Moderately active';
          break;
        case 'active':
          $_SESSION['activity'] = 'Active';
          break;
        case 'vactive':
          $_SESSION['activity'] = 'Vigorously active';
          break;
        default:
          $_SESSION['activity'] = 'Extremely active';
          break;
      }
      switch ($result['purpose']) {
        case 'less':
          $_SESSION['purpose'] = 'Lose weight';
          break;
        case 'same':
          $_SESSION['purpose'] = 'Maintain the same weight';
          break;
        default:
          $_SESSION['purpose'] = 'Gain weight';
          break;
      }

      $rbm = UserStatistics::calculateBasalMetabolicRate($_SESSION['gender'], $_SESSION['weight'], $_SESSION['height'], $interval->y);
      $_SESSION['rbm'] = $rbm;
      $_SESSION['calories'] = UserStatistics::calculateCaloriesNeeded($rbm, $result['activity']);
      $_SESSION['proteins'] = UserStatistics::calculateProteinNeeded($_SESSION['weight'], $result['activity']);
      $_SESSION['carbs'] =    UserStatistics::calculateCarbsNeeded($_SESSION['purpose']);
      $_SESSION['lip'] = 0.04 *   $_SESSION['calories'];
      $_SESSION['fiber'] =  UserStatistics::calculateFiberNeeded($_SESSION['gender']);
    }
  }

  function action_update($id){

  }
}

?>
