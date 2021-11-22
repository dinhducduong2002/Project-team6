<?php
function login(){
    $username = $_GET['username'];
    $password =$_GET['password'];
    $sql="select * from users where username = '$username' and password = '$password'";
    $user = executeQuery($sql);
            client_render('/login.php');
}
    

function register(){
	
    client_render('/register.php');
}