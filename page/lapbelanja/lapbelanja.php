<div class="title-content">Laporan Belanja</div>
<div id="border">
	<div id="main">
	<div class='m-content'>
	<?php
	if(isset($_POST['submit'])){
	?>
		<script type="text/javascript">
			setTimeout('TO_LAP()', 1);
		</script>
	<?php
	}
	if (isset($_SESSION['checkout2']) && $_SESSION['checkout2']<>0){	
		$qry = mysql_query("UPDATE krbelanja SET krstatus=0 WHERE krbelanja.krip='$ip' AND krstatus=1", $dbconn);
		unset($_SESSION['checkout2']); 
		unset($_SESSION['okrm']);		
	}		
	if(isset($_SESSION['checkout'])) {
		$qry=mysql_query("SELECT * FROM users WHERE uid='$_SESSION[checkout]'", $dbconn);
		$rowu=mysql_fetch_array($qry);
	?>
	    <table cellpadding=1 cellspacing=1 style="border:solid 0PX #999;color:#000" width=610>
		<tr bgcolor="#FFFFFF">
			<td width='157'>Nama Pemesan</td>
			<td width='3'>:</td>
			<td width='450'><?php print $rowu['nama'];?></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>Phone / HP</td>
			<td>:</td>
			<td><?php print $rowu['phone'];?></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>E-mail</td>
			<td>:</td>
			<td><?php print $rowu['email'];?></td>
		</tr>
		</table>
	<?php
	} else {
	    echo "Anda harus login terlebih dahulu untuk bisa melakukan belanja. Terima kasih.";
	}
    ?>	
		<table border="0" cellpadding="0" cellspacing="0" width=610>
		<?php
		$qrytot=mysql_query("SELECT COUNT(*) as totblj FROM lapbelanja WHERE uid='$_SESSION[checkout]'", $dbconn);
		$rowtot=mysql_fetch_array($qrytot);
		$count=$rowtot['totblj'];
		
		if ($count<>0) {
		$qryk=mysql_query("SELECT * FROM vdetail_lapblj WHERE uid='$_SESSION[checkout]' ORDER BY lapid DESC", $dbconn);
		$i=0;
		while($rowk=mysql_fetch_array($qryk)){
		   $i++;
		?>
		<tr bgcolor="#bb1b2d">
			<td width='510' style="border:solid 1PX #999;color:#FFF"><?php print "<b>&nbsp;$i.</b> Alamat Kirim : <b>$rowk[alamat]</b>";?></td>			
			<td width='100' style="border:solid 1PX #999;color:#FFF"><?php print "&nbsp;No.Order: <b>$rowk[lapid]</b>";?></td>			
		</tr>
		<tr bgcolor="#E8E8E8">
			<td style="border: 1px solid #aaa;" width=510 ><h3>&nbsp;Tanggal Order :&nbsp;<?php print $rowk['lapdate']." (".$rowk['laptime'].")"; ?></h3></td>
			<td style="border: 1px solid #aaa;" width=100 align='center'>&nbsp;<b>Status</b>&nbsp;</td>
		</tr>
		<tr>
			<td style="border: 1px solid #aaa;" width=510 >
			<table class='main1' cellpadding=1 cellspacing=1 style="border:solid 0PX #999;color:#000" width=510>
			<tr bgcolor="#EF953A">
				<td style="border: 1px solid #000;" width=250 align='center'><h3>Nama Barang </h3></td>
				<td style="border: 1px solid #000;" width=20 align='center'>&nbsp;<b>Qty</b>&nbsp;</td>
				<td style="border: 1px solid #000;" width=90 align='center'>&nbsp;<b>@ Harga</b>&nbsp;</td>
				<td style="border: 1px solid #000;" width=150 align='center'>&nbsp;<b>Sub Total</b>&nbsp;</td>
			</tr>
			<?php
			$qryl=mysql_query("SELECT * FROM vkrblj_barang WHERE krstatus=0 AND lapid='$rowk[lapid]' ORDER BY lapid", $dbconn);
			while($rowl=mysql_fetch_array($qryl)){
			?>
			<tr>
				<td width=250 style="border: 1px solid #aaa; "><?php print $rowl['bnama'] ?>&nbsp;</td>
				<td width=20 align='center'style="border: 1px solid #aaa; ">&nbsp;<?php print $rowl['krqty'] ?>&nbsp;</td>
				<td width=90 align='right'style="border: 1px solid #aaa; ">&nbsp;<?php print "Rp.".number_format($rowl['bharga']) ?> &nbsp;</td>
				<td width=150 align='right'style="border: 1px solid #aaa; ">&nbsp;<?php print "Rp.".number_format($rowl['krsbtotal']) ?> &nbsp;</td>
			</tr>		
			<?php
			}
			?>
			<tr>
				<td align='right' colspan='3'>Ongkos Kirim&nbsp;<?php print "(<b>".$rowk['konama']."</b>)"; ?></td>
				<td align='right'style="border: 1px solid #aaa; ">&nbsp;<?php print "Rp.".number_format($rowk['koongkos']) ?> &nbsp;</td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td align='right' colspan='3'><b>Total</b>&nbsp;</td>
				<td align='right'style="border: 1px solid #aaa; ">&nbsp;<b><?php print "Rp.".number_format($rowk['krsbtotal']+$rowk['koongkos']) ?></b> &nbsp;</td>
			</tr>
			</table>
			</td>
			<td align='center'style="border: 1px solid #aaa;" width=100 align='center'>&nbsp;
			   <?php 
			      if($rowk['lapstatus']=='Tunggu') { 
				     print "<font color='red' size='3'><b>$rowk[lapstatus]</b></font>";
				  } else {
				     print "<font color='green' size='3'><b>$rowk[lapstatus]</b></font>";
				  }
			   ?>			
               <!--			   
			   <form name='struk' action='?n=print' method='POST'>
			      <input type="hidden" name="hdlapid" value="<?php //print $rowk['lapid']; ?>">
				  <input type="submit" name="rsubmit" id="idrsubmit" value=" Cetak " tabindex=1>
			   </form>
			   -->
			</td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td colspan=4><hr></td>
		</tr>
		<?php
		} else {
		?>
		<tr><td colspan='2'><h3>Laporan belanja Anda masih kosong, ATAU Anda belum login. Terima kasih.</td></tr>
		<?php
		}
		?>
		</table>
	</div>
	</div>
</div>
<?php
if ($count<>0) {print "* Silakan konfirmasi ke YOUR CLOTHES bila sudah melakukan transfer, sehingga kami dapat memproses pesanan Anda!";};
?>