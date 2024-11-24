<?php
    $contFichero;
    
    if(!isset($_COOKIE['contador'])){
        setcookie('contador',1,time()+60*60*24*30*4);
    }else{
        setcookie('contador',$_COOKIE['contador']+1,time()+60*60*24*4);
    }


    $contFichero = $_COOKIE['contador'];

    $fichero = @fopen("./contador.txt","w");

    @fwrite($fichero,$contFichero);

    @fclose($fichero);
?>