<?php
    {require_once("./app/funcionesvar.php"); }

    $a = random_int(1,10);
    $b = random_int(1,10);

    echo "<h1>Número 1º => $a"."</h1><h1> Número 2 => $b </h1>";

    echo "<h2>suma => ".calcSuma($a, $b)."</h2>";
    echo "<h2>resta => ".calcResta($a, $b)."</h2>";
    echo "<h2>division => ".calcDivision($a, $b)."</h2>";
    echo "<h2>resto => ".calcResto($a, $b)."</h2>";
    echo "<h2>multiplicacion => ".calcMulti($a, $b)."</h2>";
    echo "<h2>potencia => ".calcPotencia($a, $b)."</h2>";
?>