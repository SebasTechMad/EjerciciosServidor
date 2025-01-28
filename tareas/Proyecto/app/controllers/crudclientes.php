<?php

function crudBorrar ($id){    
    $db = AccesoDatos::getModelo();
    $resu = $db->borrarCliente($id);
    if ( $resu){
         $_SESSION['msg'] = " El usuario ".$id. " ha sido eliminado.";
    } else {
         $_SESSION['msg'] = " Error al eliminar el usuario ".$id.".";
    }

}

function crudTerminar(){
    AccesoDatos::closeModelo();
    session_destroy();
}
 
function crudAlta(){
    $cli = new Cliente();
    $orden= "Nuevo";
    include_once "app/views/formulario.php";
}

function crudDetalles($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/detalles.php";
}



function crudModificar($id){
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $orden="Modificar";
    include_once "app/views/formulario.php";
}

function crudPostAlta(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    // !!!!!! No se controlan que los datos sean correctos 
    if(postCheckDatosCorrectos())
    {
        $cli = new Cliente();
       
        $cli->id            =$_POST['id'];
        $cli->first_name    =$_POST['first_name'];
        $cli->last_name     =$_POST['last_name'];
        $cli->email         =$_POST['email'];	
        $cli->gender        =$_POST['gender'];
        $cli->ip_address    =$_POST['ip_address'];
        $cli->telefono      =$_POST['telefono'];
        $db = AccesoDatos::getModelo();
        if ( $db->addCliente($cli) ) {
            $_SESSION['msg'] = " El usuario ".$cli->first_name." se ha dado de alta ";
            } else {
                $_SESSION['msg'] = " Error al dar de alta al usuario ".$cli->first_name."."; 
            }
        
    }
}

function crudPostModificar(){
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    
    if(postCheckDatosCorrectos())
    {
        $cli = new Cliente();

        $cli->id            =$_POST['id'];
        $cli->first_name    =$_POST['first_name'];
        $cli->last_name     =$_POST['last_name'];
        $cli->email         =$_POST['email'];	
        $cli->gender        =$_POST['gender'];
        $cli->ip_address    =$_POST['ip_address'];
        $cli->telefono      =$_POST['telefono'];
        $db = AccesoDatos::getModelo();
        if ( $db->modCliente($cli) ){
            $_SESSION['msg'] = " El usuario ha sido modificado";
        } else {
            $_SESSION['msg'] = " Error al modificar el usuario ";
        }
    }
}

// Metodo que utilizaremos para comprobar si la entrada de datos
// es la correcta para cada entrada
function postCheckDatosCorrectos(){
    $comprobacion = true;
    $errorres = 0;

    $cadError = "";
    
    
    if($_POST['id'] != ""){
        $comprobacion = false;
        $cadError .= "id, ";
        $errorres++;
    }

    if($_POST['first_name'] == ""){
        $comprobacion = false;
        $cadError .= "primer nombre, ";
        $errorres++;
    }

    if($_POST['last_name'] == ""){
        $comprobacion = false;
        $cadError .= "segundo nombre, ";
        $errorres++;
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $comprobacion = false;
        $cadError .= "correo, ";
        $errorres++;
    }

    if(!filter_var($_POST['ip_address'], FILTER_VALIDATE_IP)){
        $comprobacion = false;
        $cadError .= "direccion ip, ";
        $errorres++;
    }

    //Comprobamos el numero de telefono
    $cadTelefono = explode("-", $_POST['telefono']);

    if(count($cadTelefono) != 3){
        $comprobacion = false;
        $cadError .= "número de teléfono, ";
    }else{
        $lineaNumeros = 0; 
        foreach($cadTelefono as $cifra) {
            if($lineaNumeros == count($cadTelefono)-1){

                if(strlen($cifra) != 4)
                {
                    $comprobacion = false;
                    $cadError .= "número de teléfono, ";
                    break;    
                }
            }
            
            else{
                
                if(strlen($cifra) != 3)
                {
                    $comprobacion = false;
                    $cadError .= "número de teléfono, ";
                    break;    
                }
            }
            $lineaNumeros++;
        }
    }

    


    if($errorres == 1){
        $cadError = str_replace(", ","",$cadError);
    }

    if(!$comprobacion){
        $_SESSION['msg'] = "Error en el ".$cadError.". Vuelva a intentarlo";
    }


    return $comprobacion;
}

function crudPostSiguiente($id){
    $db = AccesoDatos::getModelo();
    $clientes = $db->numClientes();

    $calc = intval($id) + 1;
    ($calc <= $clientes) ? $cli = crudModificar($calc): $cli = crudModificar($id);
}

function crudPostAnterior($id){
    $db = AccesoDatos::getModelo();
    $calc = intval($id) - 1;

    ($calc > 0) ? $cli = crudModificar($calc): $cli = crudModificar(intval($id));
}

function crudSiguiente($id){
    $db = AccesoDatos::getModelo();
    $clientes = $db->numClientes();

    $calc = intval($id) + 1;
    ($calc <= $clientes) ? $cli = crudDetalles($calc): $cli = crudDetalles($id);
}

function crudAnterior($id){
    $db = AccesoDatos::getModelo();
    $calc = intval($id) - 1;

    ($calc > 0) ? $cli = crudDetalles($calc): $cli = crudDetalles(intval($id));
}



