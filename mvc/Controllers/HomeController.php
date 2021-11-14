<?php
class HomeController extends Controller{
    
    public function Home(){

        $this->view("HomeViews", [
            "pages" => "HomePage"
        ]);
    }
    public function ShowProduct(){
        $this->view("ProductViews", [
            "pages" => "ProductPage"
        ]);
    }
    public function DetailProduct(){
        $this->view("ProductViews", [
            "pages" => "DetailPage"
        ]);
    }
    public function login(){
        $this->view("ProductViews", [
            "pages" => "login"
        ]);
    }
    public function register(){
        $this->view("ProductViews", [
            "pages" => "register"
        ]);
    }
}
?>