<!-- Modul Arsiptrs dan Pencarian -->
			<div align="left"><h3>Daftar Arsip Pembayaran Via Transfer</h3></div>
			<div class="col-md-8">
			<center>
			<input type="search" size="80" onKeyUp="javascript:cariArsip(this.value);" placeholder="Pencarian Arsip Bukti Pembayaran Transfer" >
			</center>
			<div class="col-md-14">
				<br>
			
			<div class="kotak box-arsip">
				<?php
				/*Load arsip di sini */
				require('lib/lib-function-trx.php');
				$fungsi = new Fungsitrx();
				$fungsi->fetchData('','tab');
				?>
				</div>
			
			</div>
			</div>
			<div >
				<ul>
					<li><a href="index.php" class="kembali btn btn-sm btn-primary">&laquo; Kembali</a></li>
				</ul>
			</div>
			<script type="text/javascript">
			function cariArsip(q){
				$('.box-arsip').text('Loading...');
				$('.box-arsip').load('searchtrx.php?q='+q);
			}
			</script>
			