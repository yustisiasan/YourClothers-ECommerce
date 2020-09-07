<div class="title-content">REKAP LAPORAN BELANJA</div>
<div id="border">
	<div id="main">
	<div class='m-content'>
	    <?php
		$qrytot=mysql_query("SELECT COUNT(lapid) as totlap FROM vdetail_lapblj WHERE lapstatus='OK'", $dbconn);
		$rowtot = mysql_fetch_array($qrytot);
		$count=$rowtot['totlap'];
		//--
		if ($count<>0) {
		?>
		
			<h2>Rekap Laporan Belanja - Per Order</h2>
			<table class='main1' cellpadding=1 cellspacing=1 style="border:solid 0PX #999;color:#000" width=610>
			<tr bgcolor="#EF953A">
				<td style="border: 1px solid #000;" align="center"><b>No.</b></td>
			    <td style="border: 1px solid #000;" align="center"><b>Order</b></td>
			    <td style="border: 1px solid #000;" align="center"><b>Nama Pemesan</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Kota Kirim</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Jumlah</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Ongkir</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Total</b></td>
			</tr>
			<?php
			$qryx=mysql_query("SELECT lapid, nama, konama, krsbtotal, koongkos, total FROM vrekap_ok ORDER BY lapid", $dbconn);
			$i=1;
			$totharga = 0; $totongkir = 0; $totall = 0;
			while($rowx=mysql_fetch_array($qryx)){
			   $totharga+=$rowx['krsbtotal'];
			   $totongkir+=$rowx['koongkos'];
			   $totall+=$rowx['total'];
			?>
			   <tr>
			      <td style="border: 1px solid #000;"><?php echo "$i"; ?></td>
				  <td style="border: 1px solid #000;"><?php echo $rowx['lapid']; ?></td>
				  <td style="border: 1px solid #000;"><?php echo $rowx['nama']; ?></td>
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
			      <td style="border: 1px solid #000;" colspan="4" align="right"><b>TOTAL :</b></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($totharga); ?></b></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($totongkir); ?></b></td>
				  <td style="border: 1px solid #000;" align="right"><b><?php echo number_format($totall); ?></b></td>
			   </tr>
			</table>
				
		<hr>
		
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
		
			<h2>Laporan Produk Terlaris</h2>
			<table class='main1' cellpadding=1 cellspacing=1 style="border:solid 0PX #999;color:#000" width=410>
			<tr bgcolor="#EF953A">
				<td style="border: 1px solid #000;" align="center"><b>No.</b></td>
			    <td style="border: 1px solid #000;" align="center"><b>Foto Produk</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Nama Produk</b></td>
				<td style="border: 1px solid #000;" align="center"><b>Total</b></td>
			</tr>
			<?php
			$qryx=mysql_query("SELECT * FROM vbarang_laris ORDER BY krqty DESC", $dbconn);
			$i=1;
			while($rowx=mysql_fetch_array($qryx)){
			?>
			   <tr>
			      <td style="border: 1px solid #000;"><?php echo "$i."; ?></td>
				  <td style="border: 1px solid #000;"><?php echo "<img src=./images/$rowx[bimg] width=100>"; ?></td>
				  <td style="border: 1px solid #000;"><?php echo $rowx['bnama']; ?></td>
				  <td style="border: 1px solid #000;" align="center"><?php echo number_format($rowx['krqty']); ?></td>
			   </tr>
			<?php
			$i++;
			}
			?>
			</table>
		<hr>
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

                  <div id="chart2" style="height:300px; width:500px;"></div>
				  <script class="code" type="text/javascript">
				      $(document).ready(function(){
					  var data = [
						['Heavy Industry', 12],['Retail', 9], ['Light Industry', 14], 
						['Out of home', 16],['Commuting', 7], ['Orientation', 9]
					  ];
					  var plot2 = jQuery.jqplot ('chart2', [data], 
						{
						  seriesDefaults: {
							renderer: jQuery.jqplot.PieRenderer, 
							rendererOptions: {
							  // Turn off filling of slices.
							  fill: false,
							  showDataLabels: true, 
							  // Add a margin to seperate the slices.
							  sliceMargin: 4, 
							  // stroke the slices with a little thicker line.
							  lineWidth: 5
							}
						  }, 
						  legend: { show:true, location: 'e' }
						}
					  );
					});
				  </script>

