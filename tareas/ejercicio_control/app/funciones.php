<?php
require_once ('dat/datos.php');
/**
 *  Devuelve true si el código del usuario y contraseña se 
 *  encuentra en la tabla de usuarios
 *  @param $login : Código de usuario
 *  @param $clave : Clave del usuario
 *  @return true o false
 */
function userOk($login,$clave):bool {
    global $usuarios;
    $comprobacion = false;

    foreach ($usuarios as $Nuser => $datos) {
        if ($Nuser == $login &&  $clave == $datos[1]){
            $comprobacion = true;
        }
    }


    return $comprobacion;
}

/**
 *  Devuelve el rol asociado al usuario
 *  @param $login: código de usuario
 *  @return ROL_ALUMNO o ROL_PROFESOR
 */
function getUserRol($login){
    global $usuarios;
    return $usuarios[$login][2];
}

/**
 *  Muestra las notas del alumno indicado.
 *  @param $codigo: Código del usuario
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotasAlumno($codigo):String{
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $contadorNotas = 0;

    $currentName = $usuarios[$codigo][0];

    $msg .= " Bienvenido/a alumno/a: ".$currentName;
    $msg .= "<br><hr><br>";
    $msg .= "<table>";
    $msg .= "<tr><th> Módulo </th><th> Nota </th></tr>";

    foreach($nombreModulos as $modulo) {
        $msg .= "<tr><td>".$modulo."</td><td>".$notas[$codigo][$contadorNotas]."</td></tr>";
        $contadorNotas++;
    }
    $msg .= "</table>";
    return $msg;
}

/**
 *  Muestra las notas de todos alumnos. 
 *  @param $codigo: Código del profesor
 *  @return $devuelve una cadena con una tabla html con los resultados 
 */
function verNotaTodas ($codigo): String {
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;

    $currentName = $usuarios[$codigo][0];

    $msg .= " Bienvenido Profesor: ".$currentName;
    $msg .= "<br><hr><br>";
    $msg .= "<table>";
    $numeroAlumnos = count($usuarios);
    //Esta variable auxiliar es para acordarme que estoy automatizando
    // tambien la parte de encabezado (el nombre, el nombre de los modulos, etc...)
    $rellenoEncabezado = 1;
    $indexCont = 0;

    $msg .= "<tr><th>Nombre</th>";
    /*Tenemos que excluir al profe y tener en cuenta que
    automatizaremos el nombre de cada columna*/
    foreach($usuarios as $Nuser => $datos) 
    {
        //ENCABEZADO
        if($indexCont == 0)
        {
            foreach ($nombreModulos as $modulo)
            {
                $msg .= "<th>".$modulo."</th>";
            }
            $msg .= "</tr>";
        }
        else
        {
            //En caso de que sea un alumno, aparecerá en la tabla
            if($datos[2] != ROL_PROFESOR)
            {
                $msg .= "<tr><td>".$datos[0]."</td>";
                foreach ($notas[$Nuser] as $nota) {
                    $msg .= "<td>".$nota."</td>";
                }
            }
            $msg .= "</tr>";
        }
        $indexCont++;
    }
    $msg .= "</table>";
    return $msg;
}