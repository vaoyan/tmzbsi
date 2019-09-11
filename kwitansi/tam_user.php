<center>
<link href="../style.css" rel="stylesheet" type="text/css" />

<div class="col-md-4">
</div>
<br><br>

<b>:: TAMBAH USER ::</b><br><br>

<form method="post" action="konf_tam_user.php">

<table>
	
	<tr>
		<td>Username</td><td>:</td><td><input type="text" name="USERNAME" size="30px" maxlength="25" onblur="toupper(this)"/></td>
	</tr>
	<tr>
		<td>Password</td><td>:</td><td><input type="text" name="PASSWORD" size="30px" maxlength="25" onblur="toupper(this)"/></td>
	</tr>
	<tr>
		<td>Nama Lengkap</td><td>:</td><td><input type="text" name="NAMA" size="30px" maxlength="50" onblur="toupper(this)"/></td>
	</tr>
	<tr>
		<td>Email</td><td>:</td><td><input type="text" name="EMAIL" size="30px" maxlength="50" onblur="toupper(this)"/></td>
	</tr>
	<tr>
		<td>NO.Telpon</td><td>:</td><td><input type="text" name="TELP" size="30px" maxlength="30" onblur="toupper(this)"/></td>
	</tr>
	<tr>
		<td>Level</td><td>:</td>
		<td>
		<select name="LEVEL" style="width:120px">
			<option value="kwitansi">Pembayaran</option>
		</select>
		</td>
	</tr>
</table>
<br>
<a href="index.php" class="kembali btn btn-sm btn-primary">&laquo; Kembali</a><br><br>

<input type="submit" name="submit" value="Simpan">
<input type="reset" name="reset" value="Reset">

</form>

<br><br><br><br>

</center>
