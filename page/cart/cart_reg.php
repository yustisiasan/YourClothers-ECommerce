<div class="title-content">Keranjang Belanja</div>
<div id="border">
	<div id="main">
	<?php
	if(isset($_GET['bid']) && isset($_SESSION['checkout'])){
		$bid=$_GET['bid'];
		$uid=$_SESSION['checkout'];
		
		$qry=mysql_query("SELECT * FROM barang WHERE bid='$bid'", $dbconn);
		$row=mysql_fetch_array($qry);
		$harga = $row['bharga'];
		//-- INSERT --
		$qryi = mysql_query("INSERT INTO krbelanja (bid,krqty,krsbtotal,krip,krstatus,uid)
						VALUES('$bid','1','$harga','$ip','2','$uid');", $dbconn);
	}
	else if(isset($_GET['krid'])){
		$krid=$_GET['krid'];
		//-- HAPUS --
		$qry=mysql_query("DELETE FROM krbelanja WHERE krid='$krid'", $dbconn);
	}
	else if((isset($_POST['addid'])) AND (isset($_POST['qty']))){
		if ($_POST['qty']==0){
			$qry=mysql_query("DELETE FROM krbelanja WHERE krid='$_POST[addid]'", $dbconn);
		}
		else{
			$qry=mysql_query("SELECT a.bharga FROM barang a, krbelanja b WHERE a.bid=b.bid AND b.krid='$_POST[addid]'", $dbconn);
			$row=mysql_fetch_array($qry);
			//-- UPDATE --
			$sbtt=($_POST['qty']* $row['bharga']);
			$qry=mysql_query("UPDATE krbelanja SET krqty='$_POST[qty]',krsbtotal='$sbtt' WHERE krid='$_POST[addid]'", $dbconn);
		}
	}
	?>
	<script type="text/javascript">
		TO_CHART();
	</script>
	</div>
</div>