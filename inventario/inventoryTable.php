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
      <th>Descripccion</th>
      <th>Categoria</th>
      <th>Marca</th>
      <th>Precio</th>
      <th>Unidades</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $consultaInventory = "select i.id_producto, i.nombre, i.precio_venta, m.marca,c.categoria, i.descripccion, i.existencia from inventario i
                left join categoria c on c.id_categoria = i.id_categoria
                left join marca m on m.id_marca = i.id_marca";
    $resultInventory = mysql_query($consultaInventory);

    while ($fila = mysql_fetch_array($resultInventory)) {
      $id_producto = $fila['id_producto'];
      $producto = $fila['nombre'];
      $precio = $fila['precio_venta'];
      $marca = $fila['marca'];
      $categoria = $fila['categoria'];
      $descripccion = $fila['descripccion'];
      $existencia = $fila['existencia'];
      echo "          <tr class='alt'>
                          <td class='columna-checkbox'><input id='checkbox' type='checkbox'/></td>
                          <td class='columna-id hide'>$id_producto</td>
                          <td>$producto</td>
                          <td>$descripccion</td>
                          <td>$categoria</td>
                          <td>$marca</td>                  
                          <td>$precio</td>
                          <td>$existencia</td>
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