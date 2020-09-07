<style type="text/css">
.right{
	width:100%;
	margin-right:0px;
}
.best{position: absolute;width: 32px;height:32px;background-image: url('misc/BestSeller.gif');}
</style>
<div class="title-content">Detail Barang</div>
<div id="border">
	<?php
		$bid=$_GET['bid'];
		$qrytot=mysql_query("SELECT COUNT(bid) as totbrg FROM barang WHERE bid='$bid'", $dbconn);
		$rowtot = mysql_fetch_array($qrytot);
		$total = $rowtot['totbrg'];
		
		$qry=mysql_query("SELECT * FROM barang WHERE bid='$bid'", $dbconn);
		$row=mysql_fetch_array($qry);
		if ($total>0) {
			print "<div class='title-mcontent'><img src='./misc/mm.png' alt='mm' width='9'> $row[bnama]</div>";
			?>
			<?php if ($row['bbes']==1){ ?><div class="best"></div> <?php } ?>
			<table border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan='2' rowspan='7' width='150'><?php print "<div class='m-img'><a href='./images/$row[bimg]'><img src=./images/$row[bimg] alt=$row[bnama] height='180'></a></div>";?></td>
					<td><h3></h3></td>
				</tr>
				<tr><td><h3>Harga :</h3></td>					</tr>
				<tr><td><h3><?php print "Rp. ".number_format($row['bharga']) ?> </h3></td></tr>
				<tr><td colspan='2'>&nbsp;</td></tr>
				<tr><td><h3>Ukuran:</h3><?php print $row['bukuran'] ?></td></tr>
				<tr><td align='justify'><h3>Catatan/Deskripsi :</h3><?php print $row['bcatatan'] ?></td></tr>
				<tr><td height='60'></td></tr>
			</table>
			<?php
			$prnama=array("0","1","2","3","4","5","6","7","8","9");
			$prnama1=str_replace($prnama, "", $row['bnama']);
			if ($prnama1<>''){
			?>
			
				<tr>
					<td colspan='3' height=10></td>
				</tr>
				<tr>	
					<td colspan='3'><?php print "[<a href='./?n=barang_ed&edit=$row[bid]'><img src='./misc/edit.gif'></a>]&nbsp;[<a onclick=\"return confirm('Anda yakin akan menghapus $row[bnama] ?'); if (ok) return true; else return false\" href=./?n=barang_ed&delete=$row[bid]><img src='./misc/delete.gif'></a>]"?></td>
				</tr>
			</table>
			<?php	
			}
			print "<div class='cleared'></div>";		
		}
	?>
</div>
<img src='./misc/back.gif' alt='mb' width='5'> <a href="index.php" style="color:#b72c24" onmouseover="this.style.color='#b72c24'" 
			onmouseout="this.style.color='#b72c24'">Back</a>