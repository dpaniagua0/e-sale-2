<?php

$mysql_hostname = "127.0.0.1:3306";
$mysql_user = "gasolinera";
$mysql_password = "gasolinera";
$mysql_database = "esale";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
        or die("Opps some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Opps some thing went wrong");
?>