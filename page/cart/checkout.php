<div class="title-content">Halaman Checkout</div>
<div id="border">
	<div id="main">
	<div class='m-content'>
	<?php
	if (!empty($_SESSION['checkdata']) && $_SESSION['checkdata']==1){	
	if ($_SESSION['checkout']<>0){
	    //$_POST['cnama'],
		if(isset($_SESSION['konama'])){
		   $konama=$_SESSION['konama'];
		}
		if(isset($_SESSION['alamat'])){
		   $alamat=$_SESSION['alamat'];
		}
		$qry = mysql_query("INSERT INTO lapbelanja  (konama, uid,lapip,lapdate,laptime,lapstatus,alamat)
						VALUES('$konama','$_SESSION[checkout]','$ip','$date','$time','Tunggu','$alamat');", $dbconn);
		//-----				
		$qry=mysql_query("SELECT * FROM lapbelanja ORDER BY lapid DESC", $dbconn);
		$rowl=mysql_fetch_array($qry);
		//-----
		$qry = mysql_query("UPDATE krbelanja SET krstatus=1, lapid='$rowl[lapid]' WHERE krip='$ip' AND krstatus=2 AND uid='$_SESSION[checkout]'",$dbconn);
		//-----
		$qry=mysql_query("SELECT * FROM users WHERE uid='$_SESSION[checkout]'", $dbconn);
		$rowu=mysql_fetch_array($qry);
		$_SESSION['checkout2']=1;
		$_SESSION['checkdata']=0;		
	?>
		<script type="text/javascript">
			setTimeout('TO_LAP()', 60000);
		</script>
	<form name='struk' action='?n=print' method='POST'>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td width='10'></td>
			<td width='80'>No. Order</td>
			<td width='3'>:</td>
			<td width='169'><?php print "<b>".$rowl['lapid']."</b>"; $_SESSION['lap_id']=$rowl['lapid'];?></td>
			<td width='10'></td>
		</tr>
		<tr>
			<td width='10'></td>
			<td width='80'>Tanggal</td>
			<td width='3'>:</td>
			<td width='169'><?php print $date?></td>
			<td width='10'></td>
		</tr>
		<tr>
			<td></td>
			<td>Jam</td>
			<td>:</td>
			<td><?php print $time?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan='3' height='5'><h3>------------------------------------------------<h3></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Nama Penerima</td>
			<td>:</td>
			<td><?php print $rowu['nama'];?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Alamat Jelas</td>
			<td>:</td>
			<td><?php print $rowu['alamat'];?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>Phone / HP</td>
			<td>:</td>
			<td><?php print $rowu['phone'];?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>E-mail</td>
			<td>:</td>
			<td><?php print $rowu['email'];?></td>
			<td></td>
		</tr>
		<tr>
			<td colspan='5' height='5'>=====================================</td>
		</tr>
		</table>
		<?php
		TOTAL_TRCK();
		$qry=mysql_query("SELECT * FROM vkrblj_barang WHERE krstatus=1 AND krip='$ip' AND uid='$_SESSION[checkout]' ORDER BY krid", $dbconn);
		print "<table border=0 cellpadding=1 cellspacing=1 style='border:solid 0px #000;color:#000'>";
		while ($row=mysql_fetch_array($qry)){
		?>
		<tr>
			<td width='90'><div align='right'><?php print $row['bnama']?></div></td>
			<td width='8'></td>
			<td colspan='2'><div align='left'><?php print $row['bukuran']?></div></td>
			<td width='20'></td>
		</tr>
		<tr>
			<td><div align='right'><?php print $row['krqty'].' x';?></div></td>
			<td></td>
			<td><div align='left'><?php print number_format($row['bharga'])?></td>
			<td><div align='right'>	<?php print number_format($row['krsbtotal'])?></div></td>
			<td></td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td></td>
			<td colspan='3' height='5'><h3>------------------------------------------------<h3></td>
			<td></td>
		</tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td width='76'></td>
			<td width='80'>Total Item</td>
			<td width='3'>:</td>
			<td width='170'><div align='right'><?php print $item?></div></td>
			<td width='10'></td>
		</tr>
		<tr>
			<td></td>
			<td>Total Belanja</td>
			<td>:</td>
			<td><div align='right'><?php print number_format($cktotal)?></div></td>
			<td></td>
		</tr>
		<tr>
		<?php
			$qryk=mysql_query("SELECT * FROM kota WHERE konama='$rowu[konama]' ORDER BY konama", $dbconn);
			$rowk=mysql_fetch_array($qryk);
		?>
			<td></td>
			<td>Ongkos kirim</td>
			<td>:</td>
			<td><div align='right'><?php $_SESSION['okrm'] =($rowk['koongkos']); ?>
									<?php print number_format($rowk['koongkos']); ?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><hr></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td><b>Total</b></td>
			<td>:</td>
			<td><div align='right'><b><?php print number_format($cktotal+$rowk['koongkos'])?></b></div></td>
			<td></td>
		</tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td colspan='5' height='5'><h3>-----------------------------------------------------------------<h3></td>
		</tr>
		<tr>
			<td width='260'><div align='center'>* Mohon konfirmasi ke YOUR CLOTHES bila sudah melakukan transfer, agar kami dapat memproses pesanan Anda!</div></td>
		</tr>
		<tr bgcolor="#f8f8f8">
			<td><input type="submit" name="rsubmit" id="idrsubmit" value=" Cetak " tabindex=1></td>
		</tr>
		</table>
	</form>
	<?php
	   } else {
	      print "<h3>Maaf keranjang belanja masih kosong...</h3>";
	   }
	} else {
	   print "<h3>Maaf keranjang belanja sudah dikosongkan...</h3>";
	}
	?>
	</div>
</div>
</div>
