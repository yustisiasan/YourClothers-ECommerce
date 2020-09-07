<?php
if ((isset($_SESSION['logg3dAdm1n'])) and ($_SESSION['role']==1)){
	if(isset($_POST['save'])){
		if (empty($_POST['titel']))		{$mess_pnama="*";}
		if (!empty($_POST['titel'])){
		//--
		$target_path = "images/";
		$target_path = $target_path . 'r_'.basename( $_FILES['eimg']['name']); 
		if(move_uploaded_file($_FILES['eimg']['tmp_name'], $target_path)) {
		$fname= basename( $_FILES['eimg']['name']);
			$img='r_'.$fname;
			$qry =  mysql_query("INSERT INTO rotor (roimg,rotitel,rokonten)
							VALUES('$img','$_POST[titel]','$_POST[content]');", $dbconn);			
		?>
		<script type="text/javascript">
			TO_ROTOR();
		</script>
	<?php
		} else { $mess_img="*"; }
		}
		
	} else if(isset($_POST['cancel'])){
	?>
	<script type="text/javascript">
		TO_ROTOR();
	</script>
	<?php
    }
	print "<form enctype='multipart/form-data' action='?n=rotoradd' method='POST'>";
?>
	<div class="title-content">Tambah Event Baru</div>
	<div id="border">
		<div class='m-content'>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr><td colspan='2'></td></tr>
				<tr><td> Titel </td><td><input type='text' name='titel' size='40' maxlength='50'><?php if (!empty($mess_pnama)) { print $mess_pnama; } ?></td></tr>
				<tr><td colspan='2' height='6'></td></tr>
				<tr><td> Image </td><td><input name="eimg" type="file" size='14' tabindex='2'><?php if (!empty($mess_img)) { print $mess_img; } ?></td></tr>
				<tr><td colspan='1' height='6'></td><td colspan='1' height='6'>Dimensi: 670px x 272px </td></tr>
				<tr><td> Konten &nbsp;</td><td rowspan='2' ><textarea name='content' id='textarea' rows='6' cols='40' tabindex=3></textarea></td></tr>
				<tr><td height='200'></td></tr>
			</table>		
		</div>
	</div>
	<script language="javascript">
		generate_wysiwyg('textarea');
	</script>
<?php
	print "<button name='save' class='btn'>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>";
	print " ";
	print "<button name='cancel' class='btn'>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button>";
	print "</form>";
} else {
	empty_PAGE();
}
?>