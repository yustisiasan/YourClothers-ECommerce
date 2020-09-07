<?PHP
if ((isset($_SESSION['logg3dAdm1n'])) and ($_SESSION['role']==1)){	

	if(isset($_POST['bsave'])){
		if (empty($_POST['bnama']))		{$mess_bnama="*";}
		if (empty($_POST['bharga']))	{$mess_bharga="*";}
		if (empty($_POST['kategori']))	{$mess_kategori="*";}
		if (empty($_POST['produk']))	{$mess_produk="*";}
		
		if (!empty($_POST['bnama'])  && !empty($_POST['bharga'])&& !empty($_POST['kategori']) && !empty($_POST['produk'])){
			//--UPloade Foto--
			$target_path = "./images/";
			$target_path = $target_path . 'b_'.basename( $_FILES['uploadedfile']['name']); 
			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
				$fname= basename( $_FILES['uploadedfile']['name']);
				$bimg='b_'.$fname;
			} else{
				$mess_uploadedfile="*";	}
			/*---- QRY INSRET -----*/
			$qry =  mysql_query("INSERT INTO barang (bnama,butama,prnama,parent_id,bharga,bimg,bcatatan,bukuran)
								VALUES('$_POST[bnama]','$_POST[promo]','$_POST[produk]','$_POST[kategori]','$_POST[bharga]','$bimg','$_POST[bcatatan]','$_POST[bukuran]');", $dbconn);	
		?>
			<script type="text/javascript">
					 TO_BARANG();
			</script>
<?php
		}
	}
?>
<form enctype="multipart/form-data" action="?n=barang_add" method="POST">
<div class="title-content">Tambah Data Barang Baru</div>
<div id="border">
	<table border="0" cellpadding="0" cellspacing="0">
		<tr><td rowspan='34' width='5'></td></tr>
		<tr><td height='10'></td></tr>
		<tr>
			<td><h3>&nbsp;Nama Barang</h3></td>
			<td>&nbsp;<input type="text" name="bnama" tabindex=1  size=40 maxlength=45><?php if(!empty($mess_bnama)) { print $mess_bnama; } ?></td>
		</tr>
		<tr>
			<td><h3>&nbsp;Harga Barang</h3></td>
			<td>&nbsp;<input type="text" name="bharga" tabindex=1  size=26 maxlength=14><?php if(!empty($mess_bharga)) { print $mess_bharga; } ?></td>
		</tr>
		<tr>
			<td><h3>&nbsp;Ukuran</h3></td>
			<td colspan='2'>&nbsp;<input type='text' name='bukuran' tabindex=1 size='15' maxlength=14><?php if(!empty($mess_bukuran)) { print $mess_bukuran; } ?></td>
		</tr>
		<tr>
			<td><h3>&nbsp;Kategori</h3></td>
			<td colspan='2'>&nbsp;<select name='kategori' tabindex='2'>
				<option selected value=""></option>
				<?php
				$qryk=mysql_query("SELECT * FROM menu WHERE mclass='h' AND parent_id=0 AND murl<>'home' ORDER BY mid", $dbconn);
					while ($rowk=mysql_fetch_array($qryk)){
						print '<option value="'.$rowk['mid'].'">'.$rowk['mtitel'].'</option>';
					}
?>
				</select><?php if(!empty($mess_kategori)) { print $mess_kategori; } ?></td>
		</tr>
		<tr>
			<td><h3>&nbsp;Merk</h3></td>
			<td colspan='2'>&nbsp;<select name='produk' tabindex='3'>
				<option selected value=""></option>
<?php
				$qryp=mysql_query("SELECT * FROM produk ORDER BY prnama", $dbconn);
					while ($rowp=mysql_fetch_array($qryp)){
						print '<option value="'.$rowp['prnama'].'">'.$rowp['prket'].'</option>';
					}
?>
				</select><?php if(!empty($mess_produk)) { print $mess_produk; } ?></td>
		</tr>
		<tr>	
			<td><h3>&nbsp;Ukuran</h3></td>
			<td colspan='2'>&nbsp;<input type='text' name='bukuran' tabindex=4 size='26' maxlength='14' value=""></td></tr>
		<tr>
			<td height='10'><b>&nbsp;Gambar&nbsp;</b></td>
			<td height='20'>&nbsp;<input name="uploadedfile" type="file" size='14' tabindex='6'>&nbsp;<?php if(!empty($mess_uploadedfile)) { print $mess_uploadedfile; } ?></td>
		</tr>
		<tr>
			<td height='10'><b>&nbsp;Produk Diskon&nbsp;</b></td>
			<td height='20'>&nbsp;<select name="promo">
				<option value="0" selected>TIDAK</option>
				<option value="1">YA</option></select>
			</td>
		</tr>
		</tr>
		
			<td height='10'><b>&nbsp;Catatan/Deskripsi&nbsp;</b></td>
			<td height='20' rowspan=2>&nbsp;<textarea name='bcatatan' tabindex=6 rows='3' cols='30'></textarea>&nbsp;</td>
		</tr>
		
		<tr>
			<td colspan='3' height=10>
			<input name='bid' type='hidden' value="<?php print $bid ?>">
			<input name='fimg' type='hidden' value="<?php print $row['bimg'] ?>">
			</td>
		</tr>
		<tr>
			<td width='200' align='left'>
			&nbsp;<button name='bsave' class='btn'>&nbsp;&nbsp;Save&nbsp;&nbsp;</button>
			<a href='?n=barang'><button name='cacelsave' class='btn'>&nbsp;&nbsp;Cancel&nbsp;&nbsp;</button></a>
		</td></tr>
		<tr><td colspan='3' height=10></td></tr>
	</table>
</div>
</form>
<?php
}
?>