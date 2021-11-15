<?php
class ProductModel extends DB{
    public function GetProduct(){
        $sql = "SELECT * FROM sanphamnro";
        $result =$this-> getData($sql);
        return $result;
    }
    public function GetDetailProduct($id){
        $sql = "SELECT * FROM sanphamnro where id='$id'";
        $result =$this-> getData($sql);
        return $result;
    }
    public function GetId(){
        if (!isset($_GET['id'])) {
            $id = 1;
        } else {
            $id = $_GET['id'];
        }
        return $id;
    }
}
?>