<?php

function elMayor($a, $b, &$c){
    if($a == $b){
        $c = 0;
    }else{
        if($a > $b){
            $c = $a;
        }else{
            $c = $b;
        }
    }
}
?>