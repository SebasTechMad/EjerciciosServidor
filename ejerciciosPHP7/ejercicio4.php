<?php
    $ficherosCodigo = array();
    $ficheros_php = 0;


    function searchPHPs(){
        $dir = @opendir($_POST['directorio']) or die("no se ha podido encontrar el fichero indicado");
        $contFicherosPHP=0;
        global $ficherosCodigo;



        if($dir != false){
            while( ($fichero = readdir($dir)) !== false){
                $direccionArchivo = $_POST['directorio']."/".$fichero;
                $tipo_archivo = mime_content_type($direccionArchivo);

                if($tipo_archivo == "text/x-php"){
                    $ficherosCodigo[] = $fichero;
                   $contFicherosPHP++; 
                }
            }
        }

        closedir($dir);
        return $contFicherosPHP;
    }

    function visualizarFicheros(){
        global $ficherosCodigo;
        global $ficheros_php;
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            echo "se han encontrado ".$ficheros_php." archivo/s";

            if($ficheros_php > 0){
                echo "<table><tr><th>Nombre del fichero</th><th>Lineas de codigo</th></tr>";

                foreach ($ficherosCodigo as $fichero) {
                    $fichEntrada = @fopen($_POST['directorio']."/".$fichero, 'r');
                    $lineas = file($_POST['directorio']."/".$fichero);
                    $codeTotal = count($lineas);

                    if($fichEntrada !== false){
                        echo "<tr><td>".$fichero."</td><td>".$codeTotal."</td></tr>";
                    }

                    @fclose($fichEntrada);
                }


                echo "</table>";
            }
        }
    
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $ficheros_php = searchPHPs();
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
            table{
                text-align:center;
                border:solid black 1px;
                border-collapse:collapse;
            }

            th,td{
                padding:1rem;
                border:solid black 1px;
            }
        </style>
    </head>
    <body>
        <form method="post">
            <label for="txtDir">introduce el directorio</label>
            <input type="text" name="directorio" id="txtDir">
            <button type="submit">Buscar</button>
        </form>
        <?= visualizarFicheros(); ?>
    </body>
        
</html>