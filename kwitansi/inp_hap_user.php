<?php

include "../config.php";
?>
<center>

<b>:: HAPUS USER ::</b><br><br>

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

<table width="50%" border="1" cellspacing="1" cellpadding="2">
	
	<tr>
		<td>USERNAME</td><td>:</td><td><?php echo "$username"; ?></td>
	</tr>
	<tr>
		<td>PASSWORD</td><td>:</td><td><?php echo "$password"; ?></td>
	</tr>
	<tr>
		<td>NAMA</td><td>:</td><td><?php echo "$nama"; ?></td>
	</tr>
	<tr>
		<td>EMAIL</td><td>:</td><td><?php echo "$email"; ?></td>
	</tr>
	<tr>
		<td>NO.TELPON</td><td>:</td><td><?php echo "$telp"; ?></td>
	</tr>
</table><br>
<a href="konf_hap_user.php?uid=<?php echo "$_GET[uid]"; ?>">[ HAPUS ]</a> | <a href="hap_user.php">[ BATAL ]</a><br><br>


<br><br><br><br>
<div align="center" class="footer">
            <p>Copyright&copy;2016 Development of <a href="http://tamzis.id" target="_blank"><strong>IT TAMZIS</strong></a> All rights reserved.</p>

        </div>
</center>
