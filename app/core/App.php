<?php
class App
{
    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        $url = $this->parseUrl();
//        echo 'URL: ';
//        print_r($url);
        //verificam existenta controllerului
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        } else {
            $this->controller = 'home';
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;
        //verificam al doilea parametru
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        //in cazul in care nu avem parametrii
        $this->params = $url ? array_values($url) : [];
//        print_r($this->params);
        //array_unshift($this->params, $pdo); CE FACE ASTA??
//        print_r($this->params);
        call_user_func_array([$this->controller, $this->method], $this->params);
//        echo $this->controller;
    }

    public function parseUrl()
    {   //verificam daca url exista
        if (isset($_GET['url'])) {
            // echo $_GET['url'];
            //split the url
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
?>
