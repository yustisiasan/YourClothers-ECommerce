<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link rel='shortcut icon' href='themes/yc.png' />
    <title> :: YOUR CLOTHES </title>
    <link rel='stylesheet' href='themes/style.css' type='text/css' />
	
	<script type="text/javascript" src="jscripts/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="jscripts/jquerycssmenu.js"></script>
	<script type="text/javascript" src="jscripts/plugins.js"></script>
	<script type="text/javascript" src="jscripts/functions.js"></script>
	<script type="text/javascript" src="jscripts/dropslide.js"></script>
	<script language="javascript" src="./page/iwisiwis/wysiwyg.js"></script>
	
	<link class="include" rel="stylesheet" type="text/css" href="jscripts/jsgraph/jquery.jqplot.min.css" />
    <link rel="stylesheet" type="text/css" href="jscripts/jsgraph/examples.min.css" />
    <link type="text/css" rel="stylesheet" href="jscripts/syntaxhighlighter/styles/shCoreDefault.min.css" />
    <link type="text/css" rel="stylesheet" href="jscripts/syntaxhighlighter/styles/shThemejqPlot.min.css" />
    <script class="include" type="text/javascript" src="jscripts/jsgraph/jquery.min-1.9.1.js"></script>
	
	</head>
<body>
<div id="body-pagecell">
	<div id='body-head'>
		<div class='home'><a href="../index.php"><img src='./themes/images/home.png'></a></div>
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
			<?php if (!empty($page)) { include($page);}?>
		</div>
		<div id="body-right">
			<?php include './page/menu/v.menu.php'?>
			<?php include './page/dropslide/dropslide.php'?>
		</div>		
		<div class="cleared"></div>
	</div>
</div>
<div id="body-bottom"></div>
</body>
</html>


<!-- Don't touch this! -->
    <script class="include" type="text/javascript" src="jscripts/jsgraph/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="jscripts/syntaxhighlighter/scripts/shCore.min.js"></script>
    <script type="text/javascript" src="jscripts/syntaxhighlighter/scripts/shBrushJScript.min.js"></script>
    <script type="text/javascript" src="jscripts/syntaxhighlighter/scripts/shBrushXml.min.js"></script>
<!-- End Don't touch this! -->

<!-- Additional plugins go here -->        
    <script class="include" language="javascript" type="text/javascript" src="jscripts/plugins/jqplot.pieRenderer.min.js"></script>
    <script class="include" language="javascript" type="text/javascript" src="jscripts/plugins/jqplot.donutRenderer.min.js"></script>	
<!-- End additional plugins -->
