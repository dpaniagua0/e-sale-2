<?php

include("../config.php");
include('../lock.php');
$id = $_SESSION['id_editar'];
$id_producto = $_POST['producto'];
$id_proveedor = $_POST['id_proveedor'];
$precio = $_POST['precio'];
$unidades = $_POST['unidades'];
if (!empty($id_producto) && !empty($id_proveedor) && !empty($precio) && !empty($unidades)) {
  $updateOrder = "UPDATE  pedido set id_proveedor='$id_proveedor', id_producto='$id_producto',precio='$precio',unidades='$unidades' where id_pedido = $id";
  $result = mysql_query($updateOrder);
  $_SESSION['id_editar'] = null;
  echo mysql_error();
  if ($result) {
    echo $_SESSION['ok'] = "<div id='message-container' class='message-container alert alert-success hidden' style='text-align: center'> 
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
          <p id='message' class='message'>El pedido ha sido editado con exito.</p>
          </div>";
    header("location:../proveedor/edit.php");
  } else {
    echo $_SESSION['wrong'] = "<div id='message-container' class='message-container alert alert-error hidden' style='text-align: center'>    
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
    <p id='message-error' class='message-error'>El pedido no se pudo editar.</p> 
     </div> ";
    header("location:../proveedor/edit.php");
  }
} else {
  echo $_SESSION['wrong'] = "<div id='message-container' class='message-container alert alert-error hidden' style='text-align: center'>    
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
    <p id='message-error' class='message-error'>Todos los campos son requeridos.</p> 
     </div> ";
  header("location:../proveedor/edit.php");
}
?>
