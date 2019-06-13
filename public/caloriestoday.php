  <?php
    session_start();
    require_once '../app/db.php' ;
    header('Content-Type: application/json');
    $db=Db::getInstance();
    $data = array();
    $now = date("Y-m-d", time());
    $sql = "SELECT SUM(calorii) as calories,SUM(proteine) as proteins,SUM(grasimi) as fats,SUM(carbohidrati) as carbohydrates,SUM(fibre) as fibers,SUM(zahar) as sugars FROM mese where user_id= ? and data = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$_SESSION['idUser'],$now]);
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