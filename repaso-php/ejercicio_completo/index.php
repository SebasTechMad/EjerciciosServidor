<?php 
    session_start();



    //TODO COMPROBAR LOGIN
    if(isset($_GET['usuario']) && isset($_GET['clave']))
    {
        //METODO CON BD
    }else{
        include_once "login.php";   
    }

?>