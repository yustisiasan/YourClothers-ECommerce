<?php
include './includes/database.php';

function  empty_PAGE(){
	echo "<div class='title-content'>Halaman tidak ditemukan</div>";
	echo "<div id='border'>";
	echo 	"<div class='m-content'>Halaman yang diminta  tidak  dapat  ditemukan.</div>";
	echo "</div>";
}

function  to_NN(){
?>
		<script language="javascript">
 			setTimeout('self.location.href ="./?n=node&&np=<?php print $_POST['nid']?>"');
		</script>	
<?php
}

function  user_LOGIN($lunama,$lpasswd){
	global $mss_bg;
	include './includes/database.php';
	$passwd=MD5($lpasswd);
	$qry=mysql_query("SELECT * FROM users WHERE unama='$lunama' and upasswd='$passwd'", $dbconn);	
	$row=mysql_fetch_array($qry);
	if ($lunama==$row['unama']){
		$_SESSION['logg3dAdm1n'] 	=MD5('21232f297a57a5a743894a0e4a801fc3');
		$_SESSION['unama'] 	=$lunama;
	    $_SESSION['role'] 	=$row['rid'];
	    $_SESSION['checkout']=$row['uid'];
	    $_SESSION['nama'] 	=$row['nama'];
	    $_SESSION['email'] 	=$row['email'];
	    $_SESSION['alamat'] =$row['alamat'];
	    $_SESSION['phone'] 	=$row['phone'];
	    $_SESSION['konama'] =$row['konama'];
?>
		<script type="text/javascript">
			TO_INDEX();
		</script>
		<?php
	}
	else {
		$mss_bg="background-color:#f8ea54";
	}
}

function user_UPDATE($unama,$nama,$roles,$email,$phone,$alamat,$passwd1,$passwd2,$hpasswd, $kota){
	global $rmss_epasswd,$rmss_remail;
	include './includes/database.php';
	if (($passwd1)<>($passwd2)){
		$rmss_epasswd=" * Password tidak sama!";
	}
	else {
		if (!empty($passwd1)){
			$passwd=MD5($passwd1);
		}
		else {$passwd=$hpasswd;}
		//--
		$target_path = "images/";
		$target_path = $target_path . 'u_'.basename( $_FILES['eimg']['name']); 
		if(move_uploaded_file($_FILES['eimg']['tmp_name'], $target_path)) {
		$fname= basename( $_FILES['eimg']['name']);
			$img='u_'.$fname;
		} else{$img=$_POST['himg'];}
			$qry = mysql_query("UPDATE users SET upasswd='$passwd',nama='$nama',rid='$roles',email='$email',phone='$phone',alamat='$alamat',uimg='$img', konama='$kota' WHERE unama='$unama'", $dbconn);
		?>
		<script type="text/javascript">
			TO_USER();
		</script>
		<?php
	}
}	
		
function user_REGISTER($unama,$passwd1,$passwd2,$nama,$email,$kota,$alamat,$phone){
	global $rmss_runama,$rmss_rpasswd,$rmss_remail;
	include './includes/database.php';
	$qry=mysql_query("SELECT COUNT(unama) as totuser FROM users WHERE unama='$unama'", $dbconn);
	$rowtot = mysql_fetch_array($qry);
	$totuser = $rowtot['totuser'];
	if ($totuser>=1) 	{
	   $rmss_runama=" * Username sudah ada!";
	} else {
		if (($passwd1)<>($passwd2))	{$rmss_rpasswd=" * Password tidak sama!";}
		else if (($passwd1)==($passwd2)){
			if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",$email)){
				$rmss_remail=" * Invalid email";
			} else {
				$passwd=MD5($passwd1);
				$qry = mysql_query("INSERT INTO users (rid,unama,upasswd,nama,email,konama,alamat,phone)
				VALUES('2','$unama','$passwd','$nama','$email','$kota','$alamat','$phone')", $dbconn);	
		?>
		        <script type="text/javascript">
			       TO_USER();
		        </script>
		<?php
			}	
		}
	}
}

function user_HAPUS($uid){
    include './includes/database.php';     
		$qry=mysql_query("DELETE FROM users WHERE uid='$uid'", $dbconn);	
		?>
		<script type="text/javascript">
			TO_USER();
		</script>
		<?php
}

function role_UPDATE($rid,$rnama){	
        include './includes/database.php';
		$qry = mysql_query("UPDATE roles SET rnama='$rnama' WHERE rid='$rid'", $dbconn);
		//exit;
		?>
		<script type="text/javascript">
			TO_ROLE();
		</script>
		<?php
}
function kota_ADD($rid,$mnama){
	global $mss_ridkt;
	include './includes/database.php';
	$qry1=mysql_query("SELECT * FROM kota WHERE konama='$rid' ORDER BY konama", $dbconn);
	if (mysql_num_rows($qry1)>=1) 	{$mss_ridkt=" * Kota sudah ada!";}
	else {
	$qry = mysql_query("INSERT INTO kota (konama,koongkos)
	VALUES('$rid','$mnama');" );	
		?>
	<script type="text/javascript">
		TO_OKR();
	</script>
	<?php
	}
}
function kota_UPDATE($rid,$rnama){	
        include './includes/database.php';
		$qry = mysql_query("UPDATE kota SET koongkos='$rnama' WHERE konama='$rid'", $dbconn);
		//exit;
		?>
		<script type="text/javascript">
			TO_OKR();
		</script>
		<?php
}
function kota_HAPUS($rid){
        include './includes/database.php';
		$qry=mysql_query("DELETE FROM kota WHERE konama='$rid'", $dbconn);	
		//exit;
		?>
		<script type="text/javascript">
			TO_OKR();
		</script>
		<?php
}
function menu_ADDk($mnama){
    include './includes/database.php';
	$murl=strtolower($mnama);
	$qry1=mysql_query("SELECT * FROM menu WHERE mclass='h' AND parent_id='0' ORDER BY morder DESC", $dbconn);
	$row=mysql_fetch_array($qry1);
	$morder=1+$row['morder'];
	$qry = mysql_query("INSERT INTO menu (mclass,parent_id,mtitel,murl,morder)
	VALUES('h','0','$mnama','$murl','$morder');", $dbconn);	
	//exit;
	?>
	<script type="text/javascript">
		TO_HMENU();
	</script>
	<?php

}		
		
function menu_ADD($mmid,$moid,$mnama){
    include './includes/database.php';
	$murl=strtolower($mnama);
	$murl= str_replace(" ", "_",$murl);
	$qry1=mysql_query("SELECT * FROM menu WHERE mclass='$mmid' AND parent_id='$moid' ORDER BY morder DESC", $dbconn);
	$row=mysql_fetch_array($qry1);
	$morder=1+$row['morder'];
	$qry = mysql_query("INSERT INTO menu (mclass,parent_id,mtitel,murl,morder) VALUES('$mmid','$moid','$mnama','$murl','$morder');", $dbconn);	
	//---
	if ($mmid=='h'){
	$qrytot= mysql_query("SELECT COUNT(prid) as totprd FROM produk WHERE prnama='$murl'");
	$rowtot = mysql_fetch_array($qrytot);
	$total = $rowtot['totprd'];
	
	$qry1= mysql_query("SELECT * FROM produk WHERE prnama='$murl'");
	if ($total==0) {
		$qry = mysql_query("INSERT INTO produk (prnama,prket) VALUES('$murl','$mnama');", $dbconn);
	}
	?>
	<script type="text/javascript">
		TO_HMENU();
	</script>
	<?php
	}
	else {
	?>
	<script type="text/javascript">
		TO_NPAGE();
	</script>
	<?php
	}
}
	
function  menu_UPDATE($mmid,$mid,$mnama){
        include './includes/database.php';
		$qry = mysql_query("UPDATE menu SET mtitel='$mnama' WHERE mid='$mid'", $dbconn);
		$qry1= mysql_query("SELECT * FROM menu WHERE mid='$mid'", $dbconn);
		$row=mysql_fetch_array($qry1);
		$qry = mysql_query("UPDATE produk SET prket='$mnama' WHERE prnama='$row[murl]'", $dbconn);
		if ($mmid=='v'){
		?>
		<script type="text/javascript">
			TO_VMENU();
		</script>
		<?php
		}
		else {
		?>
		<script type="text/javascript">
			TO_HMENU();
		</script>
		<?php
		}
}	

function  menu_HAPUS($mmid,$mid){
        include './includes/database.php';
		$qry1= mysql_query("SELECT * FROM menu WHERE mid='$mid'", $dbconn);
		$row=mysql_fetch_array($qry1);
		$qry = mysql_query("DELETE FROM produk WHERE prnama='$row[murl]'", $dbconn);
		$qry = mysql_query("DELETE FROM menu WHERE mid='$mid'", $dbconn);	
        //exit;		
		if ($mmid=='v'){
		?>
		<script type="text/javascript">
			TO_VMENU();
		</script>
		<?php
		} else {
		?>
		<script type="text/javascript">
			TO_HMENU();
		</script>
		<?php
		}
}

function barang_UPDATE ($bid,$fimg,$uploadedfile,$bnama,$promo,$bharga,$kategori,$kproduk,$bgaransi,$bests,$bcatatan,$splayar,$spukuran,$spberat,	
			$spjaringan,$spgprs,$spdownload,$spbicara,$spwap,$spsmsmms,$spinfrared,$spbluetooth,$springtone,
			$spphonebook,$sphandsfree,$spjavaenabled,$spkamera,$sp3g,$sphsdpa){
			include './includes/database.php';
			
			$target_path = "./images/";
			$target_path = $target_path . 'b_'.basename( $_FILES['uploadedfile']['name']); 
			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			$fname= basename( $_FILES['uploadedfile']['name']);
				$bimg='b_'.$fname;
			} else{
				$bimg=$fimg;
			}
			
			$qry_up=mysql_query("UPDATE barang SET bnama='$bnama',butama='$promo',prnama='$kproduk',parent_id='$kategori',bharga='$bharga',
					bimg='$bimg',bcatatan='$bcatatan',bgaransi='$bgaransi',bbes='$bests',splayar='$splayar',spukuran='$spukuran',
					spberat='$spberat',spjaringan='$spjaringan',spgprs='$spgprs',spdownload='$spdownload',
					spbicara='$spbicara',spwap='$spwap',spsmsmms='$spsmsmms',spinfrared='$spinfrared',spbluetooth='$spbluetooth',
					springtone='$springtone',spphonebook='$spphonebook',sphandsfree='$sphandsfree',spgame='$_POST[spgame]',
					spjavaenabled='$spjavaenabled',spkamera='$spkamera',sp3g='$sp3g',sphsdpa='$sphsdpa' WHERE bid='$_POST[bid]'", $dbconn);				
			?>
		<script type="text/javascript">
			TO_BARANG();
		</script>
		<?php		
}

function barang_HAPUS($bid){
        include './includes/database.php'; 
		$qry=mysql_query("DELETE FROM barang WHERE bid='$bid'", $dbconn);	
		//exit;
		?>
		<script type="text/javascript">
			TO_BARANG();
		</script>
		<?php
}
?>