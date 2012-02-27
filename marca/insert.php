<?php

include("../config.php");
include('../lock.php');
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$rfc = $_POST['rfc'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
if (!empty($nombre) && !empty($email) && !empty($rfc) && !empty($direccion) && !empty($telefono)) {
  $insertSuplier = "INSERT INTO proveedor(nombre,direccion,correo_electronico,telefono,rfc) VALUES('$nombre','$direccion','$email','$telefono','$rfc')";
  $result = mysql_query($insertSuplier);
  echo mysql_error();
  if ($result) {
    echo $_SESSION['ok'] = "<div id='message-container' class='message-container alert alert-success hidden' style='text-align: center'> 
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
          <p id='message' class='message'>El proveedor ha sido registrado con exito.</p>
          </div>";
    header("location:../proveedor/create.php");
  } else {
    echo $_SESSION['wrong'] = "<div id='message-container' class='message-container alert alert-error hidden' style='text-align: center'>    
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
    <p id='message-error' class='message-error'>El proveedor no se pudo registrar.</p> 
     </div> ";
    header("location:../proveedor/create.php");
  }
} else {
  echo $_SESSION['wrong'] = "<div id='message-container' class='message-container alert alert-error hidden' style='text-align: center'>    
    <a data-dismiss='alert' href='#' class='close'>&times;</a>
    <p id='message-error' class='message-error'>Todos los campos son requeridos.</p> 
     </div> ";
  header("location:../proveedor/create.php");
}
?>
