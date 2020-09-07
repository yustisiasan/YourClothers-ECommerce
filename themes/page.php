<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel='shortcut icon' href='themes/yc.png' />
    <title> :: YOUR CLOTHES</title>
    <link rel='stylesheet' href='themes/style.css' type='text/css' />
	<script type="text/javascript" src="jscripts/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="jscripts/jquerycssmenu.js"></script>
	<script type="text/javascript" src="jscripts/plugins.js"></script>
	<script type="text/javascript" src="jscripts/functions.js"></script>
	<script type="text/javascript" src="jscripts/dropslide.js"></script>

</head>
<body>
<?php
if (!empty($_GET['n']) && $_GET['n']=='print'){
	require_once('./page/cart/cart_print.php'); 
} else {
?>
<div id="body-pagecell">
	<div id='body-head'>
		<div class='home'><a href="index.php"><img src='./themes/images/home.png'></a></div>
		<?php include './page/search/search.php'?>
	</div>
	<div id="banner">
	<?php include './page/menu/admin.menu.php';?>
	</div>
	<div id="head-menu">
	<?php include './page/menu/h.menu.php'?>
	</div>	
	<div id="body-main">
		<div class="main-content">		
			<?php if (!empty($page)) { include($page); }?>
		</div>
		<div id="body-right">
			<?php include './page/menu/v.menu.php'?>
			<?php include './page/dropslide/dropslide.php'?>
			<?php include './page/user/user_in.php'?>
		</div>		
		<div class="cleared"></div>
	</div>
</div>
<div id="body-bottom"></div>
<?php
}
?>
</body>
</html>
