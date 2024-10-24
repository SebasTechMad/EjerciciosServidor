<?php

    $estatusImagen = "";
    $errorImagen = "";

    function getName(){
        return $_POST['nombre'];
    }

    function getNickname(){
        return $_POST['alias'];
    }

    function getAge(){
        return $_POST['edad'];
    }

    function getFile(&$msgEstatus, &$msgError){

        $uploadDir = 'uploads/';


        if ($_FILES['foto']['error'] !== UPLOAD_ERR_OK) {
            $uploadFile = $uploadDir . "imageNotFound.gif";
            $msgEstatus = "No se ha subido una imagen";
            $msgError = "Error al subir imagen";
        }else{
            $msgEstatus = "Imagen subida";
            $uploadFile = $uploadDir . basename($_FILES['foto']['name']);
        }

        move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile);

        return $uploadFile;
    }

    function getArmas(){
        $contArmas = 0;
        $resultado = "";

        if(isset($_POST['arma']))
        {
            foreach($_POST['arma'] as $item)
            {
                ($contArmas == 0) ? $resultado = $item: $resultado .= ", $item";
                $contArmas++;
            }
        }

        if($contArmas ==0){
            $resultado = "se va a dar con los puños";
        }

        return $resultado;
    }

    function getMagia(){
        return $_POST['magia'];
    }



    function getHTML($name, $nickname, $age, $src,$estatusImagen, $errorImagen){
        return '<!DOCTYPE html>
        <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>resultado</title>
                <link rel="stylesheet" href="./index.css">
            </head>

            <body>
                <header class="title-header">
                    <h1>Datos del jugador</h1>
                </header>

                <div class="content-jugador">
                    <div class="info-jugador" id="datos">
                        <b>Nombre: '.$name.'</b>
                        <b>Alias: '.$nickname.'</b>
                        <b>Edad: '.$age.'</b>
                        <b>Armas seleccionadas: '.getArmas().'</b>
                        <b>¿Prácticas con artes mágicas? '.getMagia().' </b>
                    </div>

                    <div class="info-jugador">
                        <!--TODO COMPROBAR SUBIDA IMAGEN-->
                        <b>'.$estatusImagen.'</b>
                        <!--TODO INTRODUCIR IMAGEN-->
                        <img src='.$src.' class ="img-style">
                        <!--ERROR SUBIDA IMAGEN-->
                        <b>'.$errorImagen.'</b>
                    </div>
                </div>


            </body>
        </html>';
    }



    
    if($_SERVER['REQUEST_METHOD']=='GET'){
         include_once 'captura.html';
    }else{

        $nombre = getName();
        $nickname = getNickname();
        $age = getAge();
        $src = getFile($estatusImagen, $errorImagen);
        $htmlContent = getHTML($nombre, $nickname, $age,$src ,$estatusImagen,$errorImagen);
        echo $htmlContent;
    }
?>



