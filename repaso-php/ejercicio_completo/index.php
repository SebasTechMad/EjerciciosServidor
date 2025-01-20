<?php 
    session_start();



    //TODO COMPROBAR LOGIN
    if(isset($_GET['usuario']) && isset($_GET['clave']))
    {
        
    }else{
        include_once "login.php";   
    }

?>