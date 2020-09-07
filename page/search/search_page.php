<style type="text/css">
#m-border{float: left;width: 200px;	margin:5px 0 0 5px;	border:solid 1px #b72c24;}
.r_img				{float: left;margin:5px 10px 2px 5px;}
</style>
<div class="title-content">Hasil Pencarian "<?php print $_POST['search']; ?>"</div>
<div id="border">
	<div class='m-content'>
	<?php
	if (isset($_POST['search'])){
		$bnama = $_POST['search'];
		if (!empty($_POST['search']))   {
		$qrytot=mysql_query("SELECT COUNT(bid) as totbrg FROM barang WHERE bnama LIKE '%$bnama%'", $dbconn);
		$rowtot = mysql_fetch_array($qrytot);
		$total = $rowtot['totbrg'];
		
		if ($total>0) {
		$qry=mysql_query("SELECT * FROM barang WHERE bnama LIKE '%$bnama%' order by bid desc", $dbconn);
		while($row=mysql_fetch_array($qry)){
		?>
		<div id="m-border">
		<div class="title-mcontent"><img src='./misc/mm.png' alt='mm' width='9'> <?php print $row['bnama'] ?></div>
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
		}else {print "Maaf sementara barang yang anda maksut kosong.";}
		}else {print "Silakan masukkan beberapa kata kunci.";}
	}
	?>
	<div class='cleared'></div>
	<hr>
	</div>
</div>