<?php

include("../config.php");
include('../lock.php');

$id = $_get['id'];
$delete = "DELETE FROM inventario WHERE id_producto = $id";
mysql_query($delete);
include('index.php');
?>
