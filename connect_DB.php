<?php
$connect = mysql_pconnect('localhost', 'root', '1234') or die(mysql_error());

$connect= mysql_select_db('qlbanhang') or die(mysql_error());

mysql_query("SET NAMES 'UTF8'");
?>  
