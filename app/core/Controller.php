<?php
class Controller {
    public function model($model, $pdo) {
        require_once '../app/models/' . $model . '.php';
        return new $model($pdo);
    }
    public function view($view, $data = []) {
        require_once '../app/view/' . $view . '.php';
    }
}
?>
