<?php

include("../config.php");
include('../lock.php');

$id = $_POST['id_eliminar'];
$delete = "DELETE FROM proveedor WHERE id_proveedor = $id";
mysql_query($delete);
include('../proveedor/suplierTable.php');
?>
