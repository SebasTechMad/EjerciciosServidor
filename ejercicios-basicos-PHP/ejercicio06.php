<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body style="background-color: grey; display:flex; justify-content: center; align-items:flex-start;">
        <div style="background-color: white; width:40%; height: 45vw;">
            <div style="width:100%; height: 20%; background-color: #0400ff; display:flex; justify-content: center; align-items: center;">
                <span style="font-size: 30px; color:white;"><b>Tabla de multiplicar</b></span>
            </div>
            
            <div style="width: 100%; height: 100%;">
                <br>
                <?php
                    echo "<table style='border-collapse:collapse; margin-left:15px ;'>";
                    $num_aleatorio = random_int(1,10);
                    $cont_multiplicador = 0;

                    echo "<tr><td style='border:black solid 1px;'>Tabla del $num_aleatorio</td><td style='border:black solid 1px; width:20px;'></td></tr>";
                    for($cont_multiplicador;$cont_multiplicador < 11;$cont_multiplicador++)
                    {
                        $resultado = $num_aleatorio * $cont_multiplicador;
                        echo "<tr><td style='border:black solid 1px;'>$num_aleatorio X $cont_multiplicador =</td><td style='border:black solid 1px; text-align:end;'>$resultado</td>";
                    }
                    echo "</table>";
                ?>
            </div>
        </div>
    </body>
</html>