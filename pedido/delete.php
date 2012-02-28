<?php

include("../config.php");
include('../lock.php');

$id = $_POST['id_eliminar'];
$delete = "DELETE FROM pedido WHERE id_pedido = $id";
mysql_query($delete);
include('../pedido/orderTable.php');
?>
