<?php
	if (isset($_SESSION['loggedin'])){	
		$qry=mysql_query("SELECT * FROM users WHERE users.unama='$_SESSION[unama]'",$dbconn);
		$row=mysql_fetch_array($qry);
?>
	<div class="title-content">Profil Pengguna</div>
	<div id="border">
	<div class='m-content'>
	<table border="0" cellpadding="0" cellspacing="0">

		<tr>
			<td rowspan='7'><?php print "<img src=./admin/images/$row[uimg] alt='Foto'.$row[unama] height='120'>";?> </td>
			<td rowspan='7' width='10'></td>
		</tr>
		<tr bgcolor="#E8E8E8">
			<td height='10'>&nbsp;Username&nbsp;</td>
			<td width='460'>:&nbsp;<?php print $row['unama'] ?>&nbsp;</td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td height='10'>&nbsp;Email&nbsp;</td>
			<td height='10'>:&nbsp;<?php print $row['email'] ?>&nbsp;</td>
		</tr>
		<tr bgcolor="#E8E8E8">
			<td height='10'>&nbsp;Nama&nbsp;</td>
			<td height='10'>:&nbsp;<?php print $row['nama'] ?>&nbsp;</td>
		</tr>		
		<tr bgcolor="#F8F8F8">
			<td height='10'>&nbsp;Telepon&nbsp;</td>
			<td height='10'>:&nbsp;<?php print $row['phone'] ?>&nbsp;</td>
		</tr>
		<tr bgcolor="#E8E8E8">
			<td height='10'>&nbsp;Alamat&nbsp;</td>
			<td height='10'>:&nbsp;<?php print $row['alamat'] ?>&nbsp;</td>
		</tr>
		<tr>
			<td colspan='2'  height='20'></td>
		</tr>
	</table>
	</div>
	</div>
	<?php
	print "<a href='./?n=user_ed&uid=$row[uid]'><button name='submit' class='btn'>&nbsp;&nbsp;Edit&nbsp;&nbsp;</button></a>";
	}
	else {
	?>
	<script type="text/javascript">
		TO_INDEX();
	</script>
	<?php
	}
?>