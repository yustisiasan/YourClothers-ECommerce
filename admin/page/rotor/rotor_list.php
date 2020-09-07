	<div class="title-content">Daftar Event</div>
	<div id="border">
	<div id="MidPan">
	<div class='cleared'></div>
	Halaman: 
	<?php	
		$dataPerPage =3;
		if(isset($_REQUEST['rl'])){
			$noPage = $_REQUEST['rl'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['rl'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;		
		
		$query  = mysql_query("SELECT COUNT(roid) as idro FROM rotor", $dbconn);
				
		$data   = mysql_fetch_array($query);
		$jumData = $data['idro'];
		$jumPage = ceil($jumData/$dataPerPage);
		// menampilkan link previous
		if ($_REQUEST['rl'] > 1) echo  "<a href='?rl=".($_REQUEST['rl']-1)."'>[Prev]</a>";
		// memunculkan nomor halaman dan linknya
		for($page = 1; $page <= $jumPage; $page++) {
         if ((($page >= $_REQUEST['rl'] - 2) && ($page <= $_REQUEST['rl'] + 2)) || ($page == 1) || ($page == $jumPage)) {   
            if (($noPage == 1) && ($page != 2))  echo "..."; 
			if (($noPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $_REQUEST['rl']) echo "<b>".$page."</b> ";
            else echo " <a href='?rl=".$page."'>".$page."</a> ";
            $noPage = $page;          
         }
		}
		if(isset($_REQUEST['rl'])){
			$noPage = $_REQUEST['rl'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['rl'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;
		//menampilkan link next
		if ($noPage < $jumPage) echo "<a href='?rl=".($_REQUEST['rl']+1)."'>[Next]</a>";
	
    print "<hr>";	
	$tsql2 = "SELECT * FROM rotor ORDER BY roid DESC LIMIT $dataPerPage OFFSET $offset";
    $stmt2 = mysql_query($tsql2, $dbconn);
?>	
		<div class="m1Pan">
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>No.</h3></div></td>
		<td width='300'><div align='center'><h3>Gambar</h3></div></td>
		<td width='200'><div align='center'><h3>Titel</h3></div></td>
		<td width='35'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
		print "<table cellpadding=1 cellspacing=1 style='border:solid 0px #999'>";
		if (!empty($_GET['n']) && ($_GET['n']=="rotorlist" || $_GET['rl']==1)) {
		   $no=0;
		} else {
		   $no=$dataPerPage*$_GET['rl']-$dataPerPage;
		}
		while ($row=mysql_fetch_array($stmt2)){
		$no++;	
?>
		<tr height="25px" bgcolor="#F8F8F8" 
			onmouseover="this.style.backgroundColor='#b72c24';this.style.color='#fff'" 
			onmouseout="this.style.backgroundColor='#ddd';this.style.color='#000'">
		<td width='30' align='center'><?php print $no ?></td>
		<td width='115' valign="middle" align="center"><?php print "<img src='./images/$row[roimg]' alt=$row[roimg] width='300' >"?></td>
		<?php
		print "<td width='200' align='left'><b>$row[rotitel]</b><hr>".substr($row['rokonten'],0,100)."...</td>";
		print "<td width='18' align='center'><a href='./?n=rotor_ed&&roid=$row[roid]'><img src='./misc/edit.gif'></a></td>";
		print "<td align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $row[rotitel] ?'); if (ok) return true; else return false\" href=./?n=rotor_ed&&delete=$row[roid]><img src='./misc/delete.gif'></a></td>"; 
		?>
		</tr>
<?php
		}
?>
		</table>
		</div>
		<hr>
	</div>
	</div>
<?php
		print "<a href='./?n=rotoradd'><button name='submit' class='btn' tabindex='18'>&nbsp;&nbsp;Tambah Event Baru&nbsp;&nbsp;</button></a>";
?>