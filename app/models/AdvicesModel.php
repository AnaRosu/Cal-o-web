<?php
class AdvicesModel{

  public function totalNumberOfCalDay(){
        $db = Db::getInstance();
        $now = strval (date("Y-d-m",strtotime('now')));
        $sql = "select * from mese where data= :data AND user_id= :user_id";
        $stmt = $db->prepare($sql);
        $data =  array();
        $stmt->execute(array(':data' => $now, ':user_id' => $_SESSION['idUser']));
           while($row =  $stmt->fetch(PDO::FETCH_ASSOC)) {
               $data[] =  $row;
         }
          return json_encode($data);
     }


   public function totalNumberOfCalWeek(){
           $db = Db::getInstance();
           $lweek = strval (date("Y-m-d",strtotime('last week')));
           $sql = "select *  from mese WHERE user_id= :user_id AND data >= :data_lweek;";
           $stmt = $db->prepare($sql);
           $data = array();
          try{
           $stmt->execute(array(':user_id' => $_SESSION['idUser'], ':data_lweek' => $lweek));
             while($row =  $stmt->fetch(PDO::FETCH_ASSOC)) {
                 $data[] =  $row;
           }
          }
             catch(Exception $e){
                 echo($e->getMessage());
             }
            return json_encode($data);
      }


//
//     public function totalNumberOfCalM(){
//               $db = Db::getInstance();
//               $lmonth = strval (date("Y-m-d",strtotime('last month')));
//               $sql = "select *  from mese WHERE user_id= :user_id AND data >= :data_lmonth;";
//               $stmt = $db->prepare($sql);
//                 try{
//                   $stmt->execute(array(':user_id' => $_SESSION['idUser'], ':data_lmonth' => $lmonth));
//                 while($row =  $stmt->fetch()) {
//                     $data[] =  $row;
//               }
//             }
//                 catch(Exception $e){
//                     echo($e->getMessage());
//                 }
//             return json_encode($data);
//          }
//
// }
}
?>
