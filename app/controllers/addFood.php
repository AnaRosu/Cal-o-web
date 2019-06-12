<?php
error_reporting(E_ALL & ~E_NOTICE);

class addFood extends Controller{

public function index(){
  $this ->view('AddFood',Db::getInstance());
  $food  = $this->model('AddFoodModel',Db::getInstance());

  if(isset($_POST['search-submit']))
  {
        if (isset($_POST['searchTerm'])){
       $search_query = $_POST['searchTerm'];
       $search_query = str_replace(' ','%20', $search_query);
         // $_SESSION["term"] = $search_query;
         // echo $search_query;
    }

    if (isset($_POST['foodGroup'])){
      $food_group = $_POST['foodGroup'];
      if ($food_group == 'all'){
        $food_group = "";
      }
      // $_SESSION["foodGroup"] = $food_group;
      // echo $_SESSION['foodGroup'];
    }


    if (isset($_POST['dataSource'])){
      $data_source = $_POST['dataSource'];
      if ($data_source == 'all'){
        $data_source = "";
      }
      // $_SESSION["dataBase"] = $data_source;
    }
}
  $this-> getFoodDetails($search_query,  $food_group,   $data_source);
}

public function getFoodDetails($searchQuery, $foodGroup, $dataSource){
         $url = "https://api.nal.usda.gov/ndb/search/?format=json&api_key=1T07Yipi3avcF9MxQabvWURyhIbRbiAugfZdqTPY&q=$searchQuery&fg=$foodGroup&ds=$dataSource";
         $curl = curl_init();
         curl_setopt($curl,CURLOPT_URL,$url);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         $result = curl_exec($curl);
         curl_close($curl);
         // echo "<pre>";
         // echo  $result;
         $_SESSION['items'] = json_decode($result, true);
         // echo '<pre>' . print_r($_SESSION['items']['list']['item'][1], true) . '</pre>';

   }
 }

?>
