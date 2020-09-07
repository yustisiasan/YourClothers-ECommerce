<?PHP
	if (isset($_SESSION['logg3dAdm1n'])AND ($_SESSION['role']==1)){
	$mmid=str_replace(substr($_GET['n'],1), '',$_GET['n']);
	if(isset($_POST['submit'])){
		if (empty($_POST['mnama']))		{$mss_rnama="*";}
		if (!empty($_POST['mnama'])){
			menu_ADDk($_POST['mnama']);			
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
	<form enctype="multipart/form-data" action="?n=hmenu_add2" method="POST">
	<div class="title-content">Tambah Kategori</div>
	<div id="border">
	<div class='m-content'>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td rowspan='12'></td>
			<td rowspan='12' width='10'></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td height='10'>&nbsp;Kategori&nbsp;</td>
			<td height='10'>:&nbsp;<input type='text' name='mnama' tabindex='2' size='26' maxlength='32' value="">&nbsp;<?php if (!empty($mss_rnama)) { print $mss_rnama; } ?></td>
		</tr>
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