<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ejercicio 5</title>
    </head>
    <body>

    <!-- 5.- Realizar un segunda versión del primer ejercicio donde la página de resultado 
     tiene que mostrar una tabla con el siguiente  formato utilizando estilo. -->

    <?php

    $num_aleatorio1 = random_int(1,10);
    $num_aleatorio2 = random_int(1,10);
    $rowOperacion = 0;
    $maxRowOperacion = 6;

    $RowGris = 1;
    $contOperacion = 0;
    $resultado = 0;
    $operacion = 0;


    echo "1º Número => $num_aleatorio1"."<br>";
    echo "2º Número => $num_aleatorio2"."<br>";

    echo "<table style='margin-top:13px; border-collapse:collapse;'>";
        echo "
        <tr style='background-color:#ddeaf5;'>
            <th style='border:solid black 1px; color:#0082ee; text-align:start;'>Operación</th>
            <th style='border:solid black 1px; color:#0082ee; text-align:end;'>Resultado</th>
        </tr>";

        for($rowOperacion; $rowOperacion < $maxRowOperacion; $rowOperacion++)
        {
            if($RowGris % 2 == 0){
                echo "<tr style='background-color:#ddeaf5;'>";
            }else{
                echo "<tr style='background-color:white;'>";
            }

            switch($operacion)
            {
                case 0:
                    $resultado = $num_aleatorio1 + $num_aleatorio2;
                    echo "<td style='border:black solid 1px;'>$num_aleatorio1"." + $num_aleatorio2</td>";
                    break;
                case 1:
                    $resultado = $num_aleatorio1 - $num_aleatorio2;
                    echo "<td style='border:black solid 1px;'>$num_aleatorio1"." - $num_aleatorio2</td>";
                    break;
                case 2:
                    $resultado = $num_aleatorio1 * $num_aleatorio2;
                    echo "<td style='border:black solid 1px;'>$num_aleatorio1"." * $num_aleatorio2</td>";
                    break;
                case 3:
                    $resultado = $num_aleatorio1 / $num_aleatorio2;
                    echo "<td style='border:black solid 1px;'>$num_aleatorio1"." / $num_aleatorio2</td>";
                    break;
                case 4:
                    $resultado = $num_aleatorio1 % $num_aleatorio2;
                    echo "<td style='border:black solid 1px;'>$num_aleatorio1"." % $num_aleatorio2</td>";
                    break;
                case 5:
                    $resultado = $num_aleatorio1 ** $num_aleatorio2;
                    echo "<td style='border:black solid 1px;'>$num_aleatorio1"." ^ $num_aleatorio2</td>";
                    break;
            }

            echo "<td style='border:black solid 1px; text-align:end;'>$resultado</td>";

            $RowGris++;
            $operacion++;
            echo "</tr>";
        }
    echo "</table>";
    ?>


    </body>
</html>