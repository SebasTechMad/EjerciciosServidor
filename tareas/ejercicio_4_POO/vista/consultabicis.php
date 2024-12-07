<?php
    include_once ("../controlador/funciones.php");

    $tabla = cargabicis();

    (!empty($_GET['coordx']) && !empty($_GET['coordy'])) ? $biciRecomendada = bicimascercana($_GET['coordx'], $_GET['coordy'], $bicicletas):"";

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>MOSTRAR BICIS OPERATIVAS</title>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
        padding: 0.4rem;
    }
    </style>

    </head>

    <body>
        <h1> Listado de bicicletas operativas </h1>
        <?= mostrartablabicis($tabla); ?>
        <?php if (isset($biciRecomendada)) : ?>
        <h2> Bicicleta disponible más cercana es <?= $biciRecomendada ?> </h2>
        <button onclick="history.back()"> Volver </button>
        <?php else : ?>
        <h2> Indicar su ubicación: <h2>
        <form>
        Coordenada X: <input type="number" name="coordx"><br>
        Coordenada Y: <input type="number" name="coordy"><br>
        <input type="submit" value=" Consultar ">
        </form>
        <?php endif ?>
    </body>
</html>