<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <!-- 3.Obtener un número al azar entre 1 y 9, y generar 
         una pirámide con ese número de peldaños. Utilizar la marca 
         <code></code> para que la visualización no se deforme por 
         el tamaño de los espacios o una estilo con tipo de letra monospace.-->
        <?php
        $num_aleatorio = random_int(1,9);
        $coordenadasY = 1;
        $piramideNumSoporte = 0;

        echo "<p>Número aleatorio generado => $num_aleatorio</p>";
        echo "<div style='text-align:center; width:20%;'>";

        for($coordenadasY; $coordenadasY <= $num_aleatorio; $coordenadasY++)
        {
            $coordenadasX = 0;
            $contSuma = $coordenadasY + $piramideNumSoporte;
            for($coordenadasX; $coordenadasX < $contSuma ; $coordenadasX++)
            {
                echo "<span>*</span>";
            }

            echo "<br>";
            $piramideNumSoporte++;
        }
        
        echo "</div>";
        echo "<div style='text-align:center; width:90%;'><br></div>";

        ?>



    </body>
</html>