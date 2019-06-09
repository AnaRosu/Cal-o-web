<?php
class BaseController
{
private $base_url = "http://localhost/another-tw/Cal-o-web/public";

public function redirect($url){
      header("Location: {$this->base_url}{$url}");
  }
}
  ?>
