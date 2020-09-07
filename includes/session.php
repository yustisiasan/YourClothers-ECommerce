<?php
	include './includes/database.php';
	require_once './includes/function.php';
	//--Cek IP System--
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else   {
		$ip=$_SERVER['REMOTE_ADDR'];
    }
	session_start();
	require_once './jscripts/jscripts.js';
	require_once './includes/loader.php';
	require_once './page/datetime/date.php';
?>