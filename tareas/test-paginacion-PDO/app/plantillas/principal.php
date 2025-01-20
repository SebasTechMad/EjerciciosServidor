<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Clientes Paginado</title>
<link href="web/default.css" rel="stylesheet" type="text/css"/>
<script src="app/js/index.js"></script>
</head>
<body>
<div id="container">
    <div id="header">
        <h1>Listado de Clientes</h1>
    </div>
    <div id="content">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>IP Address</th>
                    <th>Teléfono</th>
                    <th colspan="3"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tclientes as $cli): ?>
             <tr>
                <td><?= $cli->id ?> </td>
                <td><?= $cli->first_name ?> </td>
                <td><?= $cli->email ?> </td>
                <td><?= $cli->gender ?> </td>
                <td><?= $cli->ip_address ?> </td>
                <td><?= $cli->telefono ?> </td>
                <td><a href=<?="./?orden=Borrar&id=".$cli->id?> style="text-decoration: none; color: blue;">borrado</a></td>
                <td><a href=<?="./?orden=Modificar&id=".$cli->id?> style="text-decoration: none; color: blue;">Modificar</a></td>
                <td><a href=<?="./?orden=Detalles&id=".$cli->id?> style="text-decoration: none; color: blue;">Detalles</a></td>
             </tr>
            <?php endforeach; ?>    
            </tbody>
        </table>
        <form>
            <button name="orden" value="Primero">&#8606; Primero</button>
            <button name="orden" value="Anterior">&#8592; Anterior</button>
            <button name="orden" value="Siguiente">&#8594; Siguiente</button>
            <button name="orden" value="Ultimo">&#8608; Último</button>
            &nbsp;&nbsp;<button name="orden" value="Nuevo">Nuevo cliente</button>
        </form>
    </div>
</div>
</body>
</html>
