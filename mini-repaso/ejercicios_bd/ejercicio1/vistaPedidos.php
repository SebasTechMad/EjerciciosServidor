<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Productos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
        <style>
            html{
                height: 100dvh;
            }
        </style>
    </head>
    <body class="container col-12 h-100 d-flex justify-content-center align-items-center">
        <main class="col-sm-12 col-md-5 d-flex flex-column align-items-center rounded-4 shadow-lg p-4">
            <div class="col-12 d-flex justify-content-start mb-3">
                <a href="./" class="btn btn-danger">X</a>
            </div>
            <h1 class="mb-5">Listado de productos</h1>
            <div class="col-12">
                <table class="table table-striped table-hover">
                    <tr class="table-dark">
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                    </tr>
                <?php foreach($pedidos as $pedido): ?> 
                    <tr>
                        <td><?= $pedido->producto; ?></td>
                        <td><?= $pedido->precio; ?> €</td>
                        <!-- Añadir más columnas según sea necesario -->
                    </tr>
                <?php endforeach; ?>
                </table>
            </div>
        </main>
    </body>
</html>