<?php

include "../config.php";

?>

<center>

<b>:: MENU HAPUS USER ::</b><br><br>

<table width="30%" border="1" cellspacing="1" cellpadding="2">
<tr>
	<td width="20%" bgcolor="#009900" align="center"><b>Daftar User</b></td>

</tr>
<tr>
	
	<td style="vertical-align:top" align="center">
		
			<?php
				// PEMBAYARAN
				$query  = "select id,username,email from users where level ='kwitansi' and status='A' order by username";
				$result = @mysql_query($query) or die(mysql_error());
				
				while($baris=mysql_fetch_row($result)) {
					echo "<a href='inp_hap_user.php?uid=$baris[0]'>$baris[1]</a><br>";
					
					
				}	
			?>
		
	</td>
	
	
</tr>
</table><br>
<div>
			
	<li><a href="index.php" class="kembali btn btn-sm btn-primary">&laquo; Kembali</a></li>		
</div>
<br><br>
<div align="center" class="footer">
            <p>Copyright&copy;2016 Development of <a href="http://tamzis.id" target="_blank"><strong>IT TAMZIS</strong></a> All rights reserved.</p>

        </div>
</center>
