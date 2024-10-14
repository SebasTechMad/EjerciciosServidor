<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php generateStructureTable($bingo_structure);?>
    </body>
    <?php 
    
    $bingo_structure;
    
    function generateStructureTable (&$array)
    {
        for($contY = 0; $contY < 3; $contY++)
        {
            for($contX = 0; $contX < 9; $contX++)
            {
                $array[$contY][$contX] = 0;
            }
        }
        generateVoidBingo($array);
    }

    function generateNumsRandoms()
    {
        $nums_randoms = [];

        // for($i = 0; $i < 4; $i++)
        // {
        //     $nums_randoms[] = random_int(0,9);
        // }
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

    function generateVoidBingo(&$array)
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
                    $array[$contY][$contX] = 1;
                    $contNumsAleatorios++;
                    $contX = 0;
                }else{
                    $contX++;
                }
            }
        }
        print_r($array);
    }

    


    ?>
</html>