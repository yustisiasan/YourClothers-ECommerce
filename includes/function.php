<?php 
include './././includes/database.php';

function  empty_PAGE(){
	echo "<div class='title-content'>Halaman tidak ditemukan</div>";
	echo "<div id='border'>";
	echo 	"<div class='m-content'>Halaman yang diminta  tidak  dapat  ditemukan.</div>";
	echo "</div>";
}

function  user_LOGIN($lunama,$lpasswd){
	global $mss_bg;
	include './././includes/database.php';
	$passwd=MD5($lpasswd);
	$qry=mysql_query("SELECT uid, rid, unama, upasswd, nama, email, alamat, phone, uimg, konama
                                FROM users WHERE unama='$lunama' and upasswd='$passwd'", $dbconn);	
	$row=mysql_fetch_array($qry);
	if ($lunama==$row['unama']){
		$_SESSION['loggedin'] 	=MD5('Y3s!OK');
		$_SESSION['unama'] 		=$lunama;
		$_SESSION['role'] 		=$row['rid'];
		$_SESSION['checkout'] 	=$row['uid'];
		$_SESSION['nama'] 		=$row['nama'];
		$_SESSION['email'] 		=$row['email'];
		$_SESSION['alamat'] 	=$row['alamat'];
		$_SESSION['phone'] 	    =$row['phone'];
		$_SESSION['konama'] 	=$row['konama'];
?>
		<script type="text/javascript">
			TO_INDEX();
		</script>
		<?php
	} else {
		$mss_bg="background-color:#f8ea54";
	}
}

function user_UPDATE($nama,$email,$phone,$alamat,$passwd1,$passwd2,$hpasswd){
	global $rmss_epasswd,$rmss_remail;
	include './././includes/database.php';
	if (($passwd1)<>($passwd2)){
		$rmss_epasswd=" * Password tidak sama!";
	} else {
		if (!empty($passwd1)){
			$passwd=MD5($passwd1);
		} else { $passwd=$hpasswd; }
		//--
		$target_path = "admin/images/";
		$target_path = $target_path . 'u_'.basename( $_FILES['eimg']['name']); 
		if(move_uploaded_file($_FILES['eimg']['tmp_name'], $target_path)) {
		$fname= basename( $_FILES['eimg']['name']);
			$img='u_'.$fname;
		} else{
		   $img=$_POST['himg'];
		}
		if (isset($img) && strlen($img)>=5) {
			$qry = mysql_query("UPDATE users SET upasswd='$passwd',nama='$nama',email='$email',phone='$phone',alamat='$alamat',uimg='$img' WHERE unama='$_SESSION[unama]'", $dbconn);
		} else {
			$qry = mysql_query("UPDATE users SET upasswd='$passwd',nama='$nama',email='$email',phone='$phone',alamat='$alamat' WHERE unama='$_SESSION[unama]'", $dbconn);
		}
		?>
		<script type="text/javascript">
			TO_USER();
		</script>
		<?php
	}
}	
		
function user_REGISTER($unama,$passwd1,$passwd2,$nama,$email,$kota,$alamat,$phone){
	global $rmss_runama,$rmss_rpasswd,$rmss_remail;
	include './././includes/database.php';
	
	$qry=mysql_query("SELECT count(uid) as totuser FROM users WHERE unama='$unama'", $dbconn);
	$rowuser = mysql_fetch_array($qry);
	$totuser = $rowuser['totuser'];
	if ($totuser>=1) {
	   $rmss_runama=" * Username sudah ada!";
	} else {
		if (($passwd1)<>($passwd2))	{$rmss_rpasswd=" * Password tidak sama!";}
		else if (($passwd1)==($passwd2)){
			if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",$email)){
				$rmss_remail=" * Invalid email";
			} else {
				$passwd=MD5($passwd1);
				$qry = mysql_query("INSERT INTO users (rid,unama,upasswd,nama,email,konama,alamat,phone)
				VALUES('2','$unama','$passwd','$nama','$email','$kota','$alamat','$phone');", $dbconn);	
				$_SESSION['loggedin'] 	=MD5('Y3s!OK');
				$_SESSION['unama'] 		=$unama;
				$_SESSION['role'] 		=2;
				//--
				$qry=mysql_query("SELECT uid FROM users WHERE unama='$unama'", $dbconn);
				$row=mysql_fetch_array($qry);
				$_SESSION['checkout'] =$row['uid'];
				//--
				if ($_GET['n']=='user_reg'){
				?>
					<script type="text/javascript">
						TO_INDEX();
					</script>
				<?php
				}  else if ($_GET['n']=='cart'){
				?>
					<script type="text/javascript">
						TO_CHOUT();
					</script>
				<?php
				}
			}	
		}
	}
}

function user_REGUP($nama,$kota,$alamat,$phone){
    include './././includes/database.php';
	$qry = mysql_query("UPDATE users SET nama='$nama',konama='$kota',alamat='$alamat',phone='$phone' WHERE uid='$_SESSION[checkout]'", $dbconn);
	?>
		<script type="text/javascript">
			TO_CHOUT();
		</script>
	<?php
}


	
function TOTAL_TR(){
	include './././includes/database.php';
	global $total,$ip,$uid;
	if(isset($_SESSION['checkout'])) {
	   $uid = $_SESSION['checkout'];
	} else {
	   $uid = '';
	}
	$qry=mysql_query("SELECT ifnull(sum(krsbtotal),0) as krsbtotal FROM krbelanja WHERE krstatus=2 AND uid='$uid' AND krip='$ip'", $dbconn) ;
	$row= mysql_fetch_array($qry) ;
	$total=$row['krsbtotal'];
}

function TOTAL_TRCK(){
	include './././includes/database.php';
	global $cktotal,$ip,$item,$uid;
	if(isset($_SESSION['checkout'])) {
	   $uid = $_SESSION['checkout'];
	} else {
	   $uid = '';
	}
	$qryt=mysql_query("SELECT sum(krsbtotal) as krsbtotal, sum(krqty) as krqty  
				FROM krbelanja WHERE krstatus=1 AND uid='$uid' AND krip='$ip'", $dbconn);
	$rowt= mysql_fetch_array($qryt) ;
	$cktotal=$rowt['krsbtotal'];
	$item =$rowt['krqty'];
}
?>