<?php 
$periodicos;


function fillPeriodicos(&$array)
{
    // $array[] = ["el pais" => "https://elpais.com", 
    //             "el mundo" => "https://www.elmundo.es",
    //             "ABC" => "https://www.abc.es", 
    //             "La razon" => "https://www.larazon.es", 
    //             "20Minutos" => "https://www.larazon.es"];

    $array = ["el pais" => "https://elpais.com", 
                "el mundo" => "https://www.elmundo.es",
                "ABC" => "https://www.abc.es", 
                "La razon" => "https://www.larazon.es", 
                "20Minutos" => "https://www.larazon.es"];
}

function generateLinks(&$array)
{
    $enlace = "";

    foreach($array as $c => $v)
    {
            $enlace = $v;
            echo "<a>..</a>";
    }

    return $enlace;
}

fillPeriodicos($periodicos);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ejercicio 2</title>
    </head>
    <body>
        <?php generateLinks($periodicos); ?>
    </body>
</html>