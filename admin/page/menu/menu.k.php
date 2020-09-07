<?php
   include "./././includes/database.php";
?>
   <div class="title-content">Menu Horisontal</div>
	<div id="border">
	<div id="MidPan">
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>NO.</h3></div></td>
		<td width='150'><div align='center'><h3>Nama Menu</h3></div></td>
		<td width='415'><div align='center'><h3>Link</h3></div></td>
		<td width='70'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		$qry=mysql_query("SELECT * FROM menu WHERE mclass='h' AND parent_id='0' ORDER BY mid", $dbconn);		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		$no=1;
		while ($row=mysql_fetch_array($qry)){
?>
		<tr height="25px" bgcolor="#b72c24" style="color:#fff"
			onmouseover="this.style.backgroundColor='#b72c24';this.style.color='#ff0'" 
			onmouseout="this.style.backgroundColor='#b72c24';this.style.color='#fff'">
		<td width='30' align='center'><?php print $no ?></td>
		<td width='130'><div align='left'>&nbsp;<?php print $row['mtitel']?></div></td>
		<?php
		print "<td width='350' align='left'>&nbsp;$row[murl] </td>";
		print "<td width='18' align='center'><a href='./?n=hmenu_ed&&edit=$row[mid]'><img src='./misc/edit.gif'></a></td>";
		print "<td width='18' align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $row[mtitel] ?'); if (ok) return true; else return false\" href=./?n=hmenu_ed&&delete=$row[mid]><img src='./misc/delete.gif'></a></td>";
		print "<td width='18' align='center'><a href='./?n=hmenu_add&&edit=$row[mid]'><img src='./misc/add.png'></a></td>";		
		?>
		</tr>
		<tr height="25px">
		<td width='30'></td>
		<td width='130'></td>
		<td colspan='4'>
			<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #b72c24;color:#fff">
			<tr height="25px" bgcolor="#000">
			<td width='30'><div align='center'><h3>No.</h3></div></td>
			<td width='100'><div align='center'><h3>Sub Menu</h3></div></td>
			<td width='300'><div align='center'><h3>Link</h3></div></td>
			<td width='60'><div align='center'><h3>Aksi</h3></div></td>
			</tr>
			</table>
			<?php
			$menuid = $row['mid'];
			$qrytot = "SELECT IFNULL(COUNT(mid),0) as totmn FROM menu WHERE mclass='h' AND parent_id='$menuid'";
			$hsltot=mysql_query($qrytot, $dbconn);		  
			$rowtot = mysql_fetch_array($hsltot);
			$totmenu = $rowtot['totmn'];
			if ($totmenu>0) {
			   print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
			   $no2=1;
			   $qry2=mysql_query("SELECT * FROM menu WHERE mclass='h' AND parent_id='$row[mid]' ORDER BY morder DESC", $dbconn);		  
			   while ($row2=mysql_fetch_array($qry2)){			      
			?>	
			      <tr height="25px" bgcolor="#F8F8F8" 
			      onmouseover="this.style.backgroundColor='#b72c24';this.style.color='#fff'" 
			      onmouseout="this.style.backgroundColor='#ddd';this.style.color='#000'">
			      <td width='30' align='center'><?php print $no2; ?></td>
			      <td width='100'><div align='left'>&nbsp;<?php print $row2['mtitel']?></div></td>			
			<?php
			      print "<td width='300' align='left'>&nbsp;$row2[murl] </td>";
			      print "<td width='18' align='center'><a href='./?n=main&mp=$row[morder]$row2[murl]'><img src='./misc/user.png'></a></td>";
			      print "<td width='18' align='center'><a href='./?n=hmenu_ed&&edit=$row2[mid]'><img src='./misc/edit.gif'></a></td>";
			      print "<td width='18' align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $row2[mtitel] ?'); if (ok) return true; else return false\" href=./?n=hmenu_ed&&delete=$row2[mid]><img src='./misc/delete.gif'></a></td>"; 
			      echo "</tr>";
				  $no2++;
			   } 
			   echo "</table>";
			} else {
			   echo "Tidak ada submenu di menu ini.";
			}
			?>
			
		</td>
		</tr>
<?php
		   $no++;	
		}
?>
		</table>
		</div>
	</div>
	</div>
	<?php
		print "<a href='./?n=hmenu_add2'><button name='editsubmit' class='btn' tabindex='18'>&nbsp;&nbsp;Tambah Menu Horisontal&nbsp;&nbsp;</button></a>";
?>