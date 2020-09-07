<style type="text/css">
.best{position: absolute;width: 32px;height:32px;background-image: url('misc/BestSeller.gif');}
</style>
	<div class="title-content">Daftar Barang</div>
	<div id="border">
	<div id="MidPan">
		<div class="m1Pan">
Halaman: <?php	
		$dataPerPage = 5;
		if(isset($_REQUEST['bp'])){
			$noPage = $_REQUEST['bp'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['bp'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;		
		
		$query  = mysql_query("SELECT COUNT(bid) as idb FROM barang", $dbconn);
				
		$data   = mysql_fetch_array($query);
		$jumData = $data['idb'];
		$jumPage = ceil($jumData/$dataPerPage);
		// menampilkan link previous
		if ($_REQUEST['bp'] > 1) echo  "<a href='?bp=".($_REQUEST['bp']-1)."'>[Prev]</a>";
		// memunculkan nomor halaman dan linknya
		for($page = 1; $page <= $jumPage; $page++) {
         if ((($page >= $_REQUEST['bp'] - 2) && ($page <= $_REQUEST['bp'] + 2)) || ($page == 1) || ($page == $jumPage)) {   
            if (($noPage == 1) && ($page != 2))  echo "..."; 
            if (($noPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $_REQUEST['bp']) echo "<b>".$page."</b> ";
            else echo " <a href='?bp=".$page."'>".$page."</a> ";
            $noPage = $page;          
         }
		}
		if(isset($_REQUEST['bp'])){
			$noPage = $_REQUEST['bp'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['bp'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;
		//menampilkan link next
		if ($noPage < $jumPage) echo "<a href='?bp=".($_REQUEST['bp']+1)."'>[Next]</a>";
	
	print "<hr>";
?>		
		<table class='main' cellpadding=1 cellspacing=1 style="border:solid 1PX #999;color:#fff">
		<tr height="25px" bgcolor="#000">
		<td width='30'><div align='center'><h3>No.</h3></div></td>
		<td width='100'><div align='center'><h3>Gambar</h3></div></td>
		<td width='470'><div align='center'><h3>Informasi</h3></div></td>
		<td width='42'><div align='center'><h3>Aksi</h3></div></td>
		</tr>
		</table>
		</div>
		<div class="m2Pan">
<?php
	$tsql2 = "SELECT * FROM barang ORDER BY bid DESC LIMIT $dataPerPage OFFSET $offset";
    $stmt2 = mysql_query($tsql2, $dbconn);
	
		print "<table cellpadding=1 cellspacing=1 border='0'>";
		$no=0;
		while ($row=mysql_fetch_array($stmt2)){
		$no++;		
?>
		<tr height="25px">
		<td  bgcolor='#E8E8E8' width='30' rowspan=3 align='center'><?php print $no ?></td>
		<td width='100' rowspan=4 >
			<div align='left'><?php if ($row['bbes']==1){ ?><div class="best"></div> <?php } ?>
			&nbsp;<?php print "<a href='./images/$row[bimg]'><img src=./images/$row[bimg] alt=$row[bnama] height='85' class='m'></a>";?> </div>
		</td>
		<?php
			print "<td bgcolor='#E8E8E8' width='100' align='left'><h3>&nbsp;Nama</h3></td>";
			print "<td bgcolor='#E8E8E8' width='350' align='left'><b>$row[bnama]</b></td>";
			print "<td rowspan=4 width='18' align='center'><a href='./?n=barang_ed&&edit=$row[bid]'><img src='./misc/edit.gif'></a></td>";
			print "<td bgcolor='#E8E8E8' rowspan=4 align='center'><a onclick=\"return confirm('Anda yakin akan menghapus $row[bnama] ?'); if (ok) return true; else return false\" href=./?n=barang_ed&&delete=$row[bid]><img src='./misc/delete.gif'></a></td>"; ?>
		</tr>
		<tr bgcolor="#F8F8F8" width='450'>
			<td><h3>&nbsp;Harga</h3></td>
			<td><?php print "Rp. ".number_format($row['bharga']) ?></td>
		
		</tr>
		<tr bgcolor='#E8E8E8' width='450'>
			<td><h3>&nbsp;Deskripsi</h3></td>
			<td align="justify">
			   <?php 
			      echo substr($row['bcatatan'],0,150)."...<a href='./?n=detail&&bid=$row[bid]'><img src='./misc/bt_detail.gif' height='16'></a>";
			   ?></td>
		
		</tr>
		<tr>
			<td colspan=6><hr></td>
		</tr>
<?php
		}
?>
		</table>
		</div>
	</div>
	</div>
<?php
		print "<a href='./?n=barang_add'><button name='addsubmit' class='btn' tabindex='18'>&nbsp;&nbsp;Tambah Barang Baru&nbsp;&nbsp;</button></a>";
?>