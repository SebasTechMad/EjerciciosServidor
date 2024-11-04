<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?= str_word_count($_REQUEST['comentario']) ?></td></tr>
<tr><td>Letra + repetida:  </td><td><?= $letrasMasRepetidas ?></td></tr>
<tr><td>Palabra + repetida:</td><td><?= $palabrasMasRepetidas ?></td></tr>
</table>
</div>

