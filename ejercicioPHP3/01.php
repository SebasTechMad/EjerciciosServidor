<?php 

$nums = [];

function fillArray(&$array)
{
    $cont = 0;
    while($cont < 20)
    {
        $array[] = random_int(1,10);
        $cont++;
    }

    sort($array);
}

function numModa($array)
{
    $maximo = 0;
    $minimo = 21;
    $moda = 0;
    $numRepetidos = 0;
    
    foreach ($array as $clave => $valor)
    {
        if($valor > $maximo){
            $maximo = $valor;
        }

        if($valor < $minimo){
            $minimo = $valor;
        }

        $numsRepeActual = array_count_values($array)[$valor];

        if($numsRepeActual > $numRepetidos){
            $numRepetidos = $numsRepeActual;
            $moda = $valor;
        }
    }

    return "<tr><th>Numero máximo</th><th>Número mínimo</th><th>moda</th></tr><tr><th>$maximo</th><th>$minimo</th><th>$moda</th></tr>";
}

function generateTable($array)
{
    $resultado="";

    foreach($array as $c => $v)
    {
        $cadena = "<td>$v</td>";
        $resultado = $resultado.$cadena;
    }

    return $resultado;
}



fillArray($nums);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ejercicio 1</title>
        <style>
            table{
                border-collapse: collapse;
            }
            td{
                border: black solid 1px;
                font-size: 2rem;
                padding: 0.8rem;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <?php echo generateTable($nums) ?>
            </tr>
                <?php echo numModa($nums)?>
        </table>
    </body>
</html>