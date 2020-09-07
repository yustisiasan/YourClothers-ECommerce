	<div class="title-content">Daftar Hak Akses Pengguna</div>
	<div id="border">
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>No.</h3></div></td>
		<td width='114'><div align='center'><h3>Hak Akses</h3></div></td>
		<td width='36'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$qry=mysql_query("SELECT * FROM roles ORDER BY rid", $dbconn);		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($row=mysql_fetch_array($qry)){
		$no++;	
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#ddd';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
		<td width='115'><div align='left'>&nbsp;<?php print $row['rnama']?></div></td>
		<?php
		print "<td width='36' align='center'><a href='./?n=role_ed&&edit=$row[rid]'><img src='./misc/edit.gif'></a></td>";
		?>
		</tr>
<?php
		}
?>
		</table>
		</div>
	</div>
	</div>