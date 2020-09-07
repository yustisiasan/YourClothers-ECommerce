<?php
if(isset($_POST['save'])){
	$qry=mysql_query("UPDATE node SET ntitel='$_POST[titel]',nkonten='$_POST[content]' WHERE nid='$_POST[nid]'", $dbconn);
	to_NN();
} 
if(isset($_POST['cancel'])){
	to_NN();
}
else if (isset($_GET['delete'])){
		$qry=mysql_query("DELETE FROM node WHERE nid='$_GET[delete]'", $dbconn);	
		$qry=mysql_query("DELETE FROM menu WHERE mclass='v' AND murl='$_GET[delete]'", $dbconn);
		?>
		<script type="text/javascript">
			TO_NPAGE();
		</script>
		<?php
}
else if(isset($_GET['nid'])){
	$qrytot=mysql_query("SELECT COUNT(nid) as totnd FROM node WHERE nid='$_GET[nid]'", $dbconn);
	$rowtot = mysql_fetch_array($qrytot);
	$totnode = $rowtot['totnd'];
	if ($totnode<>0) {
	$qry=mysql_query("SELECT node.* FROM node WHERE nid='$_GET[nid]'", $dbconn);
	$row=mysql_fetch_array($qry); 
	print "<form method='POST' action='?n=nodeedit'>";
?>
	<div class="title-content">Edit Data Page "<?php print ucwords($row['ntitel']);?>"</div>
	<div id="border">
		<div class='m-content'>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr><td colspan='2'></td></tr>
				<tr><td> Titel </td><td><input type='text' name='titel' size='40' maxlength='50' value='<?php print ucwords($row['ntitel']);?>'></td></tr>
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
	print "<input name='nid' type='hidden' value='$row[nid]'>";
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