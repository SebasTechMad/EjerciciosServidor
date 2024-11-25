<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        switch ($_POST["1"]) {
            case '1':
                header('location: redireccion.html');
                break;
             case '2':
                echo "redirigiendo a google";
                header('refresh: 5; url=https://www.google.com/?hl=es');
                break;
            
            case '3':
                header('X-Powered-By: mereke-merengue');
                break;
            case '4':
                header('Content-type: application/pdf' );
                //FILENAME CAMBIA EL NOMBRE DEL FICHERO
                header('Content-Disposition: attachment; filename="poroto.pdf"');
                //PARA PONER EL NOMBRE DEL PDF
                readfile('starbucks.pdf');
                break;
            default:
                # code...
                break;
        }


    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="post">
            <button name="1" value="1">Location</button>
            <button name="1" value="2">Redirigir</button>
            <button name="1" value="3">Powered by</button>
            <button name="1" value="4">Descarga archivo</button>
        </form>
    </body>
</html>