<?php

include "../config.php";

?>

<center>

<b>:: HAPUS USER ::</b><br><br>

<?php

	$query  = "update users set status='T' where id = '$_GET[uid]'";
	$result = @mysql_query($query) or die (mysql_error());
	
	echo "DATA BERHASIL DIHAPUS.<br>";
	
	echo "<br><a href='hap_user.php'>KEMBALI</a> | <a href='index.php'>HOME</a>";
?>

<br><br><br><br>
<div align="center" class="footer">
            <p>Copyright&copy;2016 Development of <a href="http://tamzis.id" target="_blank"><strong>IT TAMZIS</strong></a> All rights reserved.</p>

        </div>
</center>

