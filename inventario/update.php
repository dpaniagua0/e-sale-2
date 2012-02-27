<?php

include("../config.php");
include('../lock.php');
$id = $_SESSION['id_editar'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$id_categoria = $_POST['id_categoria'];
$id_marca = $_POST['id_marca'];
$unidades = $_POST['existencia'];
$descripccion = $_POST['descripccion'];
if (!empty($nombre) && !empty($precio) && !empty($id_categoria) && !empty($id_marca) && !empty($unidades) && !empty ($descripccion)) {
  $updateProduct = "UPDATE  inventario set nombre='$nombre', precio_venta='$precio',existencia='$unidades',descripccion='$descripccion',id_marca='$id_marca', id_categoria='$id_categoria' where id_producto = $id";
  $result = mysql_query($updateProduct);
  $_SESSION['id_editar'] = null;
  echo mysql_error();
  if ($result) {
    echo $_SESSION['ok'] = "<div id='message-container' class='message-container alert alert-success hidden' style='text-align: center'> 
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
          <p id='message' class='message'>El producto ha sido editado con exito.</p>
          </div>";
    header("location:../inventario/edit.php");
  } else {
    echo $_SESSION['wrong'] = "<div id='message-container' class='message-container alert alert-error hidden' style='text-align: center'>    
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
    <p id='message-error' class='message-error'>El producto no se pudo editar.id=" . $id . mysql_error() . "'</p> 
     </div> ";
    header("location:../inventario/edit.php");
  }
} else {
  echo $_SESSION['wrong'] = "<div id='message-container' class='message-container alert alert-error hidden' style='text-align: center'>    
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
    <p id='message-error' class='message-error'>Todos los campos son requeridos.".$unidades."</p> 
     </div> ";
  header("location:../inventario/edit.php");
}
?>
