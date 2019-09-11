
<?php
include_once '../configuration.php';
require_once 'lib/lib-function.php';
require_once 'lib/lib-function-trx.php';
$fungsi = new Fungsi();;
if(!$fungsi->checkDB()){
?>
<html>
<head>
<title><?php print $config_site_title;  ?></title>
</head>
<div class="col-md-3">
				<h2>Setup Aplikasi</h2>
</div><div class="col-md-6">
<div class="alert alert-warning"></div>
<p>Ini adalah kali pertama aplikasi dijalankan, penyetingan database diperlukan agar aplikasi bisa berjalan. Silakan klik tombol "Setup" untuk memulainya.</p>
<a href="javascript:setupDB();" class="btn btn-success">Setup</a>
</div>
<div class="col-md-3"></div>
<?php
}
else{
?>
<div class="main-row">
<div class="col-md-3">
				<h2>Pilih Modul</h2>
			</div>
			<div class="col-md-6">
				<ul>
					<li><a href="javascript:cetak()" class="cetak btn tbl">Modul Cetak Bukti Pembayaran &raquo;</a></li>
					<li><a href="javascript:transfer()" class="transfer btn tbl">Modul Pembayaran Transfer &raquo;</a></li>
					<li><a href="javascript:arsip()" class="arsip btn tbl">Modul Arsip Pembayaran &raquo;</a></li>
					<li><a href="javascript:arsiptrx()" class="arsiptrx btn tbl">Modul Arsip Transfer &raquo;</a></li>
					<li><a href="javascript:admin()" class="admin btn tbl">Modul Pembuatan User &raquo;</a></li>
					<li><a href="javascript:backup()" class="backup btn tbl">Backup Database &raquo;</a></li>
				</ul>
			</div>
<div class="col-md-3"></div>
<div>
			
	<li><a href="../index.php" class="kembali btn btn-sm btn-primary">&laquo; Logout</a></li>		
</div>
</div>
<?php
}
?>
<script type="text/javascript">
function loading(){
		$('.main-row').text('Loading..');
	}
$('.alert').hide();
	function setupDB(){
		$('.alert').fadeIn(500);
		$('.alert').load('setinit.php');
	}
function cetak(){
		loading();
		$('.main-row').load('cetak-interface.php');
	}
	
function transfer(){
		loading();
		$('.main-row').load('cetak-interface-trx.php');
	}

function arsip(){
		loading();
		$('.main-row').load('arsip.php');
	}
	
function arsiptrx(){
		loading();
		$('.main-row').load('arsiptrx.php');
	}	
	
function admin(){
		loading();
		$('.main-row').load('admin.php');
	}
function backup(){
		loading();
		$('.main-row').load('backup.php');
	}
	

		
</script>
