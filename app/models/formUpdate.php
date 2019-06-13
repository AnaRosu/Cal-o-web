<?php
 require_once '../app/db.php' ;
class Update {

public function update_info($id, $gen, $fst, $lst, $wght, $hght, $bday, $act, $purpose) {
      $db = Db::getInstance();
      $sql = "UPDATE users SET gender = $gen, firstname = $fst, lastname = $lst, weight = $wght, height = $hght,
              birthdate = $bday, activity = $act, purpose = $purpose
              WHERE id = $id ";
      $stmt = $db->prepare($sql);
      $result = $stmt->fetch();
      if(!empty($result)){
         return true;
      }
        else{
         return false;
        }
    }

  public function getInfo($id){
        $db = Db::getInstance();
        $sql = "SELECT * FROM users WHERE id =  $id";
        $date = array();
        $result = $db->query($sql);
        $i=0;
      while($row=$result->fetch()) {
          $date[$i]['firstname'] = $row['firstname'];
          $date[$i]['lastname'] = $row['lastname'];
          $date[$i]['gender'] = $row['gender'];
          $date[$i]['weight'] = $row['weight'];
          $date[$i]['height'] = $row['height'];
          $date[$i]['bithdatet'] = $row['birthdate'];
          $date[$i]['activity'] = $row['activity'];
          $date[$i]['purpose'] = $row['purpose'];
          $i++;
      }
      return $date;
}
}
?>
