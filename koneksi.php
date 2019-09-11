<?php
$dbUser = "root";
$dbPass = "root";
$dbName = "kwitansi";
$dbHost = "localhost:3308";

mysql_connect($dbHost, $dbUser, $dbPass);
mysql_select_db($dbName);
?>