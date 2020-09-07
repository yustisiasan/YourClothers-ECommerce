	<div class="title-content">Ongkos Kirim</div>
	<div id="border">
	<div class='m-content'>
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>NO.</h3></div></td>
		<td width='114'><div align='center'><h3>Kota</h3></div></td>
		<td width='114'><div align='center'><h3>Ongkos Kirim</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$qry=mysql_query("SELECT * FROM kota ORDER BY konama",$dbconn);		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($row=mysql_fetch_array($qry)){
		$no++		
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#ddd';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
		<td width='115'><div align='left'>&nbsp;<?php print $row["konama"]?></div></td>
		<td width='114'><div align='center'>&nbsp;<?php print number_format($row["koongkos"])?></div></td>
		</tr>
<?php
		}
?>
		</table>
		</div>
	</div>
	</div>
	</div>