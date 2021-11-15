<?php
class ProductModel extends DB{
    public function GetProduct(){
        $sql = "SELECT * FROM sanphamnro";
        $result =$this-> getData($sql, $flag = true);
        return $result;
    }
}
?>