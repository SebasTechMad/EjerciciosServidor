<?php 
    session_start();

    if(isset($_SESSION['cliente'])){
        include_once ("./compra.php");
    }else{
        include_once ("./bienvenida.php");
        $_SESSION['cliente'] = $_GET['cliente'];
    }

        

    
?>