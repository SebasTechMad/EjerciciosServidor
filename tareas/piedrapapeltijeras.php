<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ejercicio minijuego</title>
        <?php 
            // definimos las variables necesarias
            define ('PIEDRA1',  "&#x1F91C;");
            define ('PIEDRA2',  "&#x1F91B;");
            define ('TIJERAS',  "&#x1F596;");
            define ('PAPEL',    "&#x1F91A;" );

            $respuestaJugador1;
            $respuestaJugador2;
            $opciones = [ [PIEDRA1, PIEDRA2],TIJERAS,PAPEL ];

            // generamos los numeros aleatorios
            $num_aleatorio1 = random_int(0,2);
            $num_aleatorio2 = random_int(0,2);

            //Dependiendo de qué jugador tenga piedra, se le generará
            //un emoji de piedra u otro
            if($num_aleatorio1 == 0){
                $respuestaJugador1 = $opciones[0][0];
            }else{
                $respuestaJugador1 = $opciones[$num_aleatorio1];
            }

            if($num_aleatorio2 == 0){
                $respuestaJugador2 = $opciones[0][1];
            }else{
                $respuestaJugador2 = $opciones[$num_aleatorio2];
            }
            
            $resultado;

            // en caso de que no sea empate, hacemos un switch para
            // saber el resultado de quién ha ganado
            if($num_aleatorio1 == $num_aleatorio2){
                $resultado = "EMPATE";
            }else{
                switch($num_aleatorio1)
                {
                    case 0:
                        if($num_aleatorio2 == 1){
                            $resultado = "Jugador 1 ha ganado";
                        }else{
                            $resultado = "Jugador 2 ha ganado";
                        }
                    break;

                    case 1:
                        if($num_aleatorio2 == 0){
                            $resultado = "Jugador 2 ha ganado";
                        }else{
                            $resultado = "Jugador 1 ha ganado";
                        }
                    break;

                    case 2:
                        if($num_aleatorio2 == 0){
                            $resultado = "Jugador 1 ha ganado";
                        }else{
                            $resultado = "Jugador 2 ha ganado";
                        }
                    break;
                }
            }
        ?>
    </head>
    <body>
        <h1>¡Piedra, papel, tijera!</h1>
        <p>Actualice la página para mostrar otra partida</p>
        <span style="margin-right: 1rem;"><b>Jugador 1</b></span><span><b>Jugador 2</b></span><br>
        <?php echo "<span style='font-size:40px;'>".$respuestaJugador1."</span><span style='font-size:40px;'>".$respuestaJugador2."</span><br>"?>
        <?php echo "<p>$resultado</p>"?>
    </body>
</html>