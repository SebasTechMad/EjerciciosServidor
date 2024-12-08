<?php
    include_once ("../modelo/BiciElectrica.php");
    $bicicletas = array();

    function cargabicis()
    {
        global $bicicletas;

        foreach (file("../modelo/Bicis.csv") as $key => $value)
        {
            $datos = explode(",",$value);
            $bicicleta = new Bicicleta($datos[0],$datos[1],$datos[2],$datos[3],$datos[4]);
            ($bicicleta->operativa == 1) ? array_push($bicicletas, $bicicleta): "no hace nada xd";
        }
    }

    function bicimascercana($xUser, $yUser, $tabla)
    {
        $distancia = 10000000;
        $resultado = null;
        foreach ($tabla as $bicicleta) 
        {
            print_r($bicicleta->distancia($xUser,$yUser));
            print_r("<br>");



            if($bicicleta->distancia($xUser, $yUser) < $distancia)
            {
                $distancia = $bicicleta->distancia($xUser, $yUser);
                $resultado = $bicicleta;
            } 
        }

        return $resultado;
    }

    function mostrartablabicis()
    {
        global $bicicletas;

        echo "<table><tr><th>id</th><th>Coordenadas X</th><th>Coordenadas Y</th><th>Bateria</th></tr>";
        foreach ($bicicletas as $bicicleta)
        {
            echo "<tr><td>$bicicleta->id</td><td>$bicicleta->coordx</td><td>$bicicleta->coordy</td><td>$bicicleta->bateria</td></tr>";
        }
        echo "</table>";
    }
?>