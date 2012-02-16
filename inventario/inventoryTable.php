<?php
include("../config.php");
include('../lock.php');
?>
<table class="table table-striped table-bordered table-condensed">
  <thead>
    <tr>
      <th>#</th>
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
      echo "          <tr>
                          <td class='id-combi'>$id_producto</td>
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
