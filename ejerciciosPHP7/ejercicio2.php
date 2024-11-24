<?php
    $cadena = @file_get_contents("fichero.txt",false);
    $lineas = @file("fichero.txt",false);

    print_r($cadena);
    echo "<br>";
    print_r("hay un total de ".strlen($cadena)." caracteres");
    echo "<br>";
    print_r("Hay ".count($lineas)." lineas");
?>