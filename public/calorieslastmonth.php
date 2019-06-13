<?php
  session_start();
  require_once '../app/db.php' ;
  header('Content-Type: application/json');
  $db=Db::getInstance();
  $data = array();
  $lmonth = strval (date("Y-m-d",strtotime('last month')));
  $sql = "SELECT SUM(calorii)/30 as calories,SUM(proteine)/30 as proteins,SUM(grasimi)/30 as fats,SUM(carbohidrati)/30 as carbohydrates,SUM(fibre)/30 as fibers,SUM(zahar)/30 as sugars FROM mese where user_id= ? and  data >= ?";
  $stmt = $db->prepare($sql);
  $stmt->execute([$_SESSION['idUser'],$lmonth]);
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
