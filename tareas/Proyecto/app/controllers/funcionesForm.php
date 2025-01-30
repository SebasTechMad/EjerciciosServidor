<?php
    // Metodo que utilizaremos para comprobar si la entrada de datos
    // es la correcta para cada entrada
    function postCheckDatosCorrectos(){
        $comprobacion = true;
        $errorres = 0;

        $cadError = "";

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


    function checkFotoPerfil($id){
        
        $url = "";
        
        $numID = intval($id);
        $numID = $numID / 100000000;
        $numID = number_format($numID,8);
        $numID = str_replace("0.","",$numID);
        
        $url = "app/uploads/".$numID.".jpg";

        
        return $url;
    }
?>