<?PHP
	if (isset($_SESSION['logg3dAdm1n']) and ($_SESSION['role']==1)){
	if(isset($_POST['submit'])){
		if (empty($_POST['rid']))		{$mss_rid="*";}
		if (empty($_POST['rnama']))	   	{$mss_rnama="*";}
		if (!empty($_POST['rid']) && !empty($_POST['rnama'])){
			kota_ADD($_POST['rid'],$_POST['rnama']);			
		}
	} 
	else if(isset($_POST['cancel'])){
	?>
		<script type="text/javascript">
			TO_OKR();
		</script>
	<?php
	};
?>
	<form enctype="multipart/form-data" action="?n=okrmmenu_add" method="POST">
	<div class="title-content">Tambah Data Ongkos Kirim</div>
	<div id="border">
	<div class='m-content'>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td rowspan='12'></td>
			<td rowspan='12' width='10'></td>
		</tr>
		<tr bgcolor="#E8E8E8">
			<td height='10' width='200'>&nbsp;Kota&nbsp;</td>
			<td width='400'>:&nbsp;<input type='text' name='rid' tabindex='1' size='26' maxlength='16'>&nbsp;<?php if(!empty($mss_rid)) { print  $mss_rid; } ?><?php if(!empty($mss_ridkt)) { print  $mss_ridkt; } ?></td>
		</tr>
		<tr bgcolor="#F8F8F8">
			<td height='10'>&nbsp;Ongkos kirim&nbsp;</td>
			<td height='10'>:&nbsp;<input type='text' name='rnama' tabindex='2' size='26' maxlength='32'>&nbsp;<?php if(!empty($mss_rnama)) { print $mss_rnama; } ?></td>
		</tr>
		<tr><td colspan='4' height='10'></td></tr>
	</table>
	</div>
	</div>
	<button name='submit' class='btn'>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
	<button name='cancel' class='btn'>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button>
	</form>
	<?php
	}
	?>