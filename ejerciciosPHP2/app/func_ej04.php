<?php 
    define("limit_generar_nums",50);
    define("limit_value_number",100);

    function numMaxMinAvg(&$resultadoMax ,&$resultadoMin, &$resultadoAvg)
    {
        for($i=0;$i < limit_value_number ;$i++)
        {
            $num_aleatorio = random_int(limit_generar_nums,100);

            if($num_aleatorio > $resultadoMax){
                $resultadoMax = $num_aleatorio;
            }

            if($num_aleatorio < $resultadoMin){
                $resultadoMin = $num_aleatorio;
            }

            $resultadoAvg += $num_aleatorio;
        }

        $resultadoAvg = $resultadoAvg / limit_generar_nums;
    }
?>