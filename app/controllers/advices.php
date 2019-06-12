<?php

class Advices extends Controller{

    public function index() {
    $this->view('advices');
    $adv = $this->model('AdvicesModel',Db::getInstance());
    // $data = strval (date("Y-d-m",strtotime('now')));
    // echo $data;
    $adv->totalNumberOfCalWeek();
    }
}
 ?>
