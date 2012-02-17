<?php

include("../config.php");
include('../lock.php');
$nomrbe = $_POST['nombre'];
$id_categoria = $_POST['id_categoria'];
$precio_venta = $_POST['precio'];
$id_marca = $_POST['id_marca'];
$descripccion = $_POST['descripccion'];
$existencia = $_POST['exsitencia'];
$insertProduct = "INSERT INTO inventario(nombre,precio_venta,id_categoria,id_marca,descripccion,existencia) VALUES('$nomrbe','$precio_venta','$id_categoria','$id_marca','$descripccion','$existencia')";
$result = mysql_query($insertProduct);
echo mysql_error();
if ($result) {
 echo $_SESSION['ok'] ="<div id='message-container' class='message-container alert alert-success hidden' style='text-align: center'> 
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
          <p id='message' class='message'>El producto ha sido registrado con exito.</p> ";
  header("location:../inventario/create.php");
} else {
 echo $_SESSION['wrong'] = "<div id='message-container' class='message-container alert alert-error hidden' style='text-align: center'>    
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
    <p id='message-error' class='message-error'>El producto no se pudo registrar.'".  mysql_error()."'</p> 
     </div> ";
  header("location:../inventario/create.php");
}
?>
