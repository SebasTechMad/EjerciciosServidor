<?php
    require_once "./AccesoDatos.php";
    require_once "./Cliente.php";
    $tuser = [];
    $tpedidos = [];
    $ac = AccesoDatos::getModelo();
    session_start();
    $msg = "";
    $primero = 0;
    $ultimo = 0;
    $totalPedidos = null;

    
    define('FRAG',4);

    if(!isset($_SESSION['posini'])){
        $_SESSION['posini'] = 0;
    }

    if(isset($_GET['orden']) && $_GET['orden'] == "cerrar"){
        unset($_SESSION['id']);
        unset($_SESSION['start']);
    }


    if(!isset($_COOKIE['time'])){
        
        if(isset($_SESSION['id'])){
            unset($_SESSION['id']);
        }
    }

    


    
    

    if( isset($_SESSION['id']) )
    {
        $tuser = $ac->getCliente($_SESSION['nombre'], $_SESSION['clave']);
        $totalPedidos = $ac->totalPedidos($_SESSION['id']);

        //Analizamos si tiene alguna orden

        if(isset($_GET['orden'])){
            switch ($_GET['orden']) {
                case 'primero':
                    $primero = 0;
                    $tpedidos = $ac->getPedidos($_SESSION['id'], $primero, FRAG);
                    $_SESSION['posini'] = $primero;
                    break;
                case 'ultimo':
                    $primero = $totalPedidos - 4;
                    $tpedidos = $ac->getPedidos($_SESSION['id'], $primero, FRAG);
                    $_SESSION['posini'] = $primero;
                    break;
                case 'siguiente':
                    $primero = $_SESSION['posini'] + 4;

                    if($totalPedidos - $primero >=4){
                        $tpedidos = $ac->getPedidos($_SESSION['id'], $primero, FRAG);
                    }else{
                        $primero = $totalPedidos - 4;
                        $tpedidos = $ac->getPedidos($_SESSION['id'], $primero, FRAG);
                    }
                    $_SESSION['posini'] = $primero;
                    break;

                case 'anterior':
                    $primero = $_SESSION['posini'] - 4;

                    if($primero >= 0){
                        $tpedidos = $ac->getPedidos($_SESSION['id'], $primero, FRAG);
                    }else{
                        $primero = 0;
                        $tpedidos = $ac->getPedidos($_SESSION['id'], $primero, FRAG);
                    }
                    $_SESSION['posini'] = $primero;
                    break;
                
                default:
                    break;
            }
        }else
        {
            $tpedidos = $ac->getPedidos($_SESSION['id'], 0, FRAG);
            print_r("el login se ira al carajo en ".$_COOKIE['time'] - time());
            $_SESSION['posini'] = $primero;
        }



        include_once "./historial.php";
    }
    else
    {
        //Saltar al formulario de inicio
        if( isset($_GET['nombre']) && !empty($_GET['nombre']) && isset($_GET['clave']) && !empty($_GET['clave']) )
        {
            $tuser = $ac->getCliente($_GET['nombre'], $_GET['clave']);

            

            if($tuser){
                $_SESSION['nombre'] = $_GET['nombre'];
                $_SESSION['clave'] = $_GET['clave'];
                if(!isset($_COOKIE['time'])){
                    setcookie('time', time() + 180, time() + 180);
                }
                print_r("el login se ira al carajo en ".$_COOKIE['time'] - time());
                include_once "historial.php";
            }else{
                $msg = "Credenciales no correctas";
                include_once "error.php";
                include_once "inicio.php";
            }
        }
        else
        { 
            if(!isset($_SESSION['start'])){
                $_SESSION['start'] = "start";
                include_once "inicio.php";
            }
            else
            {
                $msg = "introduce todos los datos";
                include_once "error.php";
                include_once "inicio.php";
            }
        }
    }
    
?>