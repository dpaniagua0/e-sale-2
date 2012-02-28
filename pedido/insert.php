<?php

include("../config.php");
include('../lock.php');
$id_producto = $_POST['producto'];
$id_proveedor = $_POST['id_proveedor'];
$precio = $_POST['precio'];
$unidades = $_POST['unidades'];
if (!empty($id_producto) && !empty($id_proveedor) && !empty($precio) && !empty($unidades)) {
  $insertOrder = "INSERT INTO pedido(id_producto,id_proveedor,precio,unidades) VALUES('$id_producto','$id_proveedor','$precio','$unidades')";
  $result = mysql_query($insertOrder);
  echo mysql_error();
  if ($result) {
    echo $_SESSION['ok'] = "<div id='message-container' class='message-container alert alert-success hidden' style='text-align: center'> 
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
          <p id='message' class='message'>El pedido ha sido registrado con exito.</p>
          </div>";
    header("location:../pedido/create.php");
  } else {
    echo $_SESSION['wrong'] = "<div id='message-container' class='message-container alert alert-error hidden' style='text-align: center'>    
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
    <p id='message-error' class='message-error'>El pedido no se pudo registrar.</p> 
     </div> ";
    header("location:../pedido/create.php");
  }
} else {
  echo $_SESSION['wrong'] = "<div id='message-container' class='message-container alert alert-error hidden' style='text-align: center'>    
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
    <p id='message-error' class='message-error'>Todos los campos son requeridos.</p> 
     </div> ";
  header("location:../pedido/create.php");
}
?>
