<style type="text/css">
.d-slide     		{margin:5px;}
.r_kontent     		{ margin:0 5px 0 5px;width:90%;}
.best{position: absolute;width: 32px;height:32px;background-image: url('misc/BestSeller.gif');}
</style>
<?PHP
if ((isset($_SESSION['logg3dAdm1n'])) AND ($_SESSION['role']==1)){
?>
<div id="border-sd">
	<div id="m-right">
		<div class="title-vmenu">Produk Diskon</div>
		<div class="d-slide">
		<div class="lnws1">
	<?php
	$qry=mysql_query("SELECT * FROM barang WHERE butama<>0 ORDER BY butama", $dbconn);
			while ($row=mysql_fetch_array($qry)){
				?>
				<table border="0" cellpadding="0" cellspacing="0" class="imgleft">
					<tr>
						<td rowspan='5'><?php if ($row['bbes']==1){ ?><div class="best"></div> <?php } ?><?php print "<img src=./images/$row[bimg] title='$row[bnama]' height='90' class='m-img'>";?> </td>
						<td>Harga :</td>
					</tr>
					<tr><td colspan='2'><h3><?php print "Rp.".number_format($row['bharga']) ?> </h3></td></tr>
					<tr><td colspan='2'><?php print $row['bnama'] ?></tr>
					<tr><td colspan='2'><h5><?php print "<a href='./?n=detail&&bid=$row[bid]'>More Info...</a>" ?> </h5></td></tr>
					<tr><td height='20'></td></tr>
				</table>
	<?php
			}
	?>
		</div>
		</div>
	</div>
</div>
<?php
}
?>