<?php
require_once '../app/db.php';
error_reporting(E_ALL & ~E_NOTICE);
class Item extends Controller{

    public function index() {
    $this->view('item');
    $item = $this->model('itemModel',Db::getInstance());
    $this->getFoodDetailsById($_GET['id']);
    if(isset($_POST['save'])){
      echo "aici intra 1 ";
      $meal =  $_POST['meal'];
      // echo $meal;
      $date =  $_POST['datee'];
      // echo $date;
      if($item->addAliment($_SESSION['idUser'], $date, $meal,$_SESSION['item']['report']['food']['nutrients'][0]['value'],
      $_SESSION['item']['report']['food']['nutrients'][1]['value'], $_SESSION['item']['report']['food']['nutrients'][2]['value'],
      $_SESSION['item']['report']['food']['nutrients'][3]['value'],$_SESSION['item']['report']['food']['nutrients'][4]['value'],
      $_SESSION['item']['report']['food']['nutrients'][5]['value'])==true){
         echo "<script>window.location = 'http://localhost/another-tw/Cal-o-web/public/history'</script>";
      }
      else{
          echo "<script>alert('Could not insert into the database!')</script>";
      }

    }
  }
public function getFoodDetailsById($id){
                $url = "https://api.nal.usda.gov/ndb/reports/?ndbno=$id&type=b&format=json&api_key=1T07Yipi3avcF9MxQabvWURyhIbRbiAugfZdqTPY";
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
                $result = curl_exec($curl);
                curl_close($curl);
                $_SESSION['item'] = json_decode($result, true);
               // echo '<pre>' . print_r($_SESSION['item'], true) . '</pre>';
              // echo  '<pre>' . print_r($_SESSION['item']['report']['food']['nutrients'][1]['value'], true) . '</pre>';
          }

}
 ?>
