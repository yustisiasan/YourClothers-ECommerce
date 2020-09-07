<?php
if(isset($_POST['chout'])){
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==MD5('Y3s!OK')){
		if (empty($_POST['cnama']))			{$mss_cnama="*";}
		if (empty($_POST['cphone']))		{$mss_cphone="*";}
		if (empty($_POST['ckota']))			{$mss_ckota="*";}
		if (!empty($_POST['cnama']) && !empty($_POST['cphone']) && !empty($_POST['ckota'])){
		    $_SESSION['konama']=$_POST['ckota'];
			$_SESSION['alamat']=$_POST['calamat'];
			user_REGUP($_POST['cnama'],$_POST['ckota'],$_POST['calamat'],$_POST['cphone']);
			$_SESSION['checkdata'] =1;			
		}
	}
}
?>
<div class="title-content">Keranjang Belanja</div>
<div id="border">
	<div id="main">
	<div class='m-content'>
	<?php
		TOTAL_TR();		
		//$uid diambil dari fungsi TOTAL_TR() dalam file function.php
		$qrytot=mysql_query("SELECT ifnull(COUNT(a.bid),0) as totdata FROM krbelanja a, barang b
                             WHERE a.bid=b.bid AND a.krstatus=2 AND a.uid='$uid' AND a.krip='$ip'", $dbconn);
		$rowtot = mysql_fetch_array($qrytot);
        $totkb = $rowtot["totdata"];
		
		if ($totkb>0) {
	?>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr  bgcolor="#bb1b2d" style="border:solid 0PX #999;color:#FFF">
			<td align='center'><h3>Item</h3></td>
			<td align='center'><h3>Detail </h3></td>
			<td align='center'><h3>Qty </h3></td>
			<td align='center'><h3>Subtotal</h3></td>
		</tr>
		<?php
		print "Berikut ini adalah produk yang ada di Keranjang Belanja Anda:";
		$qry=mysql_query("SELECT * FROM vkrblj_barang WHERE krstatus=2 AND krip='$ip' ORDER BY krid",$dbconn);
		while($row=mysql_fetch_array($qry)){
		?>
		<form method="POST" action="?n=cart_reg">
		<tr>
			<td rowspan='3'><div class='m-img'><?php print "<img src=./admin/images/$row[bimg] title='".$row['bnama']."' height='75' class='m'>";?></div> </td>
			<td bgcolor="#E8E8E8" height='20' width='350'><h3>&nbsp;<?php print $row['bnama'] ?></h3></td>
			<td align='center'>&nbsp;<input type='text' name='qty' tabindex='1' size='6' maxlength='6' value='<?php print $row['krqty'] ?>'>&nbsp;</td>
			<td bgcolor="#E8E8E8" valign='middle'>&nbsp;<?php print "Rp.".number_format($row['krsbtotal']) ?>&nbsp;</td>
		</tr>
		<tr>
			<td bgcolor="#E8E8E8" colspan='1' height='20'>&nbsp;<?php print "Rp.".number_format($row['bharga']) ?></td>
			<td align='center'><button name="add" style="border: 0px; background-color:transparent"><img src='./misc/bt_add.gif' height='16'></button></td>
			<td bgcolor="#E8E8E8"><input name='addid' type='hidden' value="<?php print $row['krid'] ?>"></td>
		</tr>
		</form>
		<tr>
			<td bgcolor="#E8E8E8"></td>
			<td></td>
			<td bgcolor="#E8E8E8"></td>
		</tr>
		<tr>
			<td height='20'align='center'>&nbsp;<?php print "<a href='./?n=cart_reg&&krid=$row[krid]'><img src='./misc/bt_delete.gif' height='16'></a>" ?>&nbsp;</td>
			<td bgcolor="#E8E8E8"></td>
			<td></td>
			<td bgcolor="#E8E8E8"></td>
		</tr>
		<tr>
			<td colspan='4'><hr></td>
		</tr>
		<?php
		}
		?>
		<tr bgcolor="#bb1b2d" style="border:solid 0PX #999;color:#FFF">
			<td height='20' align='center'><h3>&nbsp;Total&nbsp;</h3></td>
			<td></td>
			<td></td>
			<td><h3>&nbsp;<?php print "Rp.".number_format($total) ?>&nbsp;</h3></td>
		</tr>
		<tr>
			<td height='10' colspan=4></td>
		</tr>
		<tr>
			<td height='10' align='left'><b>Catatan:</b></td>
			<td colspan=3 align='justify'>Ongkos kirim hanya diberlakukan per pengiriman berdasarkan KOTA tujuan, berapapun berat dari total produk yang dipesan. </td>
		</tr>
		<tr>
			<td height='10'></td>
		</tr>
		<tr  bgcolor="#bb1b2d" style="border:solid 0PX #999;color:#FFF">
			<td colspan=4><h3>&nbsp;Silakan isikan data pribadi (kontak) anda :</h3></td>
		</tr>
	</table>
	<form method="POST" action="<?php print $_SERVER['REQUEST_URI']; ?>" >
	<table border='0' cellpadding='0' cellspacing='0'>
		<tr><td height='10'></td></tr>
		<tr><td rowspan='29' width='10'></td></tr>
		<?php		
		if (isset($_SESSION['unama'])) {
		   $qryuser = mysql_query("SELECT * FROM users WHERE unama='$_SESSION[unama]'",$dbconn);
		} else {
		   $qryuser = mysql_query("SELECT * FROM users WHERE unama='-'",$dbconn);
		}
		$rowuser = mysql_fetch_array($qryuser);
		?>
		<tr><td height='2'></td></tr>
		<tr><td>&nbsp;Nama&nbsp;</td>
			<td><input type='text' name='cnama' tabindex='15' size='24' maxlength='32' value='<?php echo $rowuser['nama']; ?>'>
			<?php if (!empty($mss_cnama)) { print $mss_cnama; } ?>
			</td>
		</tr>
		<tr><td height='2'></td></tr>
		<tr><td>&nbsp;Telepon&nbsp;</td>
			<td><input type='text' name='cphone' tabindex='16' size='24' maxlength='14' value='<?php echo $rowuser['phone']; ?>'>
			<?php if (!empty($mss_cphone)) { print $mss_cphone; } ?>
			</td>
		</tr>
		<tr><td>&nbsp;Kota&nbsp;</td>
			<td>
			<select name='ckota' tabindex='17'>
				<option value='<?php echo $rowuser['konama']; ?>' selected><?php echo $rowuser['konama']; ?></option>
				<?php								
				$qrytotko=mysql_query("SELECT ifnull(COUNT(*),0) as totkota FROM kota",$dbconn);
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
		<tr><td>&nbsp;Alamat&nbsp;</td>
			<td><textarea name='calamat' rows='2' cols='19' tabindex='18'><?php echo $rowuser['alamat']; ?></textarea>
			</td>
		</tr>
		<tr><td height='6'></td></tr>
		<tr>
			<td width='94'></td>
			<td><button name="chout" style="border: 0px; background-color:transparent"><img src='./misc/bt_checkout.gif' height='16'></button></td>
		</tr>
	</table>
	</form>
	<?php
		}  else {
		   if (isset($_SESSION['loggedin'])) {
		      print "Keranjang belanja Anda masih kosong.<br>";
		   } else {
		      print "Untuk bisa belanja, Anda harus login terlebih dahulu. Jika belum memiliki akun, silakan daftar <a href='?n=user_reg'>di sini</a>.";
		   }
		}
	?>
	</div>
	</div>
</div>
<img src='./misc/back.gif' alt='mb' width='5'> <a href="index.php" style="color:#b72c24" onmouseover="this.style.color='#ff0000'" 
			onmouseout="this.style.color='#b72c24'">Back</a>