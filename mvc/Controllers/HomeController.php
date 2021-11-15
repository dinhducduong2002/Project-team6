<?php
class HomeController extends Controller{
    public $GetProduct;
    public $GetDetailProduct;

    public function __construct()
    {
        $this->GetProduct = $this->model("ProductModel");
        $this->GetDetailProduct = $this->model("ProductModel");
    }

    public function Home(){

        $this->view("HomeViews", [
            "pages" => "HomePage"
        ]);
    }

    public function ShowProduct(){
        $this->view("ProductViews", [
            "pages" => "ProductPage",
            "Product"=>$this-> GetProduct->GetProduct(),
        ]);
    }

    public function DetailProduct($id){
        $this->view("ProductViews", [
            "pages" => "DetailPage",
            "Get_id"=>$id,
            "DetailProduct"=>$this-> GetDetailProduct->GetDetailProduct($id)
        ]);
    }

    public function pay(){
        $this->view("ProductViews", [
            "pages" => "login"
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