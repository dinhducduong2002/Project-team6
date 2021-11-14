<?php 
class App{

    protected $controller="HomeController";
    protected $action="Home";
    protected $params=[];
    function __construct()
    {
        $arr = $this->UrlProcess();
        //xử lý controler
        if(isset($arr)){
            if(file_exists("./mvc/Controllers/".$arr[0].".php")){
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        
        require_once "./mvc/Controllers/". $this->controller .".php";
        $this->controller = new $this->controller;
        
        
        //Xử lý action controller nào được chạy
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        // Params
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$this->controller, $this->action], $this->params );

    }
    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
        
    }
}
