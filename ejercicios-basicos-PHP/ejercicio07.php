<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $num_aleatorio1 = random_int(100,500);
        $num_aleatorio2 = random_int(100,500);
        $num_aleatorio3 = random_int(100,500);


        $porcentaje_aleatorio_R = ($num_aleatorio1 * 100)/500;
        $porcentaje_aleatorio_G = ($num_aleatorio2 * 100)/500;
        $porcentaje_aleatorio_B = ($num_aleatorio3 * 100)/500;

        echo "<div style='width:$porcentaje_aleatorio_R%; height: 10vh; background-color: red;'>Rojo($num_aleatorio1)</div>";
        echo "<div style='width:$porcentaje_aleatorio_G%; height: 10vh; background-color: green;'>Verde($num_aleatorio2)</div>";
        echo "<div style='width:$porcentaje_aleatorio_B%; height: 10vh; background-color: blue;'>Azul($num_aleatorio3)</div>";  
    ?>

</body>
</html>