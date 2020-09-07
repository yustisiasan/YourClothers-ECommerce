<div class="title-content">Buku Tamu</div>
<div id="border">
	<div class='m-content'>
<?php 
	if(isset($_POST['tsubmit'])){
		if (empty($_POST['tnama']))		{$tmess_uname="*";}
		if (empty($_POST['temail']))	{$tmess_email="*";}
		if (empty($_POST['tcontent']))	{$tmess_content="*";}
		if (!empty($_POST['temail'])){
		
		if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $_POST['temail'])){
			$pmess_plemail="Invalid email";
			}
		else if (!empty($_POST['tnama']) && !empty($_POST['temail']) && !empty($_POST['tcontent'])){
			$qryi = mysql_query ("INSERT INTO btamu (btnama,btemail,btweb,btdtime,btcontent)
						VALUES('$_POST[tnama]','$_POST[temail]','$_POST[twebsite]','$date $time' ,'$_POST[tcontent]');",$dbconn);	
			$_POST['tnama']='';
			}
		}
	}
?>
<form method="POST" action="?n=btamu" >
<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td height='10'>&nbsp;Nama&nbsp;</td>
			<td height='10'>&nbsp;<input type='text' name='tnama' tabindex='21' size='26' maxlength='32'>&nbsp;<?php if (!empty($tmess_uname)) { print $tmess_uname; } ?>&nbsp;</td>
		</tr>
		<tr>
			<td height='10'>&nbsp;Email&nbsp;</td>
			<td height='10'>&nbsp;<input type='text' name='temail' tabindex='22' size='26' maxlength='64'>&nbsp;<?php if (!empty($tmess_email) && !empty($pmess_plemail)) {print $tmess_email;print $pmess_plemail; } ?>&nbsp;</td>
		</tr>
		<tr>
			<td height='10'>&nbsp;Website&nbsp;(tanpa <b>http://</b>)</td>
			<td height='10'>&nbsp;<input type='text' name='twebsite' tabindex='23' size='26' maxlength='64'>&nbsp;</td></td>
		</tr>
		<tr>
			<td>&nbsp;Content&nbsp;</td>
			<td height='10' rowspan='2'>&nbsp;<textarea name='tcontent' rows='3' cols='30' tabindex='24'></textarea>&nbsp;<?php if (!empty($tmess_content)) { print $tmess_content; } ?>&nbsp;</td>
		</tr>
		<tr>
			<td height='60'></td>			
		</tr>
		<tr><td colspan='3' align='right'>
		<button name="tsubmit" tabindex='25' class="btn">&nbsp;&nbsp;Save&nbsp;&nbsp;</button></td></tr>
		<tr><td colspan='3'><hr></td></tr>
	</table>
</form>
<?php
    $qry2=mysql_query("SELECT count(btid) as totbt FROM btamu", $dbconn);
	$rowbt = mysql_fetch_array($qry2);
	$totbtamu = $rowbt["totbt"];

	$qry=mysql_query("SELECT * FROM btamu ORDER BY btid DESC LIMIT 5", $dbconn);

	if ($totbtamu<>0) {
	while($row=mysql_fetch_array($qry)){
	?>
	<table border="0" cellpadding="0" cellspacing="0" width='600'  class="btamu">
		<tr><td><B>Form :&nbsp;</B><?php print $row['btnama'] ?></td></tr>
		<tr><td><h5>&nbsp;<?php print $row['btdtime'] ?></h5></td></tr>
		<tr><td>&nbsp;<?php print $row['btcontent'] ?></td></tr>
		<tr><td><i>Website </i>:&nbsp;<?php print "<a href='http://$row[btweb]/'>$row[btweb] </a>"?><hr></td></tr>
	</table>
<?php
	}
	} else {
	?>
		<table border="0" cellpadding="0" cellspacing="0" class="btamu">
		<tr><td colspan='2'><h3>Buku tamu masih kosong...</td></tr>
		</table>
	<?php
	}?>
	<div class="cleared"></div>
	</div>
</div>