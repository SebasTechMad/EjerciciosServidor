<?php 
    $usuarios = ["usuario1" => "password1", "usuario2" => "password2", "usuario3" => "password3"];

    function searchUser(&$array,$usuario,$password)
    {
        $encontrado = false;
        foreach($array as $usr => $pwd)
        {
            ($usr == $usuario) ? $encontrado = validatePassword($pwd, $password):"";
        }
        return $encontrado;
    }

    function validatePassword($pwd, $pwdUser)
    {
        return $pwd == $pwdUser;
    }

    if( searchUser($usuarios, $_REQUEST["usuario"], $_REQUEST["password"]) ){
        echo "bienvenido $_REQUEST[usuario]";
    }else{
        echo "algo ha ido mal";
    }

    

?>