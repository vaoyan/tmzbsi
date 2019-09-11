<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta name="author" content="OyanCH" />
    <meta name="keywords" content="javascript, html, operator javascript, syntax javascript, syntax html"/>
    <meta name="description" content="Form Bukti Pembayaran"/>

    <script type="text/javascript">
    function updatesum()
    {
        document.form.total.value = (document.form.bujitul.value -0) + (document.form.bujikes.value -0) + (document.form.spptetap.value -0) + (document.form.spppraktek.value -0) + (document.form.sppteori.value -0)
        + (document.form.bpu.value -0) + (document.form.boa.value -0) + (document.form.seragam.value -0) + (document.form.pps.value -0) + (document.form.blain.value -0) + (document.form.blain3a.value -0)
        + (document.form.blain4a.value -0) + (document.form.blain5a.value -0);
    }
    
    
    </script>    
    
</head>			
<div class="col-md-3">
</div>

<div class="col-md-7">
<?php
require 'lib/lib-function-trx.php';
$fungsitrx = new Fungsitrx();?>
<h3>Form Input Pembayaran Mahasiswa Via Transfer</h3>
<form name="form" method="POST" action="cetak-ootrx.php" target="_blank">
<table cellspacing="3" cellpadding="50" >
<tr><td width="220">No.SERI TRANSFER:</td><td><?php
echo "<b>".$fungsitrx->KwNums()."</b>";
?></td></tr>
<tr><td width="220">Nama :</td><td><input type="text" name="payee" placeholder="Nama Siswa" size="47"></td></tr>
<tr><td>NIM :</td><td><input type="text" name="nim" placeholder="NIM" size="47"></td></tr>
<tr><td>Semester :</td><td>
<select name="semester" width="50">
	<option value="-------">Semester</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
</select></td></tr>
<tr><td>Prodi :</td><td>
<select name="prodi" width="50">
	<option value="-------">Prodi</option>
	<option value="D 3 - F A">D3-FA</option>
	<option value="D 3 - R M">D3-RM</option>
	<option value="D 1 - T D">D1-TD</option>
	<option value="D 3 - T D">D3-TD</option>
</select></td></tr>
<tr><td>
<select name="bujitul2" width="60">
	<option value="-------">Jenis Bayar</option>
	<option value="B i a y a  U j i  T u l i s">Biaya Uji Tulis</option>
	<option value="P M D P">PMDP</option>
</select>:</td><td><input type="text" name="bujitul" id="bujitul" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td>Biaya Uji Kesehatan :</td><td><input type="text" name="bujikes" id="bujikes" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>

<tr><td>
<select name="spptetapa" width="50">
	<option value="-------">Pilih SPP Tetap Smt ? </option>
	<option value="S P P  T e t a p  S m t 1">SPP Tetap Smt1</option>
	<option value="S P P  T e t a p  S m t 2">SPP Tetap Smt2</option>
	<option value="S P P  T e t a p  S m t 3">SPP Tetap Smt3</option>
	<option value="S P P  T e t a p  S m t 4">SPP Tetap Smt4</option>
	<option value="S P P  T e t a p  S m t 5">SPP Tetap Smt5</option>
	<option value="S P P  T e t a p  S m t 6">SPP Tetap Smt6</option>
        <option value="S P P  T e t a p  S m t 7">SPP Tetap Smt7</option>
        <option value="S P P  T e t a p  S m t 8">SPP Tetap Smt8</option>
        <option value="S P P  T e t a p  S m t 9">SPP Tetap Smt9</option>
        <option value="S P P  T e t a p  S m t 10">SPP Tetap Smt10</option>
</select>:</td>
<td><input type="text" name="spptetap" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td>
<select name="sppprakteka" width="50">
	<option value="-------">Pilih SPP Praktek Smt ? </option>
	<option value="S P P  P r a k t e k  S m t 1">SPP Praktek Smt1</option>
	<option value="S P P  P r a k t e k  S m t 2">SPP Praktek Smt2</option>
	<option value="S P P  P r a k t e k  S m t 3">SPP Praktek Smt3</option>
	<option value="S P P  P r a k t e k  S m t 4">SPP Praktek Smt4</option>
	<option value="S P P  P r a k t e k  S m t 5">SPP Praktek Smt5</option>
	<option value="S P P  P r a k t e k  S m t 6">SPP Praktek Smt6</option>
        <option value="S P P  P r a k t e k  S m t 7">SPP Praktek Smt7</option>
        <option value="S P P  P r a k t e k  S m t 8">SPP Praktek Smt8</option>
        <option value="S P P  P r a k t e k  S m t 9">SPP Praktek Smt9</option>
        <option value="S P P  P r a k t e k  S m t 10">SPP Praktek Smt10</option>
</select>:</td>
<td><input type="text" name="spppraktek" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td>
<select name="sppteoria" width="50">
	<option value="-------">Pilih SPP Teori Smt ? </option>
	<option value="S P P  T e o r i  S m t 1">SPP Teori Smt1</option>
	<option value="S P P  T e o r i  S m t 2">SPP Teori Smt2</option>
	<option value="S P P  T e o r i  S m t 3">SPP Teori Smt3</option>
	<option value="S P P  T e o r i  S m t 4">SPP Teori Smt4</option>
	<option value="S P P  T e o r i  S m t 5">SPP Teori Smt5</option>
	<option value="S P P  T e o r i  S m t 6">SPP Teori Smt6</option>
        <option value="S P P  T e o r i  S m t 7">SPP Teori Smt7</option>
        <option value="S P P  T e o r i  S m t 8">SPP Teori Smt8</option>
        <option value="S P P  T e o r i  S m t 9">SPP Teori Smt9</option>
        <option value="S P P  T e o r i  S m t 10">SPP Teori Smt10</option>
</select>:</td>
<td><input type="text" name="sppteori" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td>Biaya Pengembangan Umum :</td><td><input type="text" name="bpu" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td>Biaya Oprasional Akademik :</td><td><input type="text" name="boa" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td>Seragam :</td><td><input type="text" name="seragam" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td>PPS :</td><td><input type="text" name="pps" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td><input type="text" name="blain2" placeholder="Isi Jenis Bayar" value="-------" size="20"> :</td><td><input type="text" name="blain" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td><input type="text" name="blain3" placeholder="Isi Jenis Bayar" value="-------" size="20"> :</td><td><input type="text" name="blain3a" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td><input type="text" name="blain4" placeholder="Isi Jenis Bayar" value="-------" size="20"> :</td><td><input type="text" name="blain4a" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td><input type="text" name="blain5" placeholder="Isi Jenis Bayar" value="-------" size="20"> :</td><td><input type="text" name="blain5a" onChange="updatesum()" placeholder="Nominal Uang (Rp)" size="30"></td></tr>
<tr><td>Jumlah Yang disetor :</td><td><input type="text" name="total" id="total" size="30"  readonly /></td></tr>
<tr><td>Admin :</td><td><input type="text" name="pic"  size="30"></td></tr>
<tr><td align="center"><input type="submit" class="btn btn-success btn-md" value="Cetak dan Simpan &raquo;"></td><td align="center"><input type="reset" class="btn btn-success btn-md" value="&laquo; Reset"></td></tr>
</table>
</form>
</div>
<div class="col-md-2">
	<ul>
		<li><a href="index.php" class="kembali btn btn-sm btn-primary">&laquo; Kembali</a></li>
	</ul>
</div>	