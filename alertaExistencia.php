<?php

include("config.php");
include("lock.php");
$consultaProducto = "select nombre,existencia from inventario";
$resultProducto = mysql_query($consultaProducto);
$producto = mysql_fetch_array($resultProducto);
$arrayProductos = array();

while ($respuestaProducto = mysql_fetch_row($resultProducto)) {
  array_push($arrayProductos, $respuestaProducto[0]);

  if($respuestaProducto[1] < 14) {
    echo "<div id='message-container' class='order-message alert alert-warning' style='text-align: center'> 
             <a data-dismiss='alert' href='#' class='close'>&times;</a>
             <p id='message' class='message'> El producto " . implode(', ', $arrayProductos) . " se esta terminando.</p>
          </div>";
  }
}
?>
