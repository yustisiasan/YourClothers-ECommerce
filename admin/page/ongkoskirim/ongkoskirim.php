	<div class="title-content">Daftar Ongkos Kirim</div>
	<div id="border">
	<div id="MidPan">
	<div class='cleared'></div>
	Halaman : 
	<?php
	    $dataPerPage =5;
		if(isset($_REQUEST['ok'])){
			$noPage = $_REQUEST['ok'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['ok'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;		
		
		$query  = mysql_query("SELECT COUNT(konama) as idko FROM kota", $dbconn);
				
		$data   = mysql_fetch_array($query);
		$jumData = $data['idko'];
		$jumPage = ceil($jumData/$dataPerPage);
		// menampilkan link previous
		if ($_REQUEST['ok'] > 1) echo  "<a href='?ok=".($_REQUEST['ok']-1)."'>[Prev]</a>";
		// memunculkan nomor halaman dan linknya
		for($page = 1; $page <= $jumPage; $page++) {
         if ((($page >= $_REQUEST['ok'] - 2) && ($page <= $_REQUEST['ok'] + 2)) || ($page == 1) || ($page == $jumPage)) {   
            if (($noPage == 1) && ($page != 2))  echo "..."; 
            if (($noPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $_REQUEST['ok']) echo "<b>".$page."</b> ";
            else echo " <a href='?ok=".$page."'>".$page."</a> ";
            $noPage = $page;          
         }
		}
		if(isset($_REQUEST['ok'])){
			$noPage = $_REQUEST['ok'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['ok'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;
		//menampilkan link next
		if ($noPage < $jumPage) echo "<a href='?ok=".($_REQUEST['ok']+1)."'>[Next]</a>";
	
    print "<hr>";
    $tsql2 = "SELECT * FROM kota ORDER BY konama LIMIT $dataPerPage OFFSET $offset";
    $stmt2 = mysql_query($tsql2, $dbconn);
?>	
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>NO.</h3></div></td>
		<td width='114'><div align='center'><h3>Kota</h3></div></td>
		<td width='114'><div align='center'><h3>Ongkos kirim</h3></div></td>
		<td width='16'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		//$qry=sqlsrv_query($dbconn, "SELECT * FROM kota ORDER BY konama");		  
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		if (!empty($_GET['n']) && ($_GET['n']=="okrmmenu" || $_GET['ok']==1)) {
		   $no=0;
		} else {
		   $no=$dataPerPage*$_GET['ok']-$dataPerPage;
		}
		while ($row=mysql_fetch_array($stmt2)){
		$no++;		
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#6C91C0';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#ddd';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
		<td width='115'><div align='left'>&nbsp;<?php print $row['konama']?></div></td>
		<td width='114'><div align='center'>&nbsp;<?php print number_format($row['koongkos'])?></div></td>
		<?php
		print "<td width='16' align='center'><a href='./?n=okrmmenu_ed&&edit=$row[konama]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $row[konama] ?'); if (ok) return true; else return false\" href=./?n=okrmmenu_ed&&delete=$row[konama]><img src='./misc/delete.gif'></a></td>"; 
		
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
		print "<a href='./?n=okrmmenu_add'><button name='editsubmit' class='btn' tabindex='18'>&nbsp;&nbsp;Tambah Data Baru&nbsp;&nbsp;</button></a>";
?>