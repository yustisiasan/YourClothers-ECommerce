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
		$qrytot=mysql_query("SELECT COUNT(nid) as totnid FROM node WHERE nid='$_GET[np]'", $dbconn);
		$rownode = mysql_fetch_array($qrytot);
		$totnode = $rownode['totnid'];
		if ($totnode<>0) {
		$qry=mysql_query("SELECT node.* FROM node WHERE nid='$_GET[np]'", $dbconn);
		$row=mysql_fetch_array($qry);
		?>
		<div class="title-content"><?php print $row['ntitel'];?></div>
		<div id="border">
			<div class='m-content' align='justify'>
				<?php
				if (!empty($row['nid']) && $row['nid']=="about_us!"){
					print "<div class='n_img'>
							<img src='../admin/images/about.png' title='$row[ntitel]' width='180'>
							</div>";
				} 
				print $row['nkonten'];
				print "<div class='cleared'></div>";
				?>
			</div>
		</div>
		<?php
		print "<a href='./?n=nodeedit&&nid=$row[nid]'><button name='submit' class='btn'>&nbsp;Edit Page&nbsp;</button></a>";
		} 
		else {
		empty_PAGE();
		}
	}
}
?>