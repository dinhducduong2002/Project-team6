<?php 
class Controller{

    public function view($view, $data=[]){
        require_once "./mvc/Views/".$view.".php";
    }

}
?>