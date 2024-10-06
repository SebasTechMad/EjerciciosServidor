<?php
    function calcSuma($a, $b){
        return $a + $b;
    }
    
    function calcResta($a, $b){
        return $a - $b;
    }
    
    function calcMulti($a, $b){
        return $a * $b;
    }
    
    function calcDivision($a, $b){
        return $a / $b;
    }
    
    function calcResto($a, $b){
        return $a % $b;
    }
    
    function calcPotencia($a, $b){
        
        $resultado = $a;

        for($i = 1 ;$i < $b ; $i++)
        {
            $resultado = $resultado * $a;  
        }

        return $resultado;
    }
?>