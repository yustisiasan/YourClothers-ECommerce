<?php
if(isset($_POST['save'])){
	//--
	$target_path = "images/";
	$target_path = $target_path . 'r_'.basename( $_FILES['eimg']['name']); 
	if(move_uploaded_file($_FILES['eimg']['tmp_name'], $target_path)) {
	$fname= basename( $_FILES['eimg']['name']);
		$img='r_'.$fname;
	} else{$img=$_POST['himg'];}
		$qry = mysql_query("UPDATE rotor SET roimg='$img', rotitel='$_POST[titel]',rokonten='$_POST[content]' WHERE roid='$_POST[id]'", $dbconn);
	?>
	<script type="text/javascript">
		TO_ROTOR();
	</script>
	<?php
} 
if(isset($_POST['cancel'])){
	?>
	<script type="text/javascript">
		TO_ROTOR();
	</script>
	<?php
}
else if (isset($_GET['delete'])){
	$qry=mysql_query ("DELETE FROM rotor WHERE roid='$_GET[delete]'", $dbconn);	
	?>
	<script type="text/javascript">
		TO_ROTOR();
	</script>
	<?php
}
else if(isset($_GET['roid'])){
	$qrytot=mysql_query ("SELECT COUNT(roid) as totevn FROM rotor WHERE roid='$_GET[roid]'", $dbconn);
	$rowtot = mysql_fetch_array($qrytot);
	$toteven = $rowtot['totevn'];
	if ($toteven<>0) {
	$qry=mysql_query ("SELECT * FROM rotor WHERE roid='$_GET[roid]'", $dbconn);
	$row=mysql_fetch_array($qry); 
	print "<form enctype='multipart/form-data' action='?n=rotor_ed' method='POST'>";
?>
	<div class="title-content">Edit Data Event "<?php print ucwords($row['rotitel']);?>"</div>
	<div id="border">
		<div class='m-content'>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr><td colspan='2'></td></tr>
				<tr><td> Titel </td><td><input type='text' name='titel' size='40' maxlength='50' value='<?php print ucwords($row['rotitel']);?>'></td></tr>
				<tr><td colspan='2' height='6'></td></tr>
				<tr><td> Image </td><td><input name="eimg" type="file" size='14' tabindex='2'></td></tr>
				<tr><td colspan='2' height='6'></td></tr>
				<tr><td> Content &nbsp;</td><td rowspan='2' ><textarea name='content' id='textarea' rows='6' cols='40' tabindex=3><?php print $row['rokonten'];?></textarea></td></tr>
				<tr><td height='200'></td></tr>
			</table>		
		</div>
	</div>
	<script language="javascript">
		generate_wysiwyg('textarea');
	</script>
<?php
	print "<input name='id' type='hidden' value='$row[roid]'>";
	print "<input name='himg' type='hidden' value='$row[roimg]'>";
	print "<button name='save' class='btn'>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>";
	print " ";
	print "<button name='cancel' class='btn'>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button>";
	print "</form>";
	} 
	else {
		empty_PAGE();
	}
}
?>