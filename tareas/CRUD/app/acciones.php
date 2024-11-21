<?php
// Borra el elemento indicado de tabla de usuarios
// Reordena indexa la tabla
function accionBorrar ($id){    
     //<<<< COMPLETAR >>>>>>  
     // anotar en $_SESSION['msg'] un mensaje si el usuario ha sido eliminado o si no existe
    
    // Elimino de la tabla
    unset( $_SESSION['tuser'][$id]);
    $_SESSION['msg'] = "se ha eliminado al usuario correctamente";
    
}

// Termina: Cierra sesión y vuelva los datos
function accionTerminar(){
       
        volcarDatos($_SESSION['tuser']);
        session_destroy();
       $_SESSION['msg'] = "  Todos datos se han guardado ";
}
 

// Muestra un formularios con los datos de un usuario de la posición $id de la tabla
function accionDetalles($id){
    $login=$id;
    $usuario = $_SESSION['tuser'][$id];
    $clave  =   $usuario[0];
    $nombre   = $usuario[1];
    $comentario=$usuario[2];
    $orden = "Detalles";
    include_once "layout/formulario.php";
    exit();
}

// Muestra  el formularios con los datos permitiendo la modificación
function accionModificar($id){
    $login=$id;
    $usuario = $_SESSION['tuser'][$id];
    $clave  = $usuario[0];
    $nombre  = $usuario[1];
    $comentario=$usuario[2];
    $orden = "Modificar";
    include_once "layout/formulario.php";
    exit();  
}

// Modifica el contenido de usuario
function accionPostModificar() {
    //<<<< COMPLETAR >>>>>>
    if(comprobarVacios()){
        $id = $_POST['login'];
        $nuevovalor = [ $_POST['clave'],$_POST['nombre'],$_POST['comentario']];
        $_SESSION['tuser'][$id]= $nuevovalor;  
        $_SESSION['msg'] = " Usuario con login $id actualizado";
    }else{
        $_SESSION['msg'] = "Error, rellena los datos para modificar";
    }

}


// Muestra  el formulario con los datos vacios para realizar una alta
function accionAlta(){
    $nombre  = "";
    $login   = "";
    $clave   = "";
    $comentario = "";
    $orden= "Nuevo";
    include_once "layout/formulario.php";
    exit();
}

// Proceso los datos del formularios guardándolo en la sesión
// Debe evitar que se puedan introducir dos usuarios con el mismo login y
// que exista algún campo vacio.

function accionPostAlta(){
    
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    //<<<< COMPLETAR >>>>>>
    if(comprobarVacios()){
        if(!comprobarMismoLogin()){
            $id = $_POST['login'];
            $nuevo = [ $_POST['clave'],$_POST['nombre'],$_POST['comentario']];
            $_SESSION['tuser'][$id]= $nuevo;  
            $_SESSION['msg'] = "Nuevo usuario añadido.";
        }else{
            $_SESSION['msg'] = "No se puedo crear, el login ya existe";
        }
    }else{
        $_SESSION['msg'] = "No se puedo crear, rellena todos los datos";
    }
    //<<<< COMPLETAR y CORREGIR>>>>>>
    
}

function comprobarVacios(){
    $comprobacion = true;

    foreach ($_POST as $nombre_campo => $valor) {
        if(empty($valor)){
            $comprobacion = false;
            break;
        }
    }
    print_r($comprobacion);
    return $comprobacion;
}

function comprobarMismoLogin(){
    return array_key_exists($_POST['login'], $_SESSION['tuser']);
}


