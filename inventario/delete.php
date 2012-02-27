<?php

include("../config.php");
include('../lock.php');


$id = $_POST['id_eliminar'];
$delete = "DELETE FROM inventario WHERE id_producto = $id";
mysql_query($delete);
include('../inventario/inventaryTable.php');
?>
