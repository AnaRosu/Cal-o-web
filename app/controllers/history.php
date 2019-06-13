<?php
require_once '../app/db.php';
/*require_once './app/models/Userform.'*/
class History extends Controller{
    public function index() {
    	$user=$this->model('User',Db::getInstance());
    	$this->view('history');
    	if(isset($_POST['updateWeightBtn'])){
    		$user->updateWeight($_SESSION['idUser'],$_POST['UpdateWeight']);
    	}
    	if(isset($_POST['updateActivityBtn'])){
    		$user->updateActivity($_SESSION['idUser'],$_POST['activity']);
    	}
    	if(isset($_POST['updatePurposeBtn'])){
    		$user->updatePurpose($_SESSION['idUser'],$_POST['purpose']);
    	}
    	$user->getUserData($_SESSION['idUser']);


        if(isset($_POST['generatexml'])){
            echo "generare XML";
            $this->createUsersXMLfile($user->getAllUsers());
            $this->createMealsXMLfile($user->getUserMeals($_SESSION['idUser']));
        }
    }

    function createUsersXMLfile($usersArray){

       $filePath = 'users.xml';
       $dom     = new DOMDocument('1.0', 'utf-8');
       $root      = $dom->createElement('users');
       for($i=0; $i<count($usersArray); $i++){

         $userId        =  $usersArray[$i]['id'];
         $userName      =  $usersArray[$i]['username'];
         $userGender    =  $usersArray[$i]['gender'];
         $userWeight     =  $usersArray[$i]['weight'];
         $userHeight      =  $usersArray[$i]['height'];
         $userActivity  =  $usersArray[$i]['activity'];
         $userPurpose  =  $usersArray[$i]['purpose'];
         $user = $dom->createElement('user');
         $user->setAttribute('id', $userId);
         $name     = $dom->createElement('username', $userName);
         $user->appendChild($name);
         $gender   = $dom->createElement('gender', $userGender);
         $user->appendChild($gender);
         $weight    = $dom->createElement('weight', $userWeight);
         $user->appendChild($weight);
         $height     = $dom->createElement('height', $userHeight);
         $user->appendChild($height);

         $activity = $dom->createElement('activity', $userActivity);
         $user->appendChild($activity);
         $purpose = $dom->createElement('purpose', $userPurpose);
         $user->appendChild($purpose);

         $root->appendChild($user);
       }
       $dom->appendChild($root);
       $dom->save($filePath);
     }

     function createMealsXMLfile($mealsArray){

       $filePath = 'meals.xml';
       $dom     = new DOMDocument('1.0', 'utf-8');
       $root      = $dom->createElement('meals');
       for($i=0; $i<count($mealsArray); $i++){

         $mealId        =  $mealsArray[$i]['id'];
         $userId      =  $mealsArray[$i]['user_id'];
         $mealName    =  $mealsArray[$i]['masa'];
         $mealDate     =  $mealsArray[$i]['data'];
         $mealCalories      =  $mealsArray[$i]['calorii'];
         $mealProteins  =  $mealsArray[$i]['proteine'];
         $mealFats  =  $mealsArray[$i]['grasimi'];
         $mealCarbs  =  $mealsArray[$i]['carbohidrati'];
         $mealFibers  =  $mealsArray[$i]['fibre'];
         $mealSugars  =  $mealsArray[$i]['zahar'];
         $meal = $dom->createElement('meal');
         $meal->setAttribute('id', $mealId);
         $name     = $dom->createElement('name', $mealName);
         $meal->appendChild($name);
         $ursid     = $dom->createElement('id_user', $userId);
         $meal->appendChild($ursid);
         $date   = $dom->createElement('date', $mealDate);
         $meal->appendChild($date);
         $calories    = $dom->createElement('calories', $mealCalories);
         $meal->appendChild($calories);
         $proteins     = $dom->createElement('proteins', $mealProteins);
         $meal->appendChild($proteins);
         $fats     = $dom->createElement('fats', $mealFats);
         $meal->appendChild($fats);
         $carbs     = $dom->createElement('carbs', $mealCarbs);
         $meal->appendChild($carbs);
         $fibers     = $dom->createElement('fibers', $mealFibers);
         $meal->appendChild($fibers);
         $sugars     = $dom->createElement('sugars', $mealSugars);
         $meal->appendChild($sugars);

         $root->appendChild($meal);
       }
       $dom->appendChild($root);
       $dom->save($filePath);
     }

}
