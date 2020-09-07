<div class="title-content">Buku Tamu</div>
<div id="border">
<div class='m-content'>
<?php 
	if(isset($_POST['dtsubmit'])){
		if(isset($_POST['dtid'])){
			$dtid=$_POST['dtid'];
			$qry=mysql_query("DELETE FROM btamu WHERE btid='$dtid'", $dbconn);
		}
	}
?>
<?php
	echo "Halaman : ";
		$dataPerPage =2;
		if(isset($_REQUEST['bt'])){
			$noPage = $_REQUEST['bt'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['bt'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;		
		
		$query  = mysql_query("SELECT COUNT(btid) as idbt FROM btamu", $dbconn);
				
		$data   = mysql_fetch_array($query);
		$jumData = $data['idbt'];
		$jumPage = ceil($jumData/$dataPerPage);
		// menampilkan link previous
		if ($_REQUEST['bt'] > 1) echo  "<a href='?bt=".($_REQUEST['bt']-1)."'>[Prev]</a>";
		// memunculkan nomor halaman dan linknya
		for($page = 1; $page <= $jumPage; $page++) {
         if ((($page >= $_REQUEST['bt'] - 2) && ($page <= $_REQUEST['bt'] + 2)) || ($page == 1) || ($page == $jumPage)) {   
            if (($noPage == 1) && ($page != 2))  echo "..."; 
            if (($noPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $_REQUEST['bt']) echo "<b>".$page."</b> ";
            else echo " <a href='?bt=".$page."'>".$page."</a> ";
            $noPage = $page;          
         }
		}
		if(isset($_REQUEST['bt'])){
			$noPage = $_REQUEST['bt'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['bt'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;
		//menampilkan link next
		if ($noPage < $jumPage) echo "<a href='?bt=".($_REQUEST['bt']+1)."'>[Next]</a>";
		
	print "<hr>";
	/* Order target data by ID and select only items (by row number) to display on a given page. */
    $tsql2 = "SELECT * FROM btamu ORDER BY btid DESC LIMIT $dataPerPage OFFSET $offset";
    $stmt2 = mysql_query($tsql2, $dbconn);
    
	if (mysql_num_rows($stmt2)>0) {
	   while($row=mysql_fetch_array($stmt2)){
	?>
	<form method="POST" action="?n=btamu" >
	<table border="0" cellpadding="0" cellspacing="0" class="btamu">
		<tr><td><B>Form :&nbsp;</B><?php print $row['btnama'] ?></td></tr>
		<tr><td><h5>&nbsp;<?php print $row['btdtime'] ?></h5></td></tr>
		<tr><td>&nbsp;<?php print $row['btcontent'] ?></td></tr>
		<tr>
			<td width='570'><i>Website </i>:&nbsp;<?php print "<a href='http://$row[btweb]/'>$row[btweb] </a>"?><hr></td>
			<td align='right'><input type="submit" name="dtsubmit" tabindex='1' value="Delete" />
				<input name='dtid' type='hidden' value="<?php print $row['btid'] ?>">
			</td>
		</tr>
	</table>
<?php
	   } 
	} else {
	?>
		<table border="0" cellpadding="0" cellspacing="0" class="btamu">
		<tr><td colspan='2'><h3>Buku tamu masih kosong...</td></tr>
		</table>
	<?php
	}?>
	<div class="cleared"></div>
</div>
</div>