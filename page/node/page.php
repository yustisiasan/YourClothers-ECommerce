<style type="text/css">
.n_img				{float: left;width: 180px;margin:5px 10px 0px 0px;}
</style>
<?php
if ($_GET['np']=='home'){
?>
	<script type="text/javascript">TO_INDEX();</script>
<?php
}
else {
	if(isset($_GET['np'])){
		$qrytot=mysql_query("SELECT * FROM node WHERE nid='$_GET[np]'", $dbconn);
		$totdata = mysql_num_rows($qrytot);
		
		if ($totdata>0) {
		$row=mysql_fetch_array($qrytot);
		?>
		<div class="title-content"><?php print $row['ntitel'];?></div>
		<div id="border">
			<div class='m-content' align='justify'>
				<?php
				if (!empty($row['nid']) && $row['nid']=="about_us!"){
					print "<div class='n_img'>
							<img src='./admin/images/about.png' alt='$row[ntitel]' width='180'>
							</div>";
				} 
				print $row['nkonten'];
				print "<div class='cleared'></div>";
				?>
			</div>
		</div>
		<img src='./misc/back.gif' alt='mb' width='5'> <a href="index.php" style="color:#b72c24" onmouseover="this.style.color='#ff0000'" 
			onmouseout="this.style.color='#b72c24'">Back</a>
		<?php
		} 
		else {
		empty_PAGE();
		}
	}
}
?>