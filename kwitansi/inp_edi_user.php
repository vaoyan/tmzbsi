<?php

include "../config.php";

?>

<center>

<b>:: EDIT USER ::</b><br><br>

<?php
	$query  = "select * from users where id ='$_GET[uid]'";
	$result = @mysql_query($query) or die(mysql_error());
				
	while($baris=mysql_fetch_row($result)) {
		$username = $baris[1];
		$password = $baris[2];
		$nama = $baris[3];
		$email = $baris[4];
		$telp = $baris[5];
	}

?>

<form method="post" action="konf_edi_user.php">

<table>
	
	<tr>
		<td>USERNAME</td><td>:</td><td><input type="text" name="USERNAME" size="50px" value="<?php echo "$username"; ?>" maxlength="50" onblur="toupper(this)"/></td>
	</tr>
	<tr>
		<td>PASSWORD</td><td>:</td><td><input type="text" name="PASSWORD" size="50px" value="<?php echo "$password"; ?>" maxlength="50" onblur="toupper(this)"/></td>
	</tr>
	<tr>
		<td>NAMA</td><td>:</td><td><input type="text" name="NAMA" size="50px" value="<?php echo "$nama"; ?>" maxlength="50" onblur="toupper(this)"/></td>
	</tr>
	<tr>
		<td>EMAIL</td><td>:</td><td><input type="text" name="EMAIL" size="50px" value="<?php echo "$email"; ?>" maxlength="50" onblur="toupper(this)"/></td>
	</tr>
	<tr>
		<td>NO.TELPON</td><td>:</td><td><input type="text" name="TELP" size="50px" value="<?php echo "$telp"; ?>" maxlength="30" onblur="toupper(this)"/></td>
	</tr>
</table><br>
<input type="hidden" name="uid" value="<?php echo "$_GET[uid]"; ?>"/>
<input type="hidden" name="original_username" value="<?php echo "$username"; ?>"/>
<a href="edi_user.php">[ BATAL ]</a><br><br>
<input type="submit" name="submit" value="SIMPAN">
<input type="reset" name="reset" value="RESET">

</form>

<br><br><br><br>
<div align="center" class="footer">
            <p>Copyright&copy;2016 Development of <a href="http://tamzis.id" target="_blank"><strong>IT TAMZIS</strong></a> All rights reserved.</p>

        </div>
</center>