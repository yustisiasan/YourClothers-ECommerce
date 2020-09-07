<?php
	if (isset($_SESSION['loggedin'])){
	if(isset($_POST['submit'])){
		if (empty($_POST['enama']))		{$mss_enama="*";}
		if (empty($_POST['eemail']))	{$mss_eemail="*";}
		if (empty($_POST['ephone']))	{$mss_ephone="*";}
		if (!empty($_POST['enama']) && !empty($_POST['eemail']) && !empty($_POST['ephone'])){
			user_UPDATE($_POST['enama'],$_POST['eemail'],$_POST['ephone'],$_POST['ealamat'],
						$_POST['epasswd1'],$_POST['epasswd2'],$_POST['hpasswd']);			
		}
	}else if(isset($_POST['cancel'])){
	?>
	<script type="text/javascript">
		TO_USER();
	</script>
	<?php
	}
?>
	<form enctype="multipart/form-data" action="?n=user_ed" method="POST">
	<div class="title-content">Edit Profil Pengguna</div>
	<div id="border">
	<div class='m-content'>
	<?php
		$qry=mysql_query("SELECT * FROM users WHERE unama='$_SESSION[unama]'", $dbconn);
		$row=mysql_fetch_array($qry);
	?>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td rowspan='12'><?php print "<img src=./admin/images/$row[uimg] alt='Foto'.$row[unama] height='120'>";?> </td>
			<td rowspan='12' width='10'></td>
		</tr>
		<tr bgcolor="#E8E8E8">
			<td height='10' width='200'>&nbsp;Username&nbsp;</td>
			<td width='400'>:&nbsp;<input type='text' name='eunama' tabindex='1' size='26' maxlength='16' disabled='disabled' value="<?PHP print $row['unama'] ?>">&nbsp;</td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td height='10'>&nbsp;Nama&nbsp;</td>
			<td height='10'>:&nbsp;<input type='text' name='enama' tabindex='2' size='26' maxlength='32' value="<?PHP print $row['nama'] ?>">&nbsp;<?php if (!empty($mss_enama)) { print $mss_enama; } ?></td>
		</tr>
		<tr bgcolor="#E8E8E8">
			<td height='10'>&nbsp;Email&nbsp;</td>
			<td height='10'>:&nbsp;<input type='text' name='eemail' tabindex='3' size='26' maxlength='64' value="<?PHP print $row['email'] ?>">&nbsp;<?php if (!empty($mss_eemail)) {print $mss_eemail; } ?></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td height='10'>&nbsp;Telepon&nbsp;</td>
			<td height='10'>:&nbsp;<input type='text' name='ephone' tabindex='4' size='26' maxlength='14' value="<?PHP print $row['phone'] ?>">&nbsp;<?php if (!empty($mss_ephone)) {print $mss_ephone; } ?></td>
		</tr>
		<tr bgcolor="#E8E8E8">
			<td height='10'>&nbsp;Foto&nbsp;</td>
			<td height='20'>:&nbsp;<input name="eimg" type="file" size='14' tabindex='5'>&nbsp;</td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td height='10'>&nbsp;Alamat&nbsp;</td>
			<td height='10'>:&nbsp;<textarea name='ealamat' rows='3' cols='20' tabindex='6'><?php print $row['alamat'];?></textarea>&nbsp;</td>			
		</tr>
		<tr bgcolor="#F8F8F8">
			<td height='10'></td>
			<td height='10'></td>
		</tr>
		<tr bgcolor="#E8E8E8">
			<td height='10'>&nbsp;New Password&nbsp;</td>
			<td height='10'>:&nbsp;<input type='password' name='epasswd1' tabindex='7' size='26' maxlength='14'>&nbsp;<?php if (!empty($rmss_epasswd)) { print  $rmss_epasswd; } ?></td></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td height='10'>&nbsp;Confirm Password&nbsp;</td>
			<td height='10'>:&nbsp;<input type='password' name='epasswd2' tabindex='8' size='26' maxlength='14'>&nbsp;</td></td>
		</tr>
		<tr><td colspan='4' height='10'>
			<input name='himg' type='hidden' value="<?php print $row['uimg'] ?>">
			<input name='hpasswd' type='hidden' value="<?php print $row['upasswd'] ?>">
		</td></tr>
	</table>
	</div>
	</div>
	<button name='submit' class='btn'>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
	<button name='cancel' class='btn'>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button>
	</form>
	<?php
	}
	else {
	?>
	<script type="text/javascript">
		TO_INDEX();
	</script>
	<?PHP
	}
	?>