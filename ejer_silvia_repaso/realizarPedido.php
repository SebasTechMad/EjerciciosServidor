<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REALIZAR NUEVO PEDIDO</title>
</head>
<body>
    <h1>Realizar Nuevo Pedido</h1>
  <div class="pedido-container">
    <form action="realizarPedido.php" method="post">
      <label for="opciones"><b>Seleccione un producto:</b></label><br>
      <select id="opciones" name="opciones">
        <?php
        $productos = [
          "Zapatilla S23" => 30,
          "Camisa Sport" => 20,
          "Camisa Green" => 25,
          "Pantalón Sport" => 20,
          "Zapatilla Sport" => 10,
          "Forro Polar" => 60,
          "Gorro Color" => 10
        ];

        foreach ($productos as $nombre => $precio) {
          echo "<option value='$nombre|$precio'>$nombre - $$precio</option>";
        }
        ?>
      </select>
      <br>
      <input class="button" type="submit" name="accion" value="Confirmar Pedido">
    </form>
  </div>
</body>
</html>