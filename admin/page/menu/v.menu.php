<?php
include './././includes/database.php';
?>
<style type="text/css">
ul.v     		{ position: relative; list-style: none; margin:0px;padding: 0px 0 0 0px;z-index:0;}
ul.v li  		{ background: none; }
ul.v a:visited, ul.v a:link        { color: #b72c24; text-decoration:none; }
ul.v a:hover	{ background: #b72c24; color: #fff;}
ul.v a:active   { color: #E0E028; }
ul.v li a       { display: block; padding:2px 0 2px 10px; border-bottom: 1px solid #ddd;color: #222; }

</style>
<?PHP
if ((isset($_SESSION['logg3dAdm1n'])) AND ($_SESSION['role']==1)){
?>
	<div id="border-sd">
	<div id="m-right">
	<div class="title-vmenu">Menu Utama</div>
	<ul id="menu" class="v">
<?php
			$qry=mysql_query("SELECT * FROM menu WHERE mclass='v' ORDER BY morder", $dbconn);		  
				while ($row=mysql_fetch_array($qry)){
				   print "<li><a href='./?n=node&np=$row[murl]'>$row[mtitel]</a></li>";
				}
			print "<li><a href='?n=btamu'>Buku Tamu</a></li>";
?>		
	</ul>
	</div>
	</div>
<?php
}
?>