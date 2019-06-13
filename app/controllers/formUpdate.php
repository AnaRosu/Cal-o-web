<?php
require_once '../app/db.php';
require_once '../app/models/formUpdate.php';
require_once '../app/controllers/base.php';
/*require_once './app/models/Userform.'*/
class formUpdate extends Controller{



  function __construct() {
      $this->view('formUpdate');
  }

    public function index() {
     echo 'intra aici';
     $update = $this->model('formUpdate',Db::getInstance());

      if(isset($_POST['update'])){
        echo "si aici intra ";
        $_SESSION['sth'] = json_encode(Update::getInfo($_SESSION['idUser']));
        echo $_SESSION['sth'];

      }
    }

}
 ?>
