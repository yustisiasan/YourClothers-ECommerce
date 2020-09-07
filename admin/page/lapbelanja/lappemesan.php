<div class="title-content">Laporan Order Masuk</div>
<div id="border">
	<div id="main">
	<div class='m-content'>
	
	<table width=610 class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
	<tr bgcolor="#000">
		<td width='20' align='center'><h3>NO.</h3></td>
		<td width='590' align='center'><h3>DATA ORDER</h3></td>
	</tr>
	<?php
	$qrytot=mysql_query("SELECT COUNT(uid) as totuid FROM users WHERE uid in (SELECT uid FROM lapbelanja WHERE lapstatus='Tunggu')", $dbconn);
	$rowtot = mysql_fetch_array($qrytot);
	$totuser = $rowtot['totuid'];
	
	if ($totuser<>0) {
	   $qry=mysql_query("SELECT * FROM users WHERE uid in (SELECT uid FROM lapbelanja WHERE lapstatus='Tunggu') ORDER BY uid", $dbconn);
	   $no=0;
	   while($rowu=mysql_fetch_array($qry)){
	      $no++;	
	?>
	<tr>
		<td width='20' bgcolor='#000' align='center' valign='top'><?php print "$no."; ?></td>
		<td width='590'>
		
		
		
		
		
			<table cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#000" width=590>
				<tr>
					<td width='157'>Nama Pemesan</td>
					<td width='3'>:</td>
					<td width='430'><?php print $rowu['nama'];?></td>
				</tr>
				<tr>
					<td>Phone / HP</td>
					<td>:</td>
					<td><?php print $rowu['phone'];?></td>
				</tr>
				<tr>
					<td>E-mail</td>
					<td>:</td>
					<td><?php print $rowu['email'];?></td>
				</tr>
			</table>
			<!-- awal data pemesan -->
			<table border=0 cellpadding=0 cellspacing=0 width=590>
			<tr>
				<td>
				<table border="0" cellpadding="0" cellspacing="0" width='590'>
				<?php
				$qrytot2=mysql_query("SELECT COUNT(lapid) as totlb FROM lapbelanja WHERE lapstatus='Tunggu' AND uid='$rowu[uid]'", $dbconn);
				$rowtot2 = mysql_fetch_array($qrytot2);
	            $totlb = $rowtot2['totlb'];
				if ($totlb<>0) {
				    if(isset($_POST['submit'])){					    
						$lid 	= $_POST['lid'];
						$status	= $_POST['status'];
						if ($lid<>''){
						    $qry = mysql_query("UPDATE lapbelanja SET lapstatus='$status' WHERE lapid='$lid'", $dbconn);
						?>
						<script type="text/javascript">
						    TO_LAPPESAN();
						</script><?php						
					    }					
				    }
					
					$qryt=mysql_query("SELECT * FROM vdetail_lapblj WHERE lapstatus='Tunggu' AND uid='$rowu[uid]' ORDER BY lapid DESC", $dbconn);
					$i=0;
					while($rowt=mysql_fetch_array($qryt)){
					   $i++;
					?>
						<tr bgcolor="#bb1b2d">
			                <td width='490' style="border:solid 1PX #999;color:#FFF"><?php print "<b>&nbsp;$i.</b> Alamat Kirim : <b>$rowt[alamat]</b>";?></td>			
							<td width='100' style="border:solid 1PX #999;color:#FFF" align='center'><?php print "&nbsp;No.Order: <b>$rowt[lapid]</b>";?></td>			
		                </tr>
		                <tr bgcolor="#E8E8E8">
							<td width=490 style="border: 1px solid #aaa;"><h3>&nbsp;Tanggal Order :&nbsp;<?php print $rowt['lapdate']." (<b>$rowt[laptime]</b>)"; ?></h3></td>
							<td width=100 align='center' style="border: 1px solid #aaa;">&nbsp;<b>Status</b>&nbsp;</td>							
						</tr>
						<tr>
							<td width=490>
								<table class='main1' cellpadding=1 cellspacing=1 style="border:solid 0PX #999;color:#000" width=490>
								<tr bgcolor="#EF953A">
									<td style="border: 1px solid #000;" width=260 align='center'><h3>Nama Barang </h3></td>
									<td style="border: 1px solid #000;" width=20 align='center'>&nbsp;<b>Qty</b>&nbsp;</td>
									<td style="border: 1px solid #000;" width=90 align='center'>&nbsp;<b>@ Harga</b>&nbsp;</td>
									<td style="border: 1px solid #000;" width=120 align='center'>&nbsp;<b>Sub Total</b>&nbsp;</td>
								</tr>
								<?php
								$qryl=mysql_query("SELECT bid, bnama, bharga, krid, krqty, krsbtotal, krip, krstatus, lapid, uid
															 FROM vkrblj_barang WHERE lapid='$rowt[lapid]' 
															 ORDER BY lapid", $dbconn);
								while($rowl=mysql_fetch_array($qryl)){
								?>
								<tr>
									<td width=260 style="border: 1px solid #aaa; ">&nbsp;<?php print $rowl['bnama'] ?>&nbsp;</td>
									<td width=20 align='center'style="border: 1px solid #aaa; ">&nbsp;<?php print $rowl['krqty'] ?>&nbsp;</td>
									<td width=90 align='center'style="border: 1px solid #aaa; ">&nbsp;<?php print "Rp.".number_format($rowl['bharga']) ?>&nbsp;</td>
									<td width=120 align='center'style="border: 1px solid #aaa; ">&nbsp;<?php print "Rp.".number_format($rowl['krsbtotal']) ?> &nbsp;</td>
								</tr>	
								<?php
								}
								?>
								<tr>
									<td align='right' style="border: 1px solid #aaa;" colspan='3'>Ongkos Kirim&nbsp;<?php print "(<b>".$rowt['konama']."</b>)"; ?></td>
									<td align='right'style="border: 1px solid #aaa;"><b><?php print "Rp.".number_format($rowt['koongkos']) ?></b> &nbsp;</td>
								</tr>	
								<tr>
									<td align='right' style="border: 1px solid #aaa;" colspan='3'>&nbsp;<b>Total</b>&nbsp;</td>
									<td align='right'style="border: 1px solid #aaa; "><b><?php print "Rp.".number_format($rowt['krsbtotal']+$rowt['koongkos']) ?></b> &nbsp;</td>
								</tr>
								</table>	
							</td>
						<form enctype="multipart/form-data" action="?n=lappemesan" method="POST">
							<td align='center'style="border: 1px solid #aaa;" width=100 align='center'>
								<select name="status">
									<option value="Tunggu">Tunggu</option>
									<option value="OK">OK</option>
								</select>
								<?php 
								   if ($rowt['lapstatus']=='Tunggu'){
								?>
								      <input type='hidden' name='lid' value="<?php print $rowt['lapid']?>">
								<?php 
								   } 
								?>
								<button name='submit' class='btn'>&nbsp;&nbsp;Proses&nbsp;&nbsp;</button>
							</td>
						</form>
						</tr>
					<?php
					}
				}
				?>				
				</table>					
				</td>
			</tr>
			</table>
			<!-- akhir data pemesan -->
		</td>
	</tr>
	<?php
	    }
	}
	?>
	</table>
	</div>
</div>
</div>