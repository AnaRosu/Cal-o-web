<?php
 require_once '../app/db.php' ;

class itemModel {


  public function addAliment($idUser, $data, $masa, $cal, $proteine, $grasimi, $carbo, $fibre, $zaharuri){
    $db = Db::getInstance();
    $dataBd = date("Y-m-d",strtotime($data));
    $sql = "insert into mese (user_id, masa, data, calorii,proteine, grasimi, carbohidrati,fibre, zahar) values
     (:user_id, :masa, :data, :calorii, :proteine, :grasimi, :carbohidrati, :fibre, :zahar)";
     $stmt = $db->prepare($sql);
    try{
     $stmt->execute(array(
             ':user_id' =>$idUser,
             ':masa' => $masa,
             ':data' => $dataBd,
             ':calorii' => $cal,
             ':proteine' => $proteine,
             ':grasimi' => $grasimi,
             ':carbohidrati' => $carbo,
             ':fibre' => $fibre,
             ':zahar' => $zaharuri,
           ));
             return true;
           }
           catch(Exception $e){
               echo($e->getMessage());
               return false;
           }
    }
}
?>
