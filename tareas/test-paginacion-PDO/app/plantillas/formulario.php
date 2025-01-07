<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mereke</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            html{
                margin: 0px;
                height: 100vh;
                width: 100%;
            }
            body{
                height: 100%;
            }
        </style>
    </head>
    <body class="d-flex align-items-center">
        <main class="container d-flex flex-column align-items-center shadow-lg rounded-5 col-4 pt-4">
            
            <form action="#" method="post" class="row col-10 gap-3 p-4">

                <div class="col-12 d-flex flex-row">
                    <div class="col-2 d-flex justify-content-center align-items-center">
                        <!-- <a href="../" class="btn btn-danger">X</a> -->
                    </div>
                    <div class="col-10">
                        <h2 class="d-flex justify-content-start">Formulario de Registro</h2>
                    </div>
                </div>
                
                <div class="row">
                    <label for="primerNombre" class="form-label">Primer Nombre:</label>
                    <input type="text" class="form-control" id="primerNombre" name="primerNombre" placeholder="Ingresa tu primer nombre" required>
                </div>

                <div class="row">
                    <label for="segundoNombre" class="form-label">Segundo Nombre:</label>
                    <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" placeholder="Ingresa tu segundo nombre">
                </div>

                <div class="row">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
                </div>

                <div class="row">
                    <label for="genero" class="form-label">Género:</label>
                    <select id="genero" class="form-control" name="genero" required>
                        <option value="" disabled selected>Selecciona tu género</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>

                <div class="row">
                    <label for="telefono" class="form-label">Número de Teléfono:</label>
                    <input type="tel" id="telefono" class="form-control" name="telefono" placeholder="Ingresa tu número de teléfono" required>
                </div>

                <!-- Botón de Enviar -->
                <div class="col-12 d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-success mt-4" <?= $btnActualizar ? 'disabled':''; ?> >Actualizar</button>
                    <button type="submit" class="btn btn-primary mt-4" <?= $btnGuardar ? 'disabled':''; ?> >Guardar</button>
                </div>

            </form>
        </main>    
    </body>
</html>