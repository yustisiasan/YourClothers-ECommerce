<style type="text/css">
</style>
<?php
if(isset($_POST['submit'])){
	if (empty($_POST['runama']))		{$mss_runama="*";}
	if (empty($_POST['rpasswd1']))		{$mss_rpasswd1="*";}
	if (empty($_POST['rpasswd2']))		{$mss_rpasswd2="*";}
	if (empty($_POST['rnama']))			{$mss_rnama="*";}
	if (empty($_POST['remail']))		{$mss_remail="*";}
	if (!empty($_POST['runama']) && !empty($_POST['rpasswd1']) && !empty($_POST['rpasswd2']) && !empty($_POST['rnama']) && !empty($_POST['remail'])){
		user_REGISTER($_POST['runama'],$_POST['rpasswd1'],$_POST['rpasswd2'],$_POST['rnama'],$_POST['remail'],$_POST['rkota'],$_POST['ralamat'],$_POST['rphone']);	
	}
}
?>
<div class="title-content">Register User</div>
<div id="border">
<form method="POST" action="<?php print $_SERVER['REQUEST_URI']; ?>" >
<table border='0' cellpadding='0' cellspacing='0'>
	<tr><td height='10'></td></tr>
	<tr><td rowspan='29' width='10'></td></tr>
	<tr><td>&nbsp;Username&nbsp;</td>
		<td><input type='text' name='runama' tabindex='11' size='24' maxlength='16'>
			<?php if(!empty($mss_runama)) { print $mss_runama; } ?><?php if(!empty($rmss_runama)) { print $rmss_runama; } ?>
		</td>
	</tr>
	<tr><td height='2'></td></tr>
	<tr><td>&nbsp;Password&nbsp;</td>
		<td colspan='1'><input type='password' name='rpasswd1' tabindex='12' size='24' maxlength='32'>
			<?php if(!empty($mss_rpasswd1)) { print $mss_rpasswd1; } ?><?php if(!empty($rmss_rpasswd)) { print  $rmss_rpasswd; } ?>
		</td>
	</tr>
	<tr><td height='2'></td></tr>
	<tr><td>&nbsp;Ulang Password&nbsp;</td>
		<td><input type='password' name='rpasswd2' tabindex='13' size='24' maxlength='32'>
			<?php if(!empty($mss_rpasswd2)) { print $mss_rpasswd2; } ?>
		</td>
	</tr>
	<tr><td height='10'></td></tr>
	<tr><td>&nbsp;Email&nbsp;</td>
		<td><input type='text' name='remail' tabindex='14' size='24' maxlength='64'>
			<?php if(!empty($mss_remail)) { print $mss_remail; }?><?php if(!empty($rmss_remail)) { print $rmss_remail; } ?>
		</td>
	</tr>
	<tr><td height='2'></td></tr>
	<tr><td>&nbsp;Nama&nbsp;</td>
		<td><input type='text' name='rnama' tabindex='15' size='24' maxlength='32'>
			<?php if(!empty($mss_rnama)) { print $mss_rnama; } ?>
		</td>
	</tr>
	<tr><td height='2'></td></tr>
	<tr><td>&nbsp;Telepon&nbsp;</td>
		<td><input type='text' name='rphone' tabindex='16' size='24' maxlength='14'>
		</td>
	</tr>
	<tr><td height='2'></td></tr>
	<tr><td>&nbsp;Alamat&nbsp;</td>
		<td><textarea name='ralamat' rows='2' cols='19' tabindex='17'><?php print $row['ncontent'];?></textarea>
		</td>
	</tr>
	<tr><td height='2'></td></tr>
	<tr><td>&nbsp;Kota&nbsp;</td>
			<td>
			<select name='rkota' tabindex='17'>
				<option selected value=""></option>
				<?php								
				$qrytotko=mysql_query("SELECT ifnull(COUNT(*),0) as totkota FROM kota", $dbconn);
				$rowkota = mysql_fetch_array($qrytotko);
				$totko = $rowkota["totkota"];
				if ($totko>0) {
				    $qry=mysql_query("SELECT * FROM kota ORDER BY konama", $dbconn);
					while ($row=mysql_fetch_array($qry)){
						echo "<option value='".$row['konama']."'>".$row['konama']."</option>";
					}
				}
				?>
			</select> <?php if (!empty($mss_ckota)) { print $mss_ckota; } ?>
			</td>
	</tr>
	<tr><td height='6'></td></tr>
	<tr>
		<td width='94'></td>
		<td><button name="submit" class="btn" tabindex='18'>&nbsp;&nbsp;New user&nbsp;&nbsp;</button></td>
	</tr>
</table>
</form>
</div>
<img src='./misc/back.gif' alt='mb' width='5'> <a href="index.php" style="color:#3762AE" onmouseover="this.style.color='#E0E028'" 
			onmouseout="this.style.color='#3762AE'">Back</a>