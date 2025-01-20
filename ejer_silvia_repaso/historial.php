<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historial</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="container d-flex flex-column align-items-center">
        <?php foreach($tuser as $user): ?>
            <h1 class="form-label">Bienvenido, <?= $user->nombre ?> al historial de pedidos</h1>
            <?php
                $_SESSION['id'] = $user->cod_cliente;
                $tpedidos = $ac->getPedidos($_SESSION['id'], $_SESSION['posini'], FRAG);
            ?>
        <?php endforeach; ?>
        <br><br>
        <?php if($tpedidos): ?>
            <?= $_SESSION['posini'] ?>
            <table class="table border">
                <tr class="table-dark">
                    <th>Número de pedido</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                </tr>
            <?php foreach($tpedidos as $pedido): ?>
                    <tr>
                        <td><?= $pedido->numped?></td>
                        <td><?= $pedido->producto?></td>
                        <td><?= $pedido->precio?></td>
                    </tr>
            <?php endforeach; ?>
            </table>
        <?php else: ?>
            <?= $_SESSION['posini'] ?>
            <h1>Vaya, parece que no hay pedidos realizados</h1>
        <?php endif; ?>
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="./?orden=primero">Primero</a></li>
            <li class="page-item"><a class="page-link" href="./?orden=anterior"> ← </a></li>
            <li class="page-item"><a class="page-link" href="./?orden=siguiente"> → </a></li>
            <li class="page-item"><a class="page-link" href="./?orden=ultimo">Último</a></li>
        </ul>

        <div class="d-flex justify-content-center gap-4">
            <form action="" method="get">
            <button class="btn btn-primary" name="orden" value="nuevo">Nuevo pedido</button>
            <button type="submit" class="btn btn-danger" name="orden" value="cerrar">Cerrar Sesión</button>
            </form>
        </div>
    </body>
</html>
</html>