<?php
function login(){
    function db_user_get_by_username($username){
        $username = addslashes($username);
        $sql = "SELECT * FROM tb_user where username = '{$username}'";
        return db_get_row($sql);
    }
 
            client_render('/login.php');
}
    

function register(){
	
    client_render('/register.php');
}