<?php

function wordsRepeated($cadena)
{
   $cont = -1;
   $resultado = "";
   foreach(count_chars($cadena,1) as $letra => $repetidos){

      if($repetidos > $cont){
         $cont = $repetidos;
         
         //En caso de que sea espacio en blanco, lo indicaremos al user
         if($letra == 32){
            $resultado = "espacio en blanco";
         }else{
            $resultado = chr($letra);
         }
      }

   }

   return $resultado;
}

function palabrasRepetidas($cadena)
{
   $cadena = trim($cadena);
   $resultado = "";
   $contador = -1;

   $arrayCadena = explode(" ",$cadena);
   
   foreach(array_count_values($arrayCadena) as $c => $v)
   {
      if($v > $contador){
         $resultado = $c;
         $contador = $v;
      }
   }

   return $resultado;
}

//añadimos nueva funcion que comprueba que sea mayor que 8 caracteres
function regexUser($usuario): bool
{
   return strlen($usuario)>=8;
}

//Modificamos este archivo para que compruebe correctamente el usuario
function usuarioOk($usuario, $contraseña) :bool {

   $comprobacion = false;

   if(regexUser($usuario)){
      $comprobacion = ($contraseña == strrev($usuario));
   }
   
   return $comprobacion;
}
