<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

        <!-- 4.- Generar números al azar entre 1 y 10 hasta que se 
        generen 3 veces el valor 6 de forma consecutiva en ese caso
        se mostrará cuantos número se han generado.  --> 
        <?php
            $time_start = microtime(true);
            $find = false;
            $contNumerosGenerados = 0;
            
            while(!$find)
            {
                $ramdon_num1 = random_int(1,9);
                $ramdon_num2 = random_int(1,9);
                $ramdon_num3 = random_int(1,9);

                $contNumerosGenerados += 3;

                if($ramdon_num1 == $ramdon_num2 && $ramdon_num1 == $ramdon_num3){
                    $find = true;
                }
            }

            $time_end = microtime(true);

            $total_time= $time_end - $time_start;

            echo "Han salido tres 6 seguidos después de generar $contNumerosGenerados números tras generar  $total_time";
        ?>    
    </body>
</html>