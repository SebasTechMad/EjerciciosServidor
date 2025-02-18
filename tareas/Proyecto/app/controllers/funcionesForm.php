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
        

        //COSAS PARA VER IMBECIL

        //*TIENES QUE SUSTITUIR LA IMAGEN SI YA SE HA SUBIDO UNA IMAGEN DE UN USUARIO

        if($_SESSION['current_id'] != "")
        {
            if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
            
                $uploadDir = 'app/uploads/';
    
                $formatos_permitidos =  array('jpg','png','jpeg');
                $archivo = $_FILES['foto']['name'];
                $extension = pathinfo($archivo, PATHINFO_EXTENSION);
    
                if(!in_array($extension, $formatos_permitidos) ) {
                    $cadError .= "formato de imagen, ";
                }else{
    
                    $numID = intval($_SESSION['current_id']);
                    $numID = $numID / 100000000;
                    $numID = number_format($numID,8);
                    $numID = str_replace("0.","",$numID);

                    foreach ($formatos_permitidos as $formato)
                    {
                        if(file_exists($uploadDir.$numID.".".$formato))
                        {
                            unlink($uploadDir.$numID.".".$formato);
                        }
                    }
    
    
                    $uploadFile = $uploadDir.$numID.".".$extension;
                    move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile);
                }
    
            }
            else{
                $cadError .= "tamaño de imagen, ";
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
        $pathurl = "app/uploads/";
        $rutaValida = false;
        
        $numID = intval($id);
        $numID = $numID / 100000000;
        $numID = number_format($numID,8);
        $numID = str_replace("0.","",$numID);

        $extensiones = array(".jpg",".jpeg",".png");

        foreach ($extensiones as $extension)
        {
            $url = $pathurl.$numID.$extension;
            
            if(file_exists($url))
            {
                $rutaValida = true;
                break;
            }
        }

        if(!$rutaValida)
        {
            $url = "https://robohash.org/".$numID;
        }

        return $url;
    }


    function addProfileId($id)
    {
        if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        
            $uploadDir = 'app/uploads/';

            $formatos_permitidos =  array('jpg','png','jpeg');
            $archivo = $_FILES['foto']['name'];
            $extension = pathinfo($archivo, PATHINFO_EXTENSION);

            if(!in_array($extension, $formatos_permitidos) ) {
                $cadError .= "formato de imagen, ";
            }else{

                $numID = intval($id);
                $numID = $numID / 100000000;
                $numID = number_format($numID,8);
                $numID = str_replace("0.","",$numID);


                $uploadFile = $uploadDir.$numID.".".$extension;
                move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile);
            }

        }
    }

    function getBandera($ip)
    {
        $url = "";

        //print_r(strval($ip));

        //$ip = "8.8.8.8"; // Reemplaza con la IP que quieras consultar
        $url = "http://ip-api.com/json/".strval($ip);

        // Obtener el contenido JSON de la API
        $response = file_get_contents($url);

        // Decodificar el JSON
        $json_ip = json_decode($response, true);

        print_r($json_ip);




        $url = "https://flagpedia.net/data/flags/w580/".strtolower($json_ip['countryCode']).".png";

        return $url;
    }


?>