<?php 
    session_start();
    $compraRealizada = "";
    $articulos = [];



    function fillCompras()
    {
        global $compraRealizada;

        //EN CASO DE QUE EL USUAIO AÑADA DATOS A LA LISTA, LA
        // RECORREMOS
        if(isset($_SESSION['frutas']))
        {
            foreach($_SESSION['frutas'] as $c => $v){
                $compraRealizada .= $c." ".$v."<br>";
            }
        }
    }



    function accionesGET(){
        global $compraRealizada;
        if(isset($_GET['cliente']) || $_SERVER['REQUEST_METHOD'] == "POST"){
            $_SESSION['cliente'] = $_GET['cliente'];
            include_once ("./compra.php");
        }else{
            include_once ("./bienvenida.php");
        }

    }

    function accionesPOST(){
        global $compraRealizada;
        global $articulos;
        
        if($_SERVER['REQUEST_METHOD']=="POST"){
            
            //Dependiendo del botón seleccionado, haremos X acción
            switch ($_POST['accion']){
                case "Anotar":
                    $_SESSION['frutas'][$_POST['fruta']] = $_POST['cantidad'];
                    fillCompras();
                    include_once ("./compra.php");
                    break;

                case "Terminar":
                    fillCompras();
                    include_once ("./despedida.php");
                    session_destroy();
                    break;

                case "Anular":
                    unset($_SESSION['frutas'][$_POST['fruta']]);
                    fillCompras();
                    include_once ("./compra.php");
                    break;
            }
        }else{  //En caso de que el usuario cambie de pestaña y venga con una peticion GET
            fillCompras();
            include_once ("./compra.php");
        }
    }

    //parte MAIN index.php
    if(!isset($_SESSION['cliente'])){
        accionesGET();
    }else{
        accionesPOST();
    }
?>