<div class="title-content">Laporan Order Selesai</div>
<div id="border">
	<div id="main">
	<div class='m-content'>
		<table border="0" cellpadding="0" cellspacing="0" width=610>
		<form enctype="multipart/form-data" action="?n=lapbelanja" method="POST">
		<?php
		$qrytot=mysql_query("SELECT COUNT(lapid) as totlap FROM vdetail_lapblj WHERE lapstatus='OK'", $dbconn);
		$rowtot = mysql_fetch_array($qrytot);
		$count=$rowtot['totlap'];
		//--
		if ($count<>0) {
		$qryk=mysql_query("SELECT * FROM vdetail_lapblj WHERE lapstatus='OK' ORDER BY lapid DESC", $dbconn);
		$no=0;
		while($rowk=mysql_fetch_array($qryk)){
		   $no++;
		?>
		<tr>		    
		    <td width=510>
		        <table cellpadding=1 cellspacing=0 style="border:solid 1PX #999;color:#000" width=510>
				<tr>
					<td width='157'>Nama Pemesan</td>
					<td width='3'>:</td>
					<td width='350'><?php print "<b>".$rowk['nama']."</b>";?></td>
				</tr>
				<tr>
					<td>Phone | E-Mail</td>
					<td>:</td>
					<td><?php print "<b>".$rowk['phone']." | ".$rowk['email']."</b>";?></td>
				</tr>
				<tr>
					<td>Alamat Kirim</td>
					<td>:</td>
					<td><?php print "<b>".$rowk['alamat']."</b>";?></td>
				</tr>
			    </table>
			</td>
			<td width='100' style="border:solid 1PX #999;color:#000" bgcolor="#FFFFFF" valign='top'>
			   <table cellpadding=5 cellspacing=0 style="border:solid 0PX #999;color:#000" width='100'>
			   <tr>
			      <td bgcolor="#E8E8E8"><font size='1'><b>No. Order:</b></font></td>
			   </tr>
			   <tr>
			      <td align='center' bgcolor="#FFFFFF"><?php print "<font size='6'><b>".$rowk['lapid']."</b></font>"; ?></td>
			   </tr>
			   </table>
			</td>
		</tr>
		<tr bgcolor="#bb1b2d">
			<td style="border: 1px solid #aaa; color:#fff" width=510><h3>&nbsp;Tanggal Order :&nbsp;<?php print $rowk['lapdate']." (<b>".$rowk['laptime']."</b>)"; ?></h3></td>
			<td style="border: 1px solid #aaa; color:#fff" width=100 align='center'>&nbsp;<b>Status</b>&nbsp;</td>			
		</tr>
		<tr>
			<td style="border: 1px solid #aaa;" width=510>
			<table class='main1' cellpadding=1 cellspacing=1 style="border:solid 0PX #999;color:#000" width=510>
			<tr bgcolor="#EF953A">
				<td style="border: 1px solid #000;" width=300 align='center'><h3>Nama Barang </h3></td>
				<td style="border: 1px solid #000;" width=20 align='center'>&nbsp;<b>Qty</b>&nbsp;</td>
				<td style="border: 1px solid #000;" width=90 align='center'>&nbsp;<b>@ Harga</b>&nbsp;</td>
				<td style="border: 1px solid #000;" width=100 align='center'>&nbsp;<b>Sub Total</b>&nbsp;</td>
			</tr>
			<?php
			$qryl=mysql_query("SELECT * FROM vkrblj_barang WHERE krstatus=0 AND lapid='$rowk[lapid]' ORDER BY lapid", $dbconn);
			while($rowl=mysql_fetch_array($qryl)){
			?>
			<tr>
				<td width=300 style="border: 1px solid #aaa; ">&nbsp;<?php print $rowl['bnama'] ?>&nbsp;</td>
				<td width=20 align='center'style="border: 1px solid #aaa; ">&nbsp;<?php print $rowl['krqty'] ?>&nbsp;</td>
				<td width=90 align='center'style="border: 1px solid #aaa; ">&nbsp;<?php print "Rp.".number_format($rowl['bharga']) ?> &nbsp;</td>
				<td width=100 align='center'style="border: 1px solid #aaa; ">&nbsp;<?php print "Rp.".number_format($rowl['krsbtotal']) ?> &nbsp;</td>
			</tr>	
			<?php
			}
			?>		
            <tr>
				<td width=410 align='right'style="border: 1px solid #aaa; " colspan='3'>Ongkos Kirim (<b><?php print $rowk['konama'] ?></b>)&nbsp;</td>
				<td width=100 align='right'style="border: 1px solid #aaa; "><b><?php print "Rp.".number_format($rowk['koongkos']) ?></b>&nbsp;</td>
			</tr>			
			<tr>
				<td width=410 align='right'style="border: 1px solid #aaa; " colspan='3'><b>Total</b>&nbsp;</td>
				<td width=100 align='right'style="border: 1px solid #aaa; "><b><?php print "Rp.".number_format($rowk['krsbtotal']+$rowk['koongkos']) ?></b>&nbsp;</td>
			</tr>	
			</table>
			</td>
			<td align='center'style="border: 1px solid #aaa;" width=100 align='center'>
				<?php print $rowk['lapstatus'];?>
				
			</td>
		</tr>
		<?php
		}
		?>
		<tr>
			<td colspan='2'><hr></td>
		</tr>
		<tr>
		   <td colspan='2'>
		  
		  
			<h2>Rekap Laporan Belanja - Per Pemesan</h2>
			<table class='main1' cellpadding=1 cellspacing=1 style="border:solid 0PX #999;color:#000" width=610>
			<tr bgcolor="#EF953A">
				<td style="border: 1px solid #000;" align="center"><b>No.</b></td>
			    <td style="border: 1px solid #000;" align="center"><b>Nama Pemesan</b></td>
				<td style="border: 1px solid #000;" align="center"><b>No.Telp/HP</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Jumlah</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Ongkir</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Total</b></td>
			</tr>
			<?php
			$qryx=mysql_query("SELECT uid, nama, phone, SUM(krsbtotal) AS krsbtotal, 
			                                    SUM(koongkos) AS koongkos, SUM(total) as total 
										 FROM vrekap_ok GROUP BY uid, nama, phone", $dbconn);
			$i=1;
			$totharga = 0; $totongkir = 0; $totall = 0;
			while($rowx=mysql_fetch_array($qryx)){
			   $totharga+=$rowx['krsbtotal'];
			   $totongkir+=$rowx['koongkos'];
			   $totall+=$rowx['total'];
			?>
			   <tr>
			      <td style="border: 1px solid #000;"><?php echo "$i"; ?></td>
				  <td style="border: 1px solid #000;"><?php echo $rowx['nama']; ?></td>
				  <td style="border: 1px solid #000;"><?php echo $rowx['phone']; ?></td>
				  <td style="border: 1px solid #000;" align="right"><?php echo number_format($rowx['krsbtotal']); ?></td>
				  <td style="border: 1px solid #000;" align="right"><?php echo number_format($rowx['koongkos']); ?></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($rowx['total']); ?></b></td>
			   </tr>
			<?php
			$i++;
			}
			?>
			   <tr>
			      <td style="border: 1px solid #000;" colspan="3" align="right"><b>TOTAL :</b></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($totharga); ?></b></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($totongkir); ?></b></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($totall); ?></b></td>
			   </tr>
			</table>
			
		<hr>
		
			<h2>Rekap Laporan Belanja - Per Kota Kirim</h2>
			<table class='main1' cellpadding=1 cellspacing=1 style="border:solid 0PX #999;color:#000" width=510>
			<tr bgcolor="#EF953A">
				<td style="border: 1px solid #000;" align="center"><b>No.</b></td>
			    <td style="border: 1px solid #000;" align="center"><b>Kota Kirim</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Jumlah</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Ongkir</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Total</b></td>
			</tr>
			<?php
			$qryx=mysql_query("SELECT konama, SUM(krsbtotal) AS krsbtotal, 
			                                    SUM(koongkos) AS koongkos, SUM(total) as total 
										 FROM vrekap_ok GROUP BY konama", $dbconn);
			$i=1;
			$totharga = 0; $totongkir = 0; $totall = 0;
			while($rowx=mysql_fetch_array($qryx)){
			   $totharga+=$rowx['krsbtotal'];
			   $totongkir+=$rowx['koongkos'];
			   $totall+=$rowx['total'];
			?>
			   <tr>
			      <td style="border: 1px solid #000;"><?php echo "$i"; ?></td>
				  <td style="border: 1px solid #000;"><?php echo $rowx['konama']; ?></td>
				  <td style="border: 1px solid #000;" align="right"><?php echo number_format($rowx['krsbtotal']); ?></td>
				  <td style="border: 1px solid #000;" align="right"><?php echo number_format($rowx['koongkos']); ?></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($rowx['total']); ?></b></td>
			   </tr>
			<?php
			$i++;
			}
			?>
			   <tr>
			      <td style="border: 1px solid #000;" colspan="2" align="right"><b>TOTAL :</b></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($totharga); ?></b></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($totongkir); ?></b></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($totall); ?></b></td>
			   </tr>
			   <tr>
			      <td colspan="5">
				 
				  </td>
			   </tr>
			</table>
			<hr>
			
			
		   </td>
		</tr>
		<?php
		} else {
		?>
		<tr>
		    <td colspan='2'><h3>Maaf laporan belanja Anda masih kosong.</td>
		</tr>
		<?php
		}
		?>
		</form>
		</table>
	</div>
	</div>
</div>