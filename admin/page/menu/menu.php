	<div class="title-content">Daftar Menu Vertikal</div>
	<div id="border">
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>No.</h3></div></td>
		<td width='130'><div align='center'><h3>Menu name</h3></div></td>
		<td width='300'><div align='center'><h3>Link</h3></div></td>
		<td width='36'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$qry=mysql_query("SELECT * FROM menu WHERE mclass='v' ORDER BY morder DESC", $dbconn);		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=0;
		while ($row=mysql_fetch_array($qry)){
		$no++		
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#b72c24';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#ddd';this.style.color='#000'">
		<td width='30' align='center'><?php print $no; ?></td>
		<td width='130'><div align='left'>&nbsp;<?php print $row['mtitel']?></div></td>
		<?php
		print "<td width='300' align='left'>&nbsp;$row[murl] </td>";
		print "<td width='18' align='center'><a href='./?n=node&np=$row[murl]'><img src='./misc/user.png'></a></td>";
		print "<td width='18' align='center'><a href='./?n=vmenu_ed&&edit=$row[mid]'><img src='./misc/edit.gif'></a></td>";
		?>
		</tr>
<?php
		}
?>
		</table>
		</div>
	</div>
	</div>