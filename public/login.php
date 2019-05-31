<?php
require_once '../app/init.php';
require_once '../app/db.php';
require '../config.php';
$pdo = dbConnect();
$app = new App($pdo, 'LoginController', 'login');
?>
