<style type="text/css">
.best{position: absolute;width: 32px;height:32px;background-image: url('misc/BestSeller.gif');}
</style>
<?PHP
if ((isset($_SESSION['logg3dAdm1n'])) and ($_SESSION['role']==1)){	
	if(isset($_POST['submit'])){
		if (empty($_POST['bnama']))		{$mss_enama="*";}
		if (empty($_POST['bharga']))	{$mss_eemail="*";}
		if (empty($_POST['kategori']))	{$mss_ephone="*";}
		if (empty($_POST['kproduk']))	{$mss_eproduk="*";}
		if (empty($_POST['uploadedfile']))	{$_POST['uploadedfile']='';}
		
		if (!empty($_POST['bnama']) && !empty($_POST['bharga'])&& !empty($_POST['kategori'])&& !empty($_POST['kproduk'])){
			barang_UPDATE($_POST['bid'],$_POST['fimg'],$_POST['uploadedfile'],$_POST['bnama'],$_POST['promo'],$_POST['bharga'],$_POST['kategori'],$_POST['kproduk'],$_POST['bests'],$_POST['bcatatan'],$_POST['bukuran']);
		}
	}
	else if(!empty($_GET['delete'])){
			barang_HAPUS($_GET['delete']);
	} 
	else if(isset($_POST['cancel'])){
	?>
		<script type="text/javascript">
			TO_BARANG();
		</script>
	<?php
	};	

	?>
	<?php
		if (!empty($_GET['edit']) && $_GET['edit']<>''){
		   $bid=$_GET['edit'];
		}	else {
		   $bid=$_POST['bid'];
		}
		$qrytot=mysql_query("SELECT COUNT(*) as totbrg 
		                               FROM barang a, produk b, menu c 
						               WHERE a.prnama=b.prnama AND a.parent_id=c.mid AND c.mclass='h' AND a.bid='$bid'", $dbconn);						
		$rowtot = mysql_fetch_array($qrytot);
		$totbrg = $rowtot['totbrg'];
		if ($totbrg<>0) {
		$qry=mysql_query("SELECT barang.*,produk.*,menu.* FROM barang,produk,menu 
						WHERE barang.prnama=produk.prnama AND barang.parent_id=menu.mid AND mclass='h' AND barang.bid='$bid'", $dbconn);						
		$row=mysql_fetch_array($qry);
	?>
<form enctype="multipart/form-data" action="?n=barang_ed" method="POST">	
<div class="title-content">Edit Data Barang "<?php print ($row['bnama']); ?>"</div>
<div id="border">
	<?php if ($row['bbes']==1){ ?><div class="best"></div> <?php } ?>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr><td rowspan='35' width='5'></td></tr>
		<tr><td colspan='4' height='10'></td></tr>
		<tr>
			<td colspan='2' rowspan='10' width='150'><?php print "<a href='./images/$row[bimg]'><img src=./images/$row[bimg] alt=$row[bnama] height='180'></a>";?> </td>
			<td><h3>&nbsp;Nama Barang</h3></td>
			<td>&nbsp;<input type="text" name="bnama" tabindex=1  size=15 maxlength=6 value="<?php print ($row['bnama']) ?>"></td>
		</tr>
		<tr>
			<td><h3>&nbsp;Harga Barang</h3></td>
			<td colspan='2'><h3>&nbsp;<input type='text' name='bharga' tabindex=1 size='26' maxlength='14' value="<?php print ($row['bharga'])?>"></h3></td>
		</tr>
		<tr>
			<td><h3>&nbsp;Ukuran</h3></td>
			<td colspan='2'><h3>&nbsp;<input type='text' name='bukuran' tabindex=1 size='26' maxlength='14' value="<?php print ($row['bukuran'])?>"></h3></td>
		</tr>
		<tr>
			<td><h3>&nbsp;Kategori</h3></td>
			<td colspan='2'>&nbsp;<select name='kategori' tabindex='2'>
				<option selected value="<?php print ($row['mid']) ?>"><?php print ($row['mtitel']) ?></option>
<?php
				$qrytot=mysql_query("SELECT COUNT(mid) as totmn FROM menu WHERE parent_id='0' AND mclass='h'", $dbconn);
				$rowtot = mysql_fetch_array($qrytot);
				$totmenu = $rowtot['totmn'];
				if ($totmenu>0) {
					$qryk=mysql_query("SELECT * FROM menu WHERE parent_id='0' AND mclass='h' ORDER BY mid", $dbconn);
					while ($rowk=mysql_fetch_array($qryk)){
						print '<option value="'.$rowk['mid'].'">'.$rowk['mtitel'].'</option>';
					}
				}
?>
				</select></td>
		</tr>
		<tr>
			<td><h3>&nbsp;Merk</h3></td>
			<td colspan='2'>&nbsp;<select name='kproduk' tabindex='3'>
				<option selected value="<?php print ($row['prnama']) ?>"><?php print ($row['prket']) ?></option>
<?php
				$qrytot=mysql_query("SELECT COUNT(prid) as totprd FROM produk", $dbconn);
				$rowtot = mysql_fetch_array($qrytot);
				$totprd = $rowtot['totprd'];
				if ($totprd>0) {
				    $qryp=mysql_query("SELECT * FROM produk ORDER BY prnama", $dbconn);
					while ($rowp=mysql_fetch_array($qryp)){
						print '<option value="'.$rowp['prnama'].'">'.$rowp['prket'].'</option>';
					}
				}
?>
				</select></td>
		</tr>
		
		<tr>
			<td height='10'><b>&nbsp;Gambar&nbsp;</b></td>
			<td height='20'>&nbsp;<input name="uploadedfile" type="file" size='14' tabindex='6'>&nbsp;</td>
		</tr>
		<tr>
			<td height='10'><b>&nbsp;Produk Diskon&nbsp;</b></td>
			<td height='20'>&nbsp;<select name="promo">
				<option value="<?php print $row['butama'] ?>"><?php if ($row['butama']==0){print "TIDAK";}else{print "YA";} ?></option>
				<option value="0">TIDAK</option>
				<option value="1">YA</option></select>
			</td>
		</tr>
		<tr>
			<td height='10'><b>&nbsp;Best Seller&nbsp;</b></td>
			<td height='20'>&nbsp;<select name="bests">
				<option value="<?php print $row['bbes'] ?>"><?php if ($row['bbes']==0){print "TIDAK";}else{print "YA";} ?></option>
				<option value="0">TIDAK</option>
				<option value="1">YA</option></select>
			</td>
		</tr>
		<tr>
			<td height='10'><b>&nbsp;Catatan/Deskripsi&nbsp;</b></td>
			<td height='20' rowspan=2>&nbsp;<textarea name='bcatatan' tabindex=6 rows='5' cols='30'><?php print $row['bcatatan'] ?></textarea>&nbsp;</td>
		</tr>
		<tr>
			<td colspan='3' height=10>
			<input name='bid' type='hidden' value="<?php print $bid ?>">
			<input name='fimg' type='hidden' value="<?php print $row['bimg'] ?>">
			</td>
		</tr>
		<tr>
			<td width='200' align='left'>
			<button name='submit' class='btn'>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
			<button name='cancel' class='btn'>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button>
		</td>
		<tr><td colspan='3' height=10></td></tr>
	</table>
</div>
	<?php
	}
	else {
		empty_PAGE();
	}
	?>
</form>
<?php
	}
?>