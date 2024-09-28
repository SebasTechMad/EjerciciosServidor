<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ejercicio 2</title>
    </head>
    <body>
        
    <!-- 2.Obtener un número al azar entre 1 y 9 y generar una la escalera 
     numérica del tamaño indicado alternando colores entre rojo y azul.-->

     <?php
        $coordenadasY;
        $coordenadasX;
        $num_aleatorio = random_int(1,9);

        echo "<h3>Numero aleatorio generado => $num_aleatorio</h3>";
        #Recorremos las coordenadas Y para la estructura de la escalera
        for($coordenadasY = 1;$coordenadasY <= $num_aleatorio;$coordenadasY++)
        {
            $coordenadasX = 0;
            #Recorremos las coordenadas X para poder rellenar la escalera
            for($coordenadasX; $coordenadasX < $coordenadasY; $coordenadasX++)
            {
                if($coordenadasY % 2 == 0){
                    echo "<span style='color:red; font-size:20px;'>$coordenadasY</span>";
                }else{
                
                    echo "<span style='color:blue; font-size:20px;'>$coordenadasY</span>";
                }
            }
            echo "<br>";
        }
    ?>
    </body>
</html>