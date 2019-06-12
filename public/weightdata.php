  <?php
    session_start();
    require_once '../app/db.php' ;
    header('Content-Type: application/json');
    $db=Db::getInstance();
    $data = array();
    $sql = "SELECT date_inreg,weight FROM weight_change where id_user= :id order by date_inreg asc";
    $stmt = $db->prepare($sql);
    $stmt->execute(array('id' => $_SESSION['idUser']));
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      //$s= $s . "['".$row['date']."',".$row['weight']."],";
      $data[] = $row;
    }
    
    print(json_encode($data));
?>