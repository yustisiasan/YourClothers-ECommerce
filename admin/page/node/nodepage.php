	<div class="title-content">Daftar Page</div>
	<div id="border">
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>No.</h3></div></td>
		<td width='215'><div align='center'><h3>Titel</h3></div></td>
		<td width='50'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$qry=mysql_query("SELECT node.* FROM node ORDER BY nid DESC", $dbconn);		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($row=mysql_fetch_array($qry)){
		$no++		
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#ddd';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
		<td width='215'><div align='left'>&nbsp;<?php print $row['ntitel']?></div></td>
		<?php
		print "<td width='16' align='center'><a href='./?n=node&np=$row[nid]'><img src='./misc/user.png'></a></td>";
		print "<td width='16' align='center'><a href='./?n=nodeedit&&nid=$row[nid]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $row[ntitel] ?'); if (ok) return true; else return false\" href=./?n=nodeedit&&delete=$row[nid]><img src='./misc/delete.gif'></a></td>"; 
		?>
		</tr>
<?php
		}
?>
		</table>
		</div>
	</div>
	</div>
<?php
		print "<a href='./?n=nodeadd'><button name='addsubmit' class='btn' tabindex='18'>&nbsp;Tambah Page Baru&nbsp;</button></a>";
?>