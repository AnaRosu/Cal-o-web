<?php

class Advices extends Controller{

    public function index() {
    $this->view('advices');
    $adv = $this->model('AdvicesModel',Db::getInstance());
    // $data = strval (date("Y-d-m",strtotime('now')));
    // echo $data;
     $stack = array();
    if(isset($_POST['submit']))
    {
      // echo "sunt aici";
      $perioada = $_POST['time'];
      // echo $perioada;
    if ($perioada == 'day') {
        $_SESSION['perioada'] = $adv->totalNumberOfCalDay();
        if($this-> giveAdviceCal( json_decode(  $_SESSION['perioada'], true), 1) == 1){
          array_push($stack, "putine");
          }else{
          array_push($stack, "multe");
          }
       if($this-> giveAdviceProteine( json_decode(  $_SESSION['perioada'], true), 1) == 1){
            array_push($stack, "mic");
            }else{
            array_push($stack, "mare");
            }
            if($this-> giveAdviceCarbs( json_decode(  $_SESSION['perioada'], true), 1) == 1){
                 array_push($stack, "mica");
                 }else{
                 array_push($stack, " mare ");
                 }
                 if($this-> giveAdviceGrasimi(json_decode(  $_SESSION['perioada'], true), 1) == 1){
                      array_push($stack, "mic");
                      }else{
                      array_push($stack, "mare");
                      }
      }else
      if ($perioada == 'week') {
       $_SESSION['perioada'] = $adv->totalNumberOfCalWeek();
       if($this-> giveAdviceCal( json_decode(  $_SESSION['perioada'], true), 7) == 1){
         array_push($stack, " putine ");
         }else{
         array_push($stack, " multe ");
         }
      if($this-> giveAdviceProteine( json_decode(  $_SESSION['perioada'], true), 7) == 1){
           array_push($stack, "mic");
           }else{
           array_push($stack, "mare");
           }
           if($this-> giveAdviceCarbs( json_decode(  $_SESSION['perioada'], true), 7) == 1){
                array_push($stack, "mica");
                }else{
                array_push($stack, "mare");
                }
                if($this-> giveAdviceGrasimi(json_decode(  $_SESSION['perioada'], true), 7) == 1){
                     array_push($stack, "mic");
                     }else{
                     array_push($stack, "mare");
                     }
     }
    }
    $_SESSION['sugestii'] = $stack;
    $_SESSION['food'] =  $this-> food();
  }

  public function  giveAdviceCal($json, $nr){
    $elementCount  = count($json);
    $i=0;
    $totalCal = 0;
        while($i < $elementCount){
          $totalCal = $totalCal + $json[$i]['calorii'];
          $i++;
        }
        // echo $totalCal;
      if($totalCal < $_SESSION['calories'] * $nr)
        {
          return  1;

        }else return 0;
  }


  public function  giveAdviceProteine($json, $nr){
    $elementCount  = count($json);
    $i=0;
    $totalProteine = 0;
    while($i < $elementCount){
          $totalProteine = $totalProteine + $json[$i]['proteine'];
          $i++;
        }
        // echo $totalCal;
      if($totalProteine < $_SESSION['proteins']*$nr)
        {
          return  1;

        }else return 0;
  }

  public function  giveAdviceCarbs($json, $nr){
    $elementCount  = count($json);
    $i=0;
    $totalCarbs = 0;
    while($i < $elementCount){
          $totalCarbs = $totalCarbs + $json[$i]['carbohidrati'];
          $i++;
        }
        // echo $totalCal;
      if($totalCarbs< $_SESSION['carbs']*$nr)
        {
          return  1;

        }else return 0;
  }

  public function  giveAdviceGrasimi($json, $nr){
    $elementCount  = count($json);
    $i=0;
    $totalGrasimi = 0;
    while($i < $elementCount){
          $totalGrasimi = $totalGrasimi + $json[$i]['grasimi'];
          $i++;
        }
        // echo $totalCal;
      if($totalGrasimi< $_SESSION['lip']*$nr)
        {
          return  1;

        }else return 0;
  }

public function food(){
  $foo = array();
  if(isset($_SESSION['sugestii'][1]) == 'true'& isset($_SESSION['sugestii'][2]) == 'true' & isset($_SESSION['sugestii'][1]) == 'true')
  {
  if($_SESSION['sugestii'][1] == 'mic')
     {
       array_push($foo, "carne de pui, il poti gati cu cateva legume");
     }else{
       array_push($foo, "mai putine");
     }

     if( $_SESSION['sugestii'][2] == 'mica')
        {
          array_push($foo, "orez brun");
        }else{
          array_push($foo, "mai putini, stii doar ca nu sunt sanatosi :)");
        }
     if($_SESSION['sugestii'][2] == 'mic')
           {
             array_push($foo, "avocado, are un procent de 77% grasimi sanatoase pentru organism");
           }else{
             array_push($foo, "mai putine");
           }
         }
          return $foo;
}
}
 ?>
