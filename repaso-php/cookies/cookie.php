<?php 

    $nvisitas = 0;

    if(isset($_COOKIE["visitas"])){
        $nvisitas = $_COOKIE["visitas"];
    }

    $nvisitas++;

    setcookie("visitas",$nvisitas, time() + 30*24*3600);


?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php echo "Número de visitas ".$nvisitas; ?>
    </body>
</html>