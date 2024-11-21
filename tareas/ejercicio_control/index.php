<?php
session_start();


if(!isset($_SESSION['intentos'])){
  $_SESSION['intentos'] = 1;
}

if ($_SESSION['intentos']>=5) {
  include_once('app/maximo.php');
}else{
  include_once('app/funciones.php');

  if (  !empty( $_GET['login']) && !empty($_GET['clave'])){
      if ( userOk($_GET['login'],$_GET['clave'])){
        if ( getUserRol($_GET['login']) == ROL_PROFESOR){
          $contenido = verNotaTodas($_GET['login']);
        } else {
          $contenido = verNotasAlumno($_GET['login']);
        }
        $_SESSION['intentos'] = 0;
        include_once ('app/resultado.php');
      } 
      // userOK falso
      else {
            $_SESSION['intentos'] += 1;
            print_r($_SESSION['intentos']);
            $contenido = "El número de usuario y la contraseña no son válidos";
            include_once('app/acceso.php');
        }
      }else{
      $contenido = " Introduzca su número de usuario y su contraseña";
      include_once('app/acceso.php');
    }
}