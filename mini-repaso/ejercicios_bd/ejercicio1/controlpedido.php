<?php
    include "accesoDatos.php";

    //Variables vitales para el programa
    $pedidos = [];
    $msg = "";  //Mensaje que podemos reutlizar en el programa
    $ac = AccesoDatos::getModelo(); //
    

    switch ($_GET['enviar']) {
        case "cliente":
            if(empty($_GET['nombre']) || empty($_GET['clave']))
            {
                error();
            }
            else
            {
                buscarUsuarios();
            }
            break;
        
        case "trabajador":
            if(empty($_GET['cod_empleado']) || empty($_GET['pwd']))
            {
                error();
            }
            else
            {
                $ac->buscarTrabajador($_GET['cod_empleado'], $_GET['pwd']);

            }
            break;
    }




    


    function error(){
        global $msg;

        $msg = "introduce un valor para todos los campos";
        include_once 'vistaError.php';
    }

    


    function buscarUsuarios()
    {
        global $ac;
        global $pedidos;
        global $msg;

        
        $nombre = $_GET['nombre'];
        $clave = $_GET['clave'];

        $cliente = $ac->getCliente($nombre, $clave);

        if(!$cliente)
        {
            $msg = "No se ha encontrado los usuarios";
            include_once "vistaError.php";
            exit();
        }else{
            $pedidos = $ac->getPedidos($cliente->cod_cliente);
            include_once "vistaPedidos.php";
        }
    }



    


?>