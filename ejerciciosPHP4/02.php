<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mini calculadora</title>
        <?php

            $valor1 = "";
            $valor2 = "";

            if(!empty($_REQUEST["primer_numero"]) && !empty($_REQUEST["segundo_numero"])){
                $valor1 = $_REQUEST["primer_numero"];
                $valor2 = $_REQUEST["segundo_numero"];
            }
            // function getValorAnterior(&$valor1, &$valor2){

                
            // }

            // getValorAnterior($valor1, $valor2);


            function comprobarValores($valor1, $valor2){
                return is_numeric($valor1) && is_numeric($valor2);
            }


            function calcValores()
            {
                if(comprobarValores($_REQUEST["primer_numero"], $_REQUEST["segundo_numero"]))
                {
                    $valor1 = $_REQUEST["primer_numero"];
                    $valor2 = $_REQUEST["segundo_numero"];
                    $operacion = $_REQUEST["btncalculo"];
                    $resultado = 0;
                    switch($operacion)
                    {
                        case "+":{
                            $resultado = $valor1 + $valor2;
                            break;
                        }

                        case "-":{
                            $resultado = $valor1 - $valor2;
                            break;
                        }

                        case "*":{
                            $resultado = $valor1 * $valor2;
                            break;
                        }

                        case "/":{
                            try {
                                $resultado = $valor1 / $valor2;
                            } catch (\Throwable $th) {
                                echo "Error al intentar dividir entre 0 ¿que esperabas? <br>";
                                $resultado = "NaN";
                            }
                            break;
                        }

                        case "reset":{
                            $valor1 = 0;
                            $valor2 = 0;
                            $resultado = "";

                            $_REQUEST["primer_numero"] = "";
                        }
                    }
                    echo $resultado;
                }
            }
            
            //getValorAnterior($valor1, $valor2);
        ?>
    </head>
    <body>
        <article class="main-article">
            <form action="02.php" method="post">
                <label for="">Nº1</label><br>
                <input type="number" name="primer_numero" value="<?php $valor1 ?>" ><br>
                <label for="">Nº2</label><br>
                <input type="number" name="segundo_numero" value="<?php $valor2 ?>" ><br>
                <div>
                    <fieldset>
                        <input type="submit" value="+" name="btncalculo">
                        <input type="submit" value="-" name="btncalculo">
                        <input type="submit" value="*" name="btncalculo">
                        <input type="submit" value="/" name="btncalculo">
                        <input type="submit" value="reset" name="btncalculo">
                    </fieldset>
                </div><br><br>
                <div>
                    <fieldset>
                        <input type="radio" name="tipo-resultado" id="chkDecimal">
                        <label for="chkDecimal">Decimal</label>
                        <input type="radio" name="tipo-resultado" id="chkBinario">
                        <label for="chkBinario">Binario</label>
                        <input type="radio" name="tipo-resultado" id="chkHexadecimal">
                        <label for="chkHexadecimal">Hexadecimal</label>
                    </fieldset>
                </div>
                <button>Borrar con reset</button><br><br>
                <?php calcValores(); ?>
                <!-- TODO RESULTADO RESPUESTA? -->
            </form>
        </article>
    </body>
</html>