<?php
	if (isset($_SESSION['logg3dAdm1n'])AND ($_SESSION['role']==1)){
	$mmid=str_replace(substr($_GET['n'],1), '',$_GET['n']);
	if(isset($_POST['submit'])){
		if (empty($_POST['moid']))		{$mss_rid="*";}
		if (empty($_POST['mnama']))		{$mss_rnama="*";}
		if (!empty($_POST['moid']) && !empty($_POST['mnama'])){
			menu_ADD('h',$_POST['moid'],$_POST['mnama']);			
		}
	}
	else if(isset($_POST['cancel'])){
	?>
		<script type="text/javascript">
			TO_HMENU()	;
		</script>
	<?php
	};	
?>
	<form enctype="multipart/form-data" action="?n=hmenu_add" method="POST">
	<div class="title-content">Tambah Submenu</div>
	<div id="border">
	<div class='m-content'>
	<?php
		if ($_GET['edit']<>'') {
		$mid=$_GET['edit'];
		$qry=mysql_query("SELECT * FROM menu WHERE mid='$mid'", $dbconn);
		$row=mysql_fetch_array($qry);
		}
	?>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td rowspan='12'></td>
			<td rowspan='12' width='10'></td>
		</tr>
		<tr bgcolor="#E8E8E8">
			<td height='10' width='200'>&nbsp;Kategori menu&nbsp;</td>
			<td width='400'>:&nbsp;<input type='text' name='mid' tabindex='1' size='26' maxlength='16' disabled='disabled' value="<?PHP print $row['mtitel'] ?>">&nbsp;<?php if(!empty($mss_rid)) { print  $mss_rid; } ?></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td height='10'>&nbsp;Submenu&nbsp;</td>
			<td height='10'>:&nbsp;<input type='text' name='mnama' tabindex='2' size='26' maxlength='32' value="">&nbsp;<?php if(!empty($mss_rnama)) { print $mss_rnama; } ?></td>
		</tr>
		<tr><td colspan='4' height='10'>
			<input name='moid' 	type='hidden' value="<?PHP print $row['mid'] ?>">
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