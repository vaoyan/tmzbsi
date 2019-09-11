<?php

include "../config.php";

?>
<center>

<b>:: EDIT USER ::</b><br><br>

<table width="30%" border="1" cellspacing="1" cellpadding="2">
<tr>
	<td width="20%" bgcolor="#009900" align="center"><b>DAFTAR USER</b></td>
</tr>
<tr>
	<td style="vertical-align:top">
		<table>			
			<?php
				// ADMINISTRASI
				$query  = "select id,username from users where level ='kwitansi' and status='A' order by username";
				$result = @mysql_query($query) or die(mysql_error());
				
				while($baris=mysql_fetch_row($result)) {
					echo "<tr><td>";
					echo "<a href='inp_edi_user.php?uid=$baris[0]'>$baris[1]</a><br>";
					echo "</tr></td>";
				}
			?>
		</table>
	</td>
	

</tr>
</table><br>
<a href="index.php">[ BATAL ]</a><br><br>

<br><br>
<div align="center" class="footer">
            <p>Copyright&copy;2016 Development of <a href="http://tamzis.id" target="_blank"><strong>IT TAMZIS</strong></a> All rights reserved.</p>

        </div>
</center>