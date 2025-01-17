<!DOCTYPE html>
<?= header("Refresh: 3; url=./index.html") ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body onload="loadContador();">
        <?= $msg ?>, <span>Redirigiendo al login en 3</span>
    </body>
    <script>
        let msg = document.getElementsByTagName("span");
        let intervalo;
        let contador = 3;

        let loadContador = () =>{
            intervalo = setInterval(controladorCont, 1000);
        }

        let controladorCont = () =>{
            if(contador == 0){
                clearInterval(intervalo);
            }else{
                contador--;
                msg[0].textContent = `Redirigiendo al login en ${contador}`;
            }
        }
    </script>
</html>

