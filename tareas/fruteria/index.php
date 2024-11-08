<?php 
    session_start();
    $compraRealizada = "";
    $articulos = ["Platanos","Limones","Manzanas","Narajas"];


    function fillCompras()
    {
        global $compraRealizada;
        foreach ($articulos as $articulo) {
            if(isset($_SERVER[$articulo])){
                $compraRealizada = $articulo." ".$_SESSION[$articulo].", ";
            }
        }

    }



    function accionesGET(){
        if(isset($_GET['cliente'])){
            $_SESSION['cliente'] = $_GET['cliente'];
            fillCompras();
            include_once ("./compra.php");
        }else{
            include_once ("./bienvenida.php");
        }
    }

    function accionesPOST(){
        fillCompras();

        switch ($_POST['accion']){

            case " Anotar ":
                $_SESSION[]




        }
    }





    if($_SERVER['REQUEST_METHOD']=="GET"){
        accionesGET();
    }else{
        accionesPOST();
    }
?>