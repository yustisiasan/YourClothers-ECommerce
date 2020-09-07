<?php
include './././includes/database.php';
?>
<style type="text/css">
#m-border{float: left;width: 200px;	margin:5px 0 0 5px;	border:solid 1px #b72c24;}
.r_img				{float: left;margin:5px 10px 2px 5px;}
.best{position: absolute;width: 32px;height:32px;background-image: url('misc/BestSeller.gif');}
</style>
<?php
if(isset($_GET['mp'])){
	$prnama=strtolower(ltrim($_GET['mp'],"0,1,2,3,4,5,6,7,8,9"));
	$parent_id=str_replace("$prnama", " ", $_GET['mp']);
	
	if ($prnama=='home'){
	?>
		<script type="text/javascript">TO_INDEX();</script>
	<?php
	} else {
	$qrytot="SELECT COUNT(bid) as total FROM barang WHERE parent_id='$parent_id' AND prnama='$prnama'";
	$hsltot=mysql_query($qrytot, $dbconn);
	$rowbrg = mysql_fetch_array($hsltot);
	$totbarang = $rowbrg["total"];
	
	if ($totbarang<>0) {
	$qrymerk = mysql_query("SELECT prket FROM produk WHERE prnama='$prnama'",$dbconn);
	$hslmerk = mysql_fetch_array($qrymerk);
	$rowmerk = $hslmerk['prket'];
	?>
	<div class="title-content">Produk Merk "<?php print $rowmerk; ?>"</div>
	<div id="border">
	<div class='m-content'>
	<?php
	$qry = "SELECT * FROM barang WHERE parent_id='$parent_id' AND prnama='$prnama' ORDER BY bid DESC";
	$hslqry=mysql_query($qry, $dbconn);
	
	while($row=mysql_fetch_array($hslqry)){
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
	</div>
</div>
	<?php
	} else {
		empty_PAGE();
	}
	}
}
?>