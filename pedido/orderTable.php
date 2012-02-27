<?php
include("../config.php");
include('../lock.php');
?>
<table class="table table-striped table-bordered table-condensed">
  <thead>
    <tr>
      <th class="columna-checkbox"><input type="checkbox"/></th>
      <th class="columna-id hide">#</th>
      <th>Producto</th>
      <th>Precio</th>
      <th>Fecha pedido</th>
      <th>Fecha llegada</th>
      <th>Proveedor</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $consultaSuplier = "select id_proveedor, nombre, direccion, correo_electronico,telefono, rfc from proveedor";
    $resultSuplier = mysql_query($consultaSuplier);

    while ($fila = mysql_fetch_array($resultSuplier)) {
      $id_proveedor = $fila['id_proveedor'];
      $nomrbe = $fila['nombre'];
      $direccion = $fila['direccion'];
      $email = $fila['correo_electronico'];
      $telefono = $fila['telefono'];
      $rfc = $fila['rfc'];
      echo "          <tr class='alt'>
                          <td class='columna-checkbox'><input id='checkbox' type='checkbox'/></td>
                          <td class='columna-id hide'>$id_proveedor</td>
                          <td>$nomrbe</td>
                          <td>$direccion</td>
                          <td>$email</td>
                          <td>$telefono</td>                  
                          <td>$rfc</td>
                    </tr>";
    }
    ?>
  </tbody>
</table>

<div id="myModal" class="modal hide fade">
  <div class="modal-body">
    Estas seguro, se perderan los datos de forma permanente.
  </div>
  <div class="modal-footer">
    <a id="ok" href="#" class="btn primary">OK</a>
    <a id="cancel" href="#" class="btn warning">Cancelar</a>
  </div>
</div>
<div id="error-seleccion" class="modal hide fade">
  <div class="modal-body">
    <p>Debe selecionar algo.</p>
  </div>
  <div class="modal-footer">
    <a id="error" href="#" class="btn primary">OK</a>
  </div>
</div>