<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ejercicio 4</title>
        <style>
            td{
                border: black solid 1px;
            }

            table{
                border-collapse: collapse;
                font-size: 30px;
            }

            .style-title{
                background-color:black ;
                color: white;
            }
        </style>
    </head>
    <body>
        <?php   
            
            {require_once("./app/func_ej04.php");}  
            $num1 = -1;
            $num2 = 1000;
            $num3 = 0;

            numMaxMinAvg($num1,$num2,$num3);
        ?>

        <table>
            <tr>
                <td colspan="2" class="style-title">Generacion de 50 valores aleatorios</td>
            </tr>
            <tr>
                <td>Máximo</td>
                <td><?php echo $num1 ?></td>
            </tr>
            <tr>
                <td>Mínimo</td>
                <td><?php echo $num2?></td>
            </tr>
            <tr>
                <td>Media</td>
                <td><?php echo $num3?></td>
            </tr>
        </table>
    </body>
</html>