<?php
include './././includes/database.php';
?>
<style type="text/css">
#m-border{float: left;width: 200px;	margin:5px 0 0 5px;	border:solid 1px #b72c24;}
.r_img				{float: left;margin:5px 10px 2px 5px;}
.best{position: absolute;width: 32px;height:32px;background-image: url('misc/BestSeller.gif');}
</style>
<div class="title-content">Daftar Produk</div>
<div id="border">
	<div class='m-content'>
	<div class='cleared'></div>
	Halaman: <?php	
		$dataPerPage =9;
		if(isset($_REQUEST['pageNum'])){
			$noPage = $_REQUEST['pageNum'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['pageNum'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;		
		
		$query  = mysql_query("SELECT COUNT(bid) as idb FROM barang", $dbconn);
				
		$data   = mysql_fetch_array($query);
		$jumData = $data['idb'];
		$jumPage = ceil($jumData/$dataPerPage);
		// menampilkan link previous
		if ($_REQUEST['pageNum'] > 1) echo  "<a href='?pageNum=".($_REQUEST['pageNum']-1)."'>[Prev]</a>";
		// memunculkan nomor halaman dan linknya
		for($page = 1; $page <= $jumPage; $page++) {
         if ((($page >= $_REQUEST['pageNum'] - 2) && ($page <= $_REQUEST['pageNum'] + 2)) || ($page == 1) || ($page == $jumPage)) {   
            if (($noPage == 1) && ($page != 2))  echo "..."; 
            if (($noPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $_REQUEST['pageNum']) echo "<b>".$page."</b> ";
            else echo " <a href='?pageNum=".$page."'>".$page."</a> ";
            $noPage = $page;          
         }
		}
		if(isset($_REQUEST['pageNum'])){
			$noPage = $_REQUEST['pageNum'];
		}  else {
		   $noPage = 0;
		   $_REQUEST['pageNum'] = 1;
		}
		$offset =($noPage - 1) * $dataPerPage;
		//menampilkan link next
		if ($noPage < $jumPage) echo "<a href='?pageNum=".($_REQUEST['pageNum']+1)."'>[Next]</a>";
	
    print "<hr>";
    $tsql2 = "SELECT * FROM barang ORDER BY bid DESC LIMIT $dataPerPage OFFSET $offset";
    $stmt2 = mysql_query($tsql2, $dbconn);
	
	while($row=mysql_fetch_array($stmt2)){
	?>
	    <div id="m-border">
	      <div class="title-mcontent"><img src='./misc/mm.png' alt='mm' width='9'> <?php print $row['bnama'] ?></div>
	      <?php if ($row['bbes']==1){ ?><div class="best"></div> <?php } ?>
	      <table border="0" cellpadding="0" cellspacing="0" class="imgleft">
		  <tr>
			<td rowspan='4'><?php print "<img src=./admin/images/$row[bimg] alt=$row[bnama] height='80'class='m-img'>";?> </td>
			<td>Harga :</td>
		  </tr>
		  <tr><td colspan='2'><h3><?php print "Rp.".number_format($row['bharga']) ?> </h3></td></tr>
		  <tr><td colspan='2'><h5><?php print "<a href='./?n=detail&&bid=$row[bid]'>More Info...</a>" ?> </h5></td></tr>
		  <tr><td colspan='2'><?php print "<a href='./?n=cart_reg&&bid=$row[bid]'><img src=./misc/BuyNow.gif height='22'></a>" ?></td></tr>
	      </table>
	   </div>
	<?php	
	} 
	?>
	<div class='cleared'></div>
	<hr>
	</div>
</div>