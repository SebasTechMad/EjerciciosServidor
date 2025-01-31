<hr>
<form method="POST" enctype="multipart/form-data">
    <div style="display:flex; justify-content:space-between; gap:2rem; width:100%;">
        <div style="display:flex; flex-direction:column; align-items:start; width:100%;">
            <label for="id">Id:</label>
            <input type="text" name="id" readonly value="<?= $cli->id ?>">

            <label for="first_name">Nombre:</label>
            <input type="text" id="first_name" name="first_name" value="<?= $cli->first_name; ?>">

            <label for="last_name">Apellido:</label>
            <input type="text" id="last_name" name="last_name" value="<?= $cli->last_name; ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= $cli->email; ?>">

            <label for="gender">Género:</label>
            <input type="text" id="gender" name="gender" value="<?= $cli->gender; ?>">

            <label for="ip_address">Dirección IP:</label>
            <input type="text" id="ip_address" name="ip_address" value="<?= $cli->ip_address; ?>">

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?= $cli->telefono; ?>">
        </div>
        <div style="width:100%; display:flex; flex-direction:column; justify-content:center; gap:2rem;">
            <img src='<?= $imgURL ?>' alt="">
            <input type="hidden" name="MAX_FILE_SIZE" value="512000">
            <input name="foto" id="archivo" type="file" accept="image/png,image/jpeg"/>
        </div>
    </div>

    <?php if( $cli->id != "" ): ?>
        <input type="submit" name="orden" value="Anterior">
        <input type="submit" name="orden" value="<?= $orden ?>">
        <input type="submit" name="orden" value="Volver">
        <input type="submit" name="orden" value="Siguiente">
        <input type="hidden" value="<?= $_SESSION['current_id'] = $cli->id ?>">
    <?php else:?>
        <input type="submit" name="orden" value="Volver">
        <input type="submit" name="orden" value="<?= $orden ?>">
    <?php endif;?>

    
</form>