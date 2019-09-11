<?php

include "../config.php";

?>
<link href="../style.css" rel="stylesheet" type="text/css"/>
<center>

<b>:: TAMBAH USER ::</b><br><br>

<?php

	if($_POST['USERNAME']<>"" AND $_POST['PASSWORD']<>"" AND $_POST['NAMA']<>"" AND $_POST['EMAIL']<>"" AND $_POST['TELP']<>"" AND $_POST['LEVEL']<>"") {
	
		// CEK APAKAH USERNAME SUDAH DIGUNAKAN
		$query 			= "select * from users where username = '$_POST[USERNAME]'";
		$result 		= @mysql_query($query) or die(mysql_error());
		$num_results 	= mysql_num_rows($result);
		
		if ($num_results==0) {
		$pass=md5($_POST['PASSWORD']);
			$query 		= "insert into users (username,password,nama,email,telp,level,status)
						   value('$_POST[USERNAME]','$pass','$_POST[NAMA]','$_POST[EMAIL]','$_POST[TELP]','$_POST[LEVEL]','A')";
			$result 	= @mysql_query($query) or die(mysql_error());
			
			echo "DATA BERHASIL DISIMPAN.<br>";
		}
		else
			echo "USERNAME YANG ANDA MASUKKAN SUDAH DIGUNAKAN.<br>";
	}
	else {
	
		echo "DATA YANG ANDA MASUKKAN TIDAK LENGKAP.<br>";
	}
	
	echo "<br><a href='tam_user.php'>Kembali</a> | <a href='index.php'>Menu Utama</a>";
?>

<br><br><br><br>
<div align="center" class="footer">
            <p>Copyright&copy;2016 Development of <a href="http://tamzis.id" target="_blank"><strong>IT TAMZIS</strong></a> All rights reserved.</p>

</div>

</center>