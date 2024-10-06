<?php
    function calcSuma($a, $b, &$c){
        $c= $a + $b;
    }
    
    function calcResta($a, $b, &$c){
        $c= $a - $b;
    }
    
    function calcMulti($a, $b, &$c){
        $c= $a * $b;
    }
    
    function calcDivision($a, $b, &$c){
        $c= $a / $b;
    }
    
    function calcResto($a, $b, &$c){
        $c= $a % $b;
    }
    
    function calcPotencia($a, $b, &$c){

        $c = $a;
        for($i = 1 ;$i < $b ; $i++)
        {
            $c = $c * $a;  
        }
    }
?>