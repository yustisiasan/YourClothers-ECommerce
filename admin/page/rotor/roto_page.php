<style type="text/css">
.r_kontent     		{ margin:0 10px 0 10px;width:98%;}
</style>
<div class="title-content">Detail Event</div>
<div id="border">
	<?php
	if(isset($_GET['rn'])){
	   $rotorid = $_GET['rn'];
	}  
	
	$qry=mysql_query("SELECT * FROM rotor WHERE roid=$rotorid", $dbconn);		  
	while ($row=mysql_fetch_array($qry)){
		print "<div class='title-mcontent'><img src='./misc/mm.png' width='9'> $row[rotitel]</div>";
		print "<div class='r_kontent'>
			        <img src='./images/$row[roimg]' title='$row[rotitel]' width='645'>					
			   </div>";		
		//print "<div class='cleared'></div>";
		print "<hr>";
		print $row['rokonten'];
		print "<hr>";
		print "Aksi : [ <a href='./?n=rotor_ed&&roid=$row[roid]'><img src='./misc/edit.gif'></a> ] ";
		print "[ <a onclick=\"return confirm('Anda yakin akan menghapus $row[rotitel] ?'); if (ok) return true; else return false\" href=./?n=rotor_ed&&delete=$row[roid]><img src='./misc/delete.gif'></a> ]";
	}
	?>
</div>