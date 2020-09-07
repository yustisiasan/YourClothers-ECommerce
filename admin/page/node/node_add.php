<?php
if ((isset($_SESSION['logg3dAdm1n'])) and ($_SESSION['role']==1)){

	if(isset($_POST['save'])){
		if (empty($_POST['titel']))		{$mess_pnama="*";}
		if (!empty($_POST['titel'])){
		$titel 	=$_POST['titel'];
		$titel	=strtolower($titel);
		$titel 	=str_replace(" ", "_",$titel);
			$qry =  mysql_query ("INSERT INTO node (nid,ntitel,nkonten)
							VALUES('$titel','$_POST[titel]','$_POST[content]');", $dbconn);	
			menu_ADD('v',0,$_POST['titel']);
		}
	} if(isset($_POST['cancel'])) {
	?>
	    <script type="text/javascript">
			TO_NPAGE();
		</script>
	<?php
	}
	print "<form method='POST' action='?n=nodeadd'>";	
?>
	<div class="title-content">Tambah Data Page</div>
	<div id="border">
		<div class='m-content'>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr><td colspan='2'></td></tr>
				<tr><td> Titel </td><td><input type='text' name='titel' size='40' maxlength='50'><?php if(!empty($mess_pnama)) { print $mess_pnama; } ?></td></tr>
				<tr><td colspan='2' height='6'></td></tr>
				<tr><td> Content &nbsp;</td><td rowspan='2' ><textarea name='content' id='textarea' rows='6' cols='40' tabindex=2><?php print $row['nkonten'];?></textarea></td></tr>
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
	} 
?>