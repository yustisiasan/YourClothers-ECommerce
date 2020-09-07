	<div class="title-content">Daftar Pengguna</div>
	<div id="border">
	<div id="MidPan">
	<div class='cleared'></div>
	Halaman : 
	<?php
	    $dataPerPage =5;
		if(isset($_REQUEST['us'])){
			$noPage = $_REQUEST['us'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['us'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;		
		
		$query  = mysql_query("SELECT COUNT(uid) as idu FROM vuser", $dbconn);
				
		$data   = mysql_fetch_array($query);
		$jumData = $data['idu'];
		$jumPage = ceil($jumData/$dataPerPage);
		// menampilkan link previous
		if ($_REQUEST['us'] > 1) echo  "<a href='?us=".($_REQUEST['us']-1)."'>[Prev]</a>";
		// memunculkan nomor halaman dan linknya
		for($page = 1; $page <= $jumPage; $page++) {
         if ((($page >= $_REQUEST['us'] - 2) && ($page <= $_REQUEST['us'] + 2)) || ($page == 1) || ($page == $jumPage)) {   
            if (($noPage == 1) && ($page != 2))  echo "..."; 
            if (($noPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $_REQUEST['us']) echo "<b>".$page."</b> ";
            else echo " <a href='?us=".$page."'>".$page."</a> ";
            $noPage = $page;          
         }
		}
		if(isset($_REQUEST['us'])){
			$noPage = $_REQUEST['us'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['us'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;
		//menampilkan link next
		if ($noPage < $jumPage) echo "<a href='?us=".($_REQUEST['us']+1)."'>[Next]</a>";
    
	$tsql2 = "SELECT * FROM vuser ORDER BY uid DESC LIMIT $dataPerPage OFFSET $offset";
    $stmt2 = mysql_query($tsql2, $dbconn);

?>	
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>No.</h3></div></td>
		<td width='115'><div align='center'><h3>User Name</h3></div></td>
		<td width='300'><div align='center'><h3>Nama</h3></div></td>
		<td width='80'><div align='center'><h3>Status</h3></div></td>
		<td width='50'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		if (!empty($_GET['n']) && ($_GET['n']=="user" || $_GET['us']==1)) {
		   $no=0;
		} else {
		   $no=$dataPerPage*$_GET['us']-$dataPerPage;
		}
		while ($row=mysql_fetch_array($stmt2)){
		$no++;	
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#ddd';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
		<td width='115'><div align='left'>&nbsp;<?php print $row['unama'];?></div></td>
		<?php
		print "<td width='300' align='left'>&nbsp;$row[nama]</td>";
		print "<td width='80' align='center'>&nbsp;$row[rnama]</td>";
		print "<td width='16' align='center'><a href='./?n=user_pr&&view=$row[unama]'><img src='./misc/user.png'></a></td>";
		print "<td width='16' align='center'><a href='./?n=user_ed&&view=$row[unama]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $row[unama] ?'); if (ok) return true; else return false\" href=./?n=user_ed&&delete=$row[uid]><img src='./misc/delete.gif'></a></td>"; 
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
		print "<a href='./?n=user_reg'><button name='editsubmit' class='btn' tabindex='18'>&nbsp;Tambah Pengguna Baru&nbsp;</button></a>";
?>