<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "exporttrx.xls"
header("Content-Disposition: attachment; filename=exporttrx.xls");
 
// Tambahkan table
include 'arsiptrx2.php';
?>