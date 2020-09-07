	<div class="title-content">Daftar Event</div>
	<div id="border">
	<div id="MidPan">
		<div class="m2Pan">
	<div class='cleared'></div>
	<?php
	$tsql = "SELECT COUNT(roid) FROM rotor";
    $stmt = mysql_query($tsql, $dbconn);
	
    $rowsReturned = mysql_fetch_array($stmt);
    if($rowsReturned === false) {
        echo "Terjadi kesalahan eksekusi query...";
    } elseif($rowsReturned[0] == 0) {
	    echo "Data kososng...";
    } else {
	    echo "Halaman : ";
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
	}
    print "<hr>";

	$tsql2 = "SELECT * FROM rotor ORDER BY roid DESC LIMIT $dataPerPage OFFSET $offset";
    $stmt2 = mysql_query($tsql2, $dbconn);
    
		print "<table cellpadding=5 cellspacing=1 style='border:solid 0px #999'>";
		
		if (!empty($_GET['n']) && ($_GET['n']=="rotorlist" || $_GET['rl']==1)) {
		   $no=0;
		} else {
		   $no=$dataPerPage*$_GET['rl']-$dataPerPage;
		}
		
		while ($row=mysql_fetch_array($stmt2)){
		$no++		
?>
		<tr>
		<td width='30' align='center' valign='top'><?php print $no."."; ?></td>
		<td width='115'>
		   <div align='left' valign='top'>
		   <?php print "<a href='./?n=rotor&rn=$row[roid]'><img src='./admin/images/$row[roimg]' title='$row[rotitel]' width='250' ></a>";?>
		   </div>
		</td>
		</tr>
<?php
		}
?>
		</table>
		</div>
	</div>
	</div>