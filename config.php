<?php
$host = "localhost:3308";
$user = "root";
$password = "root";
$database = "kwitansi";

if(!$mysql_link = mysql_connect($host, $user, $password))
{
	echo mysql_error();
	exit;
}

	
if(!mysql_select_db($database, $mysql_link))
{
	echo mysql_error();
	exit;
}

?>
