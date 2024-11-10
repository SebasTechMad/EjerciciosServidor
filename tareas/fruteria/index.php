<?php 
    session_start();
    $compraRealizada = "";
    $articulos = [];



    function fillCompras()
    {
        global $compraRealizada;

        foreach($_SESSION['frutas'] as $articulo => $numero)
        {
            foreach($numero as $articulo1 => $numero1){
                $lineaArray =$articulo1." ".$numero1;
            }

            $compraRealizada = $compraRealizada.$lineaArray."<br>";
        }
    }



    function accionesGET(){
        global $compraRealizada;
        global $articulos;

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
        //fillCompras();
        
        if($_SERVER['REQUEST_METHOD']=="POST"){
            
            switch ($_POST['accion']){
                case "Anotar":
                    //TODO HACER UN FILL A LA LISTA
                    $articulos[] = [ $_POST['fruta'] => $_POST['cantidad'] ];

                    if(!isset($_SESSION['frutas'])){
                        $_SESSION['frutas'] = $articulos;
                    }else{
                        $_SESSION['frutas'] = array_merge($_SESSION['frutas'],$articulos);
                    }

                    fillCompras();
                    include_once ("./compra.php");
                    break;

                case "Terminar":
                    fillCompras();
                    include_once ("./despedida.php");
                    session_destroy();
                    break;
            }
        }
    }





    // if($_SERVER['REQUEST_METHOD']=="GET"){
    //     accionesGET();
    // }else{
    //     accionesPOST();
    // }

    if(!isset($_SESSION['cliente'])){
        accionesGET();
    }else{
        accionesPOST();
    }
?>