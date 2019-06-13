<?php
require_once '../app/db.php';
/*require_once './app/models/Userform.'*/
class UpdateForm extends Controller{
    public function index() {
    $this->view('updateform');
    if (isset($_GET['action'])) {
        echo "intra aici";
        if ($_GET['action'] == 'fetch') {
            // tell the browser what's coming
            header('Content-type: application/json');

            // open database connection
            $db = Db::getInstance();

            // use prepared statements!
            $query = $db->prepare('select * from users where id = ?');
            $query->execute(array($_GET['userId']));
            $row = $query->fetch(PDO::FETCH_OBJ);

            // send the data encoded as JSON
            echo json_encode($row);
            exit;
        }
    }
/*    echo 'intra aici';
      $form = $this->model('User',Db::getInstance());

      if(isset($_POST['save'])){
        echo "si aici intra ";
        $gender =  $_POST['gender'];
        $last_name =  $_POST['lastname'];
        $first_name =  $_POST['firstname'];
        $weight = $_POST['weight'];
        $height= $_POST['height'];
        $activ= $_POST['activity'];
        $achieve= $_POST['purpose'];
        $birthday = $_POST['bday'];;
        echo $last_name . " " . $first_name . " " .$gender . " " .$weight . " " .$height . " " .$birthday  ." " .$activ ." " .$achieve;

        if(empty($gender) || empty($last_name) || empty($first_name) || empty($weight) || empty($height) || empty($birthday) || empty($activ) || empty($achieve)){
            echo "<script>alert('You must complete all the fields!')</script>";
        }
        else{
            if($form->insertUserData($_SESSION['idUser'],$last_name,$first_name,$gender,$weight,$height, $birthday, $activ, $achieve)==true){
                header("Location: ../public/history");
            }
            else{
                echo "<script>alert('Could not insert into the database!')</script>";
            }
        }
      }*/
    }

    /*public function form(){


    }*/
}
 ?>
