<?php

include("../config.php");
include('../lock.php');
$id = $_SESSION['id_editar'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$rfc = $_POST['rfc'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
if (!empty($nombre) && !empty($email) && !empty($rfc) && !empty($direccion) && !empty($telefono)) {
  $updateSuplier = "UPDATE  proveedor set nombre='$nombre', direccion='$direccion',correo_electronico='$email',telefono='$telefono',rfc='$rfc' where id_proveedor = $id";
  $result = mysql_query($updateSuplier);
  $_SESSION['id_editar'] = null;
  echo mysql_error();
  if ($result) {
    echo $_SESSION['ok'] = "<div id='message-container' class='message-container alert alert-success hidden' style='text-align: center'> 
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
          <p id='message' class='message'>El proveedor ha sido editado con exito.</p>
          </div>";
    header("location:../proveedor/edit.php");
  } else {
    echo $_SESSION['wrong'] = "<div id='message-container' class='message-container alert alert-error hidden' style='text-align: center'>    
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
    <p id='message-error' class='message-error'>El proveedor no se pudo editar.id=" .$id. mysql_error() . "'</p> 
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
