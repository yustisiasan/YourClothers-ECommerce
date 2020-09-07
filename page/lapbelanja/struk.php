<script type="text/javascript">
	if (window.print) {
		document.write();
	}
	setTimeout('window.print()', 1000);
	setTimeout('TO_INDEX()', 1200);
</script>
<div id="main">
	<?php
		TOTAL_TRCK();
		//--
		$qry=sqlsrv_query($dbconn, "SELECT * FROM users WHERE uid='$_SESSION[checkout]'");
		$rowu=sqlsrv_fetch_array($qry);
	?>
	<form name='struk' action='?n=print' method='POST'>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<th width='272' colspan='4'>YOUR CLOTHES</th>			
		</tr>
		<tr>
			<td width='272' colspan='4'>&nbsp;</td>			
		</tr>
		<tr>
			<td width='10'></td>
			<td width='80'>No. Order</td>
			<td width='3'>:</td>
			<td width='169'><?php print "<b>".$_SESSION['lap_id']."</b>";?></td>
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
			<td colspan='3' height='5'><h3>------------------------------------------------------------------<h3></td>
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
			<td width='10'></td>
			<td width='80'>Alamat/Kota Kirim</td>
			<td width='3'>:</td>
			<td width='169'><?php print $rowu['alamat']." (<b>$rowu[konama]</b>)"; ?></td>
			<td width='10'></td>
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
			<td colspan='5' height='5'>&nbsp;=====================================</td>
		</tr>
		</table>
		<?php
		$qry=sqlsrv_query($dbconn, "SELECT * FROM vkrblj_barang WHERE krstatus=1 AND krip='$ip' AND uid='$_SESSION[checkout]' ORDER BY krid");
		print "<table border=0 cellpadding=1 cellspacing=1 style='border:solid 0px #000;color:#000'>";
		while ($row=sqlsrv_fetch_array($qry)){
		?>
		<tr>
			<td width='90'><div align='right'><?php print $row['bnama']?></div></td>
			<td width='8'></td>
			<td colspan='2'><div align='left'><?php print $row['bgaransi']?></div></td>
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
			<td colspan='4' height='5'><h3>------------------------------------------------------------------<h3></td>
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
		<?PHP
			PRINT $row['konama'];
			$qryk=sqlsrv_query($dbconn, "SELECT * FROM kota WHERE konama='$rowu[konama]' ORDER BY konama");
			$rowk=sqlsrv_fetch_array($qryk);
		?>
			<td></td>
			<td>Ongkos kirim</td>
			<td>:</td>
			<td><div align='right'><?php print number_format($rowk['koongkos']); ?></td>
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
			<td><div align='right'><b><?php print number_format($cktotal+($rowk['koongkos']*$item))?></b></div></td>
			<td></td>
		</tr>
		</table>
		<table border=0 cellpadding=0 cellspacing=0 style="border:solid 0px #000;color:#000">
		<tr>
			<td colspan='5' height='5'><h3>------------------------------------------------------------------<h3></td>
		</tr>
		<tr>
			<td colspan='5' height='5'><h3>Mohon konfirmasi ke YOUR CLOTHES bila sudah melakukan<br>transfer, agar kami dapat memproses pesanan Anda!<h3></td>
		</tr>
		<tr>
			<td width='260'><div align='center'>TERIMA KASIH ATAS KEPERCAYAAN ANDA BERBELANJA MELALUI YOUR CLOTHES</div></td>
		</tr>
		</table>
	</form>
</div>
