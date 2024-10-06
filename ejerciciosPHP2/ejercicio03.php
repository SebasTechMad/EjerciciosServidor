<?php 
    { require_once("./app/funcionesref.php"); }

    $a = random_int(1,10);
    $b = random_int(1,10);
    $c = 0;
    
    echo "<h1>Valor inicial de C =>$c</h1>";
    echo "<h1>Número 1º => $a"."</h1><h1> Número 2 => $b </h1>";

    calcSuma($a,$b,$c);
    echo "<h2>suma => ".$c."</h2>";
    
    calcResta($a,$b,$c);
    echo "<h2>resta => ".$c."</h2>";
    
    calcDivision($a,$b,$c);
    echo "<h2>division => ".$c."</h2>";
    
    calcResto($a,$b,$c);
    echo "<h2>resto => ".$c."</h2>";
    
    calcMulti($a,$b,$c);
    echo "<h2>multiplicacion => ".$c."</h2>";
    
    calcPotencia($a,$b,$c);
    echo "<h2>potencia => ".$c."</h2>";
?>