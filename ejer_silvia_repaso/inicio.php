<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de sesion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            html, main{
                height: 100dvh;
                margin:0px;
            }
        </style>
    </head>
    <body>
        <main class="container d-flex justify-content-center flex-column align-items-center gap-4">
            <form action="index.php" method="get" class="form d-flex flex-column gap-2 shadow-lg p-5 rounded-4">
                <label for="" class="form-label">Usuario</label>
                <input type="text" name="nombre" class="form-control">
                <label for="" class="form-label">Clave</label>
                <input type="text" name="clave" class="form-control">
                <br>
                <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </form>
        </main>
    </body>
</html>