<?php
    if(!is_dir("verdirinfo_prueba")){
        die("No existe el directorio");
    }

    function ordenar($a, $b)
    {
        //Ordenar de MAYOR A MENOR
        return $b[2] - $a[2];
    }

    $directorio = @opendir("verdirinfo_prueba") or die("no se ha encontrado el directorio");
    $directorios = array();
    //mientras que entrada tenga un fichero para leer estará en el bucle
    while ( ($entrada = @readdir($directorio)) !== false){
        if($entrada != "." && $entrada != ".."){
            $fichEntrada = @fopen("./verdirinfo_prueba/".$entrada, 'r');

            $tipo_fichero = mime_content_type($fichEntrada);
            $fichero_size = filesize("./verdirinfo_prueba/".$entrada);
            $directorios[] = [$entrada, $tipo_fichero, $fichero_size];
            
            @fclose($fichEntrada);
        }
    }


    function visualizarTabla(){
        global $directorios;

        foreach ($directorios as $clave => $datos) {
            echo "<tr><td>".$datos[0]."</td><td>".$datos[1]."</td><td>".$datos[2]."</td></tr>";
        }


    }
    
    usort($directorios, 'ordenar');

    @closedir($directorio);
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
        <h1>Directorios</h1>
        <table>
            <tr>
                <th>Nombre fichero</th>
                <th>Tipo fichero</th>
                <th>Tamaño</th>
            </tr>
            <?= visualizarTabla(); ?>
        </table>
    </body>
</html>