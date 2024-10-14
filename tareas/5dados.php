<?php
    define("DADO1","&#9856");
    define("DADO2","&#9857");
    define("DADO3","&#9858");
    define("DADO4","&#9859");
    define("DADO5","&#9860");
    define("DADO6","&#9861");

    $dados[] = [1 => DADO1, 2 => DADO2, 3 => DADO3, 4 => DADO4, 5 => DADO5, 6 => DADO6];
    $jugador1;
    $resultJug1;

    $jugador2;
    $resultJug2;

    function fillDiceList(&$array, &$jugador)
    {
        $resultado ="";
        
        // generamos los valores de los dados, y todos esos valores lo vamos guardando
        // en otro array para calcularlos en la funcion "resultado"
        for($cont = 1;$cont < 6;$cont++)
        {
            $num_aleatorio = random_int(1,6);
            $valorStrDado = $array[0][$num_aleatorio];
            $resultado = "$resultado &nbsp;".$valorStrDado."&nbsp;";
            $jugador[] = $num_aleatorio;
        }
        sort($jugador);
        return $resultado;
    }

    function resultado(&$jugador, &$resultJugador)
    {
        $resultSuma = 0;

        // Recorremos la lista de valores, y no contamos el más alto y el más bajo
        for($cont = 0; $cont <sizeof($jugador);$cont++)
        {
            if(!($cont == 0 || $cont == (sizeof($jugador)-1) ) ){
                $resultSuma += $jugador[$cont];
            }
        }

        $resultJugador = $resultSuma;
        return $resultSuma;
    }

    function ganador($jug1, $jug2)
    {
        if($jug1 == $jug2){
            return "Han empatado";
        }else{
            return ($jug1 > $jug2)?"Jugador 1 ha ganado":"Jugador 2 ha ganado";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ejercicio dados</title>
        <style>
            .organizacion{
                display: flex;
                flex-direction: column;
                align-items: start;
            }

            .content-organizacion{
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .dados1{
                background-color: red;
                padding: 1.5rem 0.5rem;
            }

            .dados2{
                background-color: blue;
                padding: 1.5rem 0.5rem;
            }
            
            p{
                font-size: 2rem;
            }
        </style>
    </head>
    <body>
        <div class="organizacion">
            <div class="content-organizacion">
                <b>Jugador 1</b>&nbsp;
                <p class="dados1"><?php echo fillDiceList($dados,$jugador1); ?></p>&nbsp;
                <b><?php echo resultado($jugador1,$resultJug1);?></b>
            </div>

            <div class="content-organizacion">
                <b>Jugador 2</b>&nbsp;
                <p class="dados2"><?php echo fillDiceList($dados,$jugador2); ?></p>&nbsp;
                <b><?php echo resultado($jugador2,$resultJug2);?></b>
            </div>
            <div>
                <b>Resultado &nbsp;</b><span><?php echo ganador($resultJug1,$resultJug2);?></span>
            </div>
        </div>
    </body>
</html>

