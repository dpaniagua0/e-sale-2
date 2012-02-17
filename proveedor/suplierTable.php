<?php
include("../config.php");
include('../lock.php');
?>
<table class="table table-striped table-bordered table-condensed">
  <thead>
    <tr>
      <th class="columna-checkbox"><input type="checkbox"/></th>
      <th class="columna-id hide">#</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Correo Electronico</th>
      <th>Telefono</th>
      <th>Rfc</th>
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
