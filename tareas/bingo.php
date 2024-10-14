<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php generateBingo($bingo_structure);?>
    </body>
    <?php 
    
    $bingo_structure;
    
    function generateBingo (&$array)
    {
        for($contY = 0; $contY < 3; $contY++)
        {
            for($contX = 0; $contX < 9; $contX++)
            {
                $array[$contY][$contX] = 0;
            }
        }
        generateVoidsBingo($array);
        fillStructureBingo($array);
    }

    function generateNumsRandoms()
    {
        $nums_randoms = [];

        $contador = 0;
        while($contador < 4)
        {
            $num_rand = random_int(0,8);
            if($contador == 0){
                $nums_randoms[] = $num_rand;
                $contador++;
            }else{    
                if(!in_array($num_rand, $nums_randoms)){
                    $nums_randoms[] = $num_rand;
                    $contador++;
                }
            }
        }
        return $nums_randoms;
    }

    function generateVoidsBingo(&$array)
    {
        for($contY = 0; $contY < 3; $contY++)
        {
            $contNumsAleatorios = 0;
            $nums_aleatorios = generateNumsRandoms();
            sort($nums_aleatorios);
            $contX = 0;
            
            while($contNumsAleatorios < 4)
            {
                if($contX == $nums_aleatorios[$contNumsAleatorios])
                {
                    $array[$contY][$contX] = 404;
                    $contNumsAleatorios++;
                    $contX = 0;
                }else{
                    $contX++;
                }
            }
        }
    }

    function fillStructureBingo(&$array)
    {
        $min = 1;
        $max = 9;
        for($contX = 0; $contX < 9; $contX++)
        {
            if($contX == 0){
                $min += 9;
                $max += 10;
            }else{
                if($contX == 8){
                    $min +=10;
                    $max += 11;
                }else{
                    $min += 10;
                    $max += 10;
                }
            }
            
            for($contY = 0; $contY < 3; $contY++)
            {

                if(!$array[$contY][$contX] == 404){
                    $array[$contY][$contX] = random_int($min,$max);
                }
            }
        }
    }

    function validateCardBingo(&$array)
    {
        // Necesitamos cumplir con los siguientes requisitos:
        // Existen tres columnas con 1 valor y resto solo tiene 2

        //Dos columnas consecutivas no pueden tener los valores o huecos en las misma posiciones. 
        // Por ejemplo:  si la primera columna tiene valores en la fila 1 y 3 la siguiente columna 
        // no puede tener valores en la fila 1 y 3.

    }

    ?>
</html>