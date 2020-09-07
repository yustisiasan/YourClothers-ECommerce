<?php
	if (isset($_SESSION['logg3dAdm1n'])and ($_SESSION['role']==1)){
	if(isset($_POST['submit'])){
		if (empty($_POST['ridh']))		{$mss_rid="*";}
		if (empty($_POST['rnama']))		{$mss_rnama="*";}
		if (!empty($_POST['ridh']) && !empty($_POST['rnama'])){
			role_UPDATE($_POST['ridh'],$_POST['rnama']);			
		}
	} 
	else if(isset($_POST['cancel'])){
	?>
		<script type="text/javascript">
			TO_ROLE();
		</script>
	<?php
	};
?>
	<form enctype="multipart/form-data" action="?n=role_ed" method="POST">
	<div class="title-content">Edit Hak Akses Pengguna</div>
	<div id="border">
	<div class='m-content'>
	<?php
		if (isset($_GET['edit'])) {
		$rid=$_GET['edit'];
		$qry=mysql_query("SELECT * FROM roles WHERE roles.rid='$rid'", $dbconn);
		$row=mysql_fetch_array($qry);
		}
	?>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td rowspan='12'></td>
			<td rowspan='12' width='10'></td>
		</tr>
		<tr bgcolor="#E8E8E8">
			<td height='10' width='200'>&nbsp;Role ID&nbsp;</td>
			<td width='400'>:&nbsp;<input type='text' name='rid' tabindex='1' size='26' maxlength='16' disabled='disabled' value="<?php print $rid ?>">&nbsp;<?php if(!empty($mss_rid)) { print  $mss_rid; } ?></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td height='10'>&nbsp;Nama Role&nbsp;</td>
			<td height='10'>:&nbsp;<input type='text' name='rnama' tabindex='2' size='26' maxlength='32' value="<?php print $row['rnama']; ?>">&nbsp;<?php if(!empty($mss_rnama)) { print $mss_rnama; } ?></td>
		</tr>
		<tr><td colspan='4' height='10'><input name='ridh' type='hidden' value="<?php print $rid; ?>">
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
	<?php
	}
	?>