<div class="title-content">Administrasi Laporan Belanja</div>
<div id="border">
	<div id="main">
	<div class='m-content'>
    <table width=610 class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
    <tr height="25px" bgcolor="#000">
	    <td width='20' align='center'><h3>No.</h3></td>
	    <td align='center'><h3>Data Per Pemesan</h3></td>
    </tr>
	<?php
	$qry=mysql_query("SELECT * FROM users WHERE uid in (SELECT uid FROM lapbelanja WHERE lapstatus='OK') ORDER BY uid", $dbconn);
	$no=0;
	while($rowu=mysql_fetch_array($qry)){
	$no++	
	?>
	<tr>
		<td width=20 bgcolor='#000' align='center' valign='top'><?php print $no."."; ?></td>
		<td width=590>
		    <table width=590 class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#000">
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
			<tr>
				<td colspan='3'>
				<table border="0" cellpadding="0" cellspacing="0" width='590'>					
				<?php
				$qrytot=mysql_query("SELECT COUNT(lapid) as totlap FROM lapbelanja WHERE uid='$rowu[uid]'", $dbconn);
				$rowtot = mysql_fetch_array($qrytot);					
				$count = $rowtot['totlap'];
				if ($count<>0) {
				    if(isset($_POST['submit'])){						
						$lid = $_POST['lid'];
						if ($lid<>''){
						   $qry = mysql_query("DELETE FROM lapbelanja WHERE lapid='$lid'", $dbconn);
				?>
						<script type="text/javascript">
							TO_LAPALL();
						</script>
				<?php
						}
					}
						
					$qryt=mysql_query("SELECT * FROM vdetail_lapblj WHERE uid='$rowu[uid]' ORDER BY lapid DESC", $dbconn);
					$i=0;
					while($rowt=mysql_fetch_array($qryt)){
					$i++;
					?>
					    <tr bgcolor="#bb1b2d">
			                <td width='490' style="border:solid 1PX #999;color:#FFF"><?php print "<b>&nbsp;$i.</b> Alamat Kirim : <b>$rowt[alamat]</b>";?></td>			
							<td width='100' style="border:solid 1PX #999;color:#FFF" align='center'><?php print "&nbsp;No.Order: <b>$rowt[lapid]</b>";?></td>							
		                </tr>
		                <tr bgcolor="#E8E8E8">
							<td width='490' style="border: 1px solid #aaa;"><h3>&nbsp;Tanggal Pemesanan:&nbsp;<?php print $rowt['lapdate'] ?></h3></td>
							<td width='100' align='center' style="border: 1px solid #aaa;">&nbsp;<b>Status</b>&nbsp;</td>							
						</tr>
						<tr>
							<td>
							<table class='main1' cellpadding=1 cellspacing=1 style="border:solid 0PX #999;color:#000">
								<tr bgcolor="#EF953A">
								<td style="border: 1px solid #000;" width=260 align='center'><h3>Nama Barang </h3></td>
								<td style="border: 1px solid #000;" width=20 align='center'>&nbsp;<b>Qty</b>&nbsp;</td>
								<td style="border: 1px solid #000;" width=90 align='center'>&nbsp;<b>@ Harga</b>&nbsp;</td>
								<td style="border: 1px solid #000;" width=120 align='center'>&nbsp;<b>Sub Total</b>&nbsp;</td>
							</tr>
							<?php
							$qryl=mysql_query("SELECT * FROM vkrblj_barang WHERE krstatus=0 AND lapid='$rowt[lapid]' ORDER BY lapid", $dbconn);
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
								<td width=370 align='right'style="border: 1px solid #aaa;" colspan='3'>Ongkos Kirim (<b><?php print $rowt['konama'] ?></b>)&nbsp;</td>
								<td width=120 align='right'style="border: 1px solid #aaa;" colspan='3'>&nbsp;<b><?php print "Rp.".number_format($rowt['koongkos']) ?></b> &nbsp;</td>
							</tr>	
							<tr>
								<td width=370 align='right'style="border: 1px solid #aaa;" colspan='3'><b>Total</b>&nbsp;</td>
								<td width=120 align='right'style="border: 1px solid #aaa; ">&nbsp;<b><?php print "Rp.".number_format($rowt['krsbtotal']+$rowt['koongkos']) ?></b> &nbsp;</td>
							</tr>	
							</table>
							</td>
							<form enctype="multipart/form-data" action="?n=lapall" method="POST">
							<td align='center'style="border: 1px solid #aaa;" width=100 align='center'>
								<?php 
								//print "<font size='5'><b>".$rowt['lapstatus']."</font><br><br>";
								if($rowt['lapstatus']=='Tunggu') { 
									 print "<font color='red' size='4'><b>$rowt[lapstatus]</b></font><br><br>";
								} else {
									 print "<font color='green' size='4'><b>$rowt[lapstatus]</b></font><br><br>";
								}
								?>
								<input type='hidden'	name='lid' value="<?php print $rowt['lapid']?>">
                                <button name='submit' class='btn'>&nbsp;&nbsp;Hapus&nbsp;&nbsp;</button>								
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
		</td>
	</tr>
	<?php
	}
	?>
	</table>
	</div>
	</div>
</div>