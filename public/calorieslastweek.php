  <?php
    session_start();
    require_once '../app/db.php' ;
    header('Content-Type: application/json');
    $db=Db::getInstance();
    $data = array();
    $lweek = strval (date("Y-m-d",strtotime('last week')));
    $sql = "SELECT SUM(calorii)/7 as calories,SUM(proteine)/7 as proteins,SUM(grasimi)/7 as fats,SUM(carbohidrati)/7 as carbohydrates,SUM(fibre)/7 as fibers,SUM(zahar)/7 as sugars FROM mese where user_id= ? and  data >= ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_SESSION['idUser'],$lweek]);
    $datafinal = array();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $data[] = array('column' => 'Calories','inreg' => $row['calories']);
      $data[] = array('column' => 'Proteins','inreg' => $row['proteins']);
      $data[] = array('column' => 'Fats','inreg' => $row['fats']);
      $data[] = array('column' => 'Carbohydrates','inreg' => $row['carbohydrates']);
      $data[] = array('column' => 'Fibers','inreg' => $row['fibers']);
      $data[] = array('column' => 'Sugars','inreg' => $row['sugars']);
      array_push($datafinal, $data);
    }
    print(json_encode($data));
?>