<?php
error_reporting(E_ALL & ~E_NOTICE);
class addFood extends Controller{
public function getFoodDetails($searchQuery, $foodGroup, $dataSource){
         $url = "https://api.nal.usda.gov/ndb/search/?format=json&api_key=1T07Yipi3avcF9MxQabvWURyhIbRbiAugfZdqTPY&q=$searchQuery&fg=$foodGroup&ds=$dataSource";
         $curl = curl_init();
         curl_setopt($curl,CURLOPT_URL,$url);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         $result = curl_exec($curl);
         curl_close($curl);
         $json = json_decode($result);
         if (!isset($json->errors))
         return $json;
   }

public function check_selected_option($select_name, $current_option){
     if (isset($_POST[$select_name])){
       $selected_option = $_POST[$select_name];
     }else{
       $selected_option = "";
     }
     if ($selected_option == $current_option){
       echo "selected";
     }
   }

public function index(){
  $this ->view('AddFood',Db::getInstance());
  $food  = $this->model('AddFoodModel',Db::getInstance());

  if(isset($_POST['search-submit'])){
    if(isset($_POST['meal'])){
      $meal = $_POST['meal'];
      $_SESSION["meal"] = $meal;
    }
    if (isset($_POST['searchTerm'])){
       $search_query = $_POST['searchTerm'];
       $search_query = str_replace(' ','%20', $search_query);
         $_SESSION["term"] = $search_query;
    }

    if (isset($_POST['foodGroup'])){
      $food_group = $_POST['foodGroup'];
      if ($food_group == 'all'){
        $food_group = "";
      }
      $_SESSION["foodGroup"] = $food_group;
    }


    if (isset($_POST['dataSource'])){
      $data_source = $_POST['dataSource'];
      if ($data_source == 'all'){
        $data_source = "";
      }
      $_SESSION["dataBase"] = $data_source;
    }
}
}
}

 ?>
