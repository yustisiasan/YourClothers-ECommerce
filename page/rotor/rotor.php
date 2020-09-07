<?php
include './././includes/database.php';
?>
<style type="text/css">
#rm     		{ position: absolute; margin:249px 0 0 566px; padding:0 10px 0 10px;
width: 80px; height: 26px; z-index:99;background-image: url('./themes/images/read_m.png');}
#rm  a			{color:#fff;text-decoration: none;}
#rm a:hover, a:active, a.active {	color: #E0E028;	text-decoration: none;}
.lnws 			{position: relative; width: 670px; height: 272px; margin:0 0 10px 0;overflow: hidden;} 
</style>
<div id="rm"><a href="./?n=rotorlist">All event...</a></div>
<div class="lnws">
	<?php
	    $qry=mysql_query("SELECT * FROM rotor ORDER BY roid DESC", $dbconn);		  
		while ($row=mysql_fetch_array($qry)){
		    print "<div class='dev'><a href='./?n=rotor&rn=$row[roid]'><img src='./admin/images/$row[roimg]' title='$row[rotitel]' width='660' height='267'></a></div>";
		}
	?>
</div>