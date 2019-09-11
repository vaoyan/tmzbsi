<!-- Modul Arsip dan Pencarian -->
			<div align="left"><h3>Daftar Arsip Pembayaran</h3></div>
			<div class="col-md-8">
			<center>
			<input type="search" size="80" onKeyUp="javascript:cariArsip(this.value);" placeholder="Pencarian Arsip Bukti Pembayaran" >
			</center>
			<div class="col-md-14">
				<br>
			
			<table width="1500" border="1" cellspacing="1" >
				<tr><th>No</th><th>No.Seri</th><th>Nama</th><th>Nim</th><th>Semester</th><th>Prodi</th><th>B.U.Tulis</th><th>B.U.Kesehatan</th><th>SPPTetap</th>
				<th>SPPPraktek</th><th>SPPTeori</th><th>B.P.Umum</th><th>B.O.Akademik</th><th>Seragam</th><th>B.lain</th><th>Total</th><th>Opr</th><th>Tanggal</th>
				</tr>
			</table>
			<div class="kotak box-arsip">
				<?php
				/*Load arsip di sini */
				require('lib/lib-function.php');
				$fungsi = new Fungsi();
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
				$('.box-arsip').load('search.php?q='+q);
			}
			</script>