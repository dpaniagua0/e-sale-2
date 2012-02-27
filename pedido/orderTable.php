<?php
include("../config.php");
include('../lock.php');
$consultaOrder = "select p.id_pedido, p.fecha_pedido, s.nombre as proveedor,i.nombre, p.precio from pedido p
                      left join inventario i on i.id_producto = p.id_producto
                      left join proveedor s on s.id_proveedor = p.id_proveedor";
$resulOrder = mysql_query($consultaOrder);
?>
<table class="table table-striped table-bordered table-condensed">
  <?php
  if (count($resulOrder) >1) {
    echo "<thead>
  <tr>
  <th class='columna-checkbox'><input type='checkbox'/></th>
  <th class='columna-id hide'>#</th>
  <th>Producto</th>
  <th>Precio</th>
  <th>Fecha pedido</th>
  <th>Proveedor</th>
  </tr>
  </thead>";
  }
  ?>
  <tbody>
    <?php
    if (count($resulOrder) != 0) {
      echo "<div id='message-container' class='message-container alert alert-danger hidden' style='text-align: center'> 
                <p id='message' class='message'>No hay elementos en esta tabla.</p>
            </div>";
    } else {
      while ($fila = mysql_fetch_array($resultOrder)) {
        $id_pedido = $fila['id_pedido'];
        $producto = $fila['nombre'];
        $fechaPedido = $fila['fecha_pedido'];
        $proveedor = $fila['proveedor'];
        $precio = $fila['precio'];
        echo "          <tr class='alt'>
                          <td class='columna-checkbox'><input id='checkbox' type='checkbox'/></td>
                          <td class='columna-id hide'>$id_pedido</td>
                          <td>$producto/td>
                          <td>$precio</td>
                          <td>$fechaPedido</td>
                          <td>$proveedor</td>                  
                    </tr>";
      }
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