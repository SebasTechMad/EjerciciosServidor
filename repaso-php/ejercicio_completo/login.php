<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <style>
            html, body{
                margin: 0px;
                height: 100dvh;
            }
        </style>
    </head>
    <body class="container-fluid d-flex justify-content-center align-items-center">
        <form class="form was-validated d-flex flex-column align-items-center col-sm-12 col-md-4 pt-3 pb-3 gap-5 border rounded-5 shadow-lg" action="index.php" method="get">
            
            <div class="d-flex flex-column gap-1">
                <label class="form-label">usuario</label>
                <input class="form-control" type="text" name="usuario" required>
            </div>

            <div class="d-flex flex-column gap-1">
                <label class="form-label">contraseña</label>
                <input class="form-control" type="text" name="clave" required>
            </div>

            <button class="btn btn-primary">Buscar</button>
        </form>
    </body>
</html>