<style type="text/css">
#admin-menu{
	position:absolute;
	z-index:10000;
	top:-10px;
	left:-30px;
}
	/* LEVEL ONE*/
ul.dropdownadmin                 { position: relative; }
ul.dropdownadmin li              { float: left; background: none;list-style: none; }
ul.dropdownadmin a:visited, 
ul.dropdownadmin a:link        	{ color: #fff; text-decoration:none; }
ul.dropdownadmin a:hover,
ul.dropdownadmin a:active,
ul.dropdownadmin a.active		{ color: #fff; text-decoration:none; }
ul.dropdownadmin li a           { display: block; padding: 2px 5px 2px 5px; border-right: 1px solid #BAB5B6; color: #222; }
ul.dropdownadmin li:last-child a { border-right: none; } 
ul.dropdownadmin li:hover        { position: relative;background-image: url('./themes/images/am_h.png'); }
	/* LEVEL TWO*/
ul.dropdownadmin ul a:visited, 
ul.dropdownadmin ul a:link        	{ color: #000; text-decoration:none; }
ul.dropdownadmin ul a:hover,
ul.dropdownadmin ul a:active,
ul.dropdownadmin ul a.active		{ color: #fff;text-decoration:none;background: #b72c24;}

ul.dropdownadmin ul 			{ width: 160px; visibility: hidden; position: absolute; top: 100%; left:-40px; }
ul.dropdownadmin ul li 			{background: #fff; color: #000; padding:0; 	border-bottom: 1px solid #ddd;float: none;}
	/* IE 6 & 7 Needs Inline Block */
ul.dropdownadmin ul li a			{ border-right: none; width:150px; display: inline-block; } 
/* 	LEVEL THREE*/
ul.dropdownadmin ul ul 			{ left: 100%; top: 0; }
ul.dropdownadmin li:hover > ul 	{ visibility: visible; }
</style>
<?PHP
if (!empty($_SESSION['loggedin']) && isset($_SESSION['loggedin'])){
?>
<div id="admin-menu">
	<ul id="menu" class="dropdownadmin">
		<li><a href='index.php'>UID:[<?php print $_SESSION['unama']; ?>]</a>
			<ul class="sub_menu">
				<li><a href='?n=user'>Data Pribadi</a></li>
				<li><a href='?n=out'>Logout</a></li>
			</ul>
		</li>	
		<li><a href="#">Laporan</a>
			<ul class="sub_menu">
				<li><a href="?n=lapbelanja">Laporan Belanja</a></li>						
			</ul>
		</li>
	</ul>
</div>
<?php } ?>