<?php
define('FPAG', 10); // Número de clientes por página
require_once "app/Cliente.php";
require_once  "app/AccesoDAO.php";
$btnActualizar = "";
$btnGuardar = "";
$cliente = null;

session_start();

// Valor por defecto de la posición inicial
if (!isset($_SESSION['posini'])) {
    $_SESSION['posini'] = 0;
}

$dbh = AccesoDAO::getModelo();
$numclientes = $dbh->totalClientes();

if ( $numclientes % FPAG == 0){
    $ultimo = $numclientes - FPAG;
}
else {   
     $ultimo = $numclientes - ($numclientes % FPAG);
}

$primero = $_SESSION['posini'];

// Segun la paginación se cambia la posición inicial
if ( isset($_GET['orden'])){
  
    if($_GET['orden'] == "modificar" || $_GET['orden'] == "detalles"){
        $cliente = $dbh->getCliente($_GET['id']);
        if($_GET['orden'] == "modificar"){
            $btnActualizar = "";
            $btnGuardar = "true";
            include_once "app/plantillas/formulario.php";
        }else{
            $btnActualizar = "true";
            $btnGuardar = "true";
            include_once "app/plantillas/formulario.php";
        }
    }else{
        switch ($_GET['orden']){
            case "Primero":
                $primero = 0;
                break;
            case "Siguiente":
                $primero += FPAG;
                if ($primero > $ultimo){
                    $primero = $ultimo;
                }
                break;
            case "Anterior":
                $primero -= FPAG;
                if ( $primero < 0){
                    $primero = 0;
                }
                break;
            case "Ultimo":
                $primero = $ultimo;
        }
        $_SESSION['posini'] = $primero;
        $tclientes = $dbh->getClientes($primero,FPAG);
        include "app/plantillas/principal.php";
    }
}else{
    $tclientes = $dbh->getClientes($primero,FPAG);
    include "app/plantillas/principal.php";
}







// Acceder a la base de datos y pedir los clientes de la página
// Guardar en la variable en una tabla
// Mostrar la tabla en la vista
