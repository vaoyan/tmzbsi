<?php

include "../config.php";

?>

<center>

<b>:: EDIT USER ::</b><br><br>

<?php

	if($_POST['USERNAME']<>"" AND $_POST['PASSWORD']<>"") {
	
		// CEK APAKAH USERNAME SUDAH DIGUNAKAN
		$query 			= "select * from users where username = '$_POST[USERNAME]'";
		$result 		= @mysql_query($query) or die(mysql_error());
		$num_results 	= mysql_num_rows($result);
		
		while($baris = mysql_fetch_row($result))
			$username = $baris[1];
		
		if($_POST['USERNAME']==$_POST['original_username']) {
			$query 		= "update users set username = '$_POST[USERNAME]', password = '$_POST[PASSWORD]', nama = '$_POST[NAMA]', email = '$_POST[EMAIL]', telp = '$_POST[TELP]' 
						   where id = '$_POST[uid]'";
			$result 	= @mysql_query($query) or die(mysql_error());
				
			echo "DATA BERHASIL DISIMPAN.<br>";			
		}
		else {
			if($num_results==0) {
				
				$query 		= "update users set username = '$_POST[USERNAME]', password = '$_POST[PASSWORD]', nama = '$_POST[NAMA]', email = '$_POST[EMAIL]', telp = '$_POST[TELP]' 
							   where id = '$_POST[uid]'"; 
				$result 	= @mysql_query($query) or die(mysql_error());
				
				echo "DATA BERHASIL DISIMPAN.<br>";	
			}
			else
				echo "USERNAME YANG ANDA MASUKKAN SUDAH DIGUNAKAN.<br>";
		}
	}
	else {
	
		echo "DATA YANG ANDA MASUKKAN TIDAK LENGKAP.<br>";
	}
	
	echo "<br><a href='inp_edi_user.php?uid=$_POST[uid]'>KEMBALI</a> | <a href='index.php'>HOME</a>";
?>

<br><br><br><br>
<div align="center" class="footer">
            <p>Copyright&copy;2016 Development of <a href="http://tamzis.id" target="_blank"><strong>IT TAMZIS</strong></a> All rights reserved.</p>

        </div>
</center>