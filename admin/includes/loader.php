<?php
if (isset($_SESSION['logg3dAdm1n']) && $_SESSION['role']==1){
    if(!empty($_GET['n'])) {
	   $hal=strtolower($_GET['n']);
	}
	if(empty($_GET['bp'])){
	   $_GET['bp']='';
	}
	if(empty($_GET['mp'])){
	   $_GET['mp']='';
	}
	if(empty($_GET['np'])){
	   $_GET['np']='';
	}
	if(empty($_GET['rn'])){
	   $_GET['rn']='';
	}
	if(empty($_GET['bt'])){
	   $_GET['bt']='';
	}
	if(empty($_GET['rl'])){
	   $_GET['rl']='';
	}
	if(empty($_GET['ok'])){
	   $_GET['ok']='';
	}
	if(empty($_GET['us'])){
	   $_GET['us']='';
	}
	if(empty($_GET['rl'])){
	   $_GET['rl']='';
	}
	if(!empty($hal) && $hal=='out')		{$page ='./page/user/logout.php';}
	else if((!empty($hal) && $hal=='user') || (!empty($_GET['us']) && preg_match('/^[0-9]+$/i',$_GET['us'])))		{$page ='./page/user/user.php';}
	else if(!empty($hal) && $hal=='user_reg')	{$page ='./page/user/user_reg.php';}	
	else if(!empty($hal) && $hal=='user_pr')	{$page ='./page/user/user_profile.php';}
	else if(!empty($hal) && $hal=='user_ed')	{$page ='./page/user/user_ed.php';}	
	else if(!empty($hal) && $hal=='role')		{$page ='./page/roles/role.php';}
	else if(!empty($hal) && $hal=='role_ed')	{$page ='./page/roles/role_ed.php';}
	else if(!empty($hal) && $hal=='vmenu')		{$page ='./page/menu/menu.php';}
	else if(!empty($hal) && $hal=='vmenu_ed')	{$page ='./page/menu/v.menu_ed.php';}
	else if(!empty($hal) && $hal=='hmenu')		{$page ='./page/menu/menu.k.php';}
	else if(!empty($hal) && $hal=='hmenu_ed')		{$page ='./page/menu/h.menu_ed.php';}
	else if(!empty($hal) && $hal=='hmenu_add')		{$page ='./page/menu/h.menu_add.php';}
	else if(!empty($hal) && $hal=='hmenu_add2')		{$page ='./page/menu/h.menu_add2.php';}
	else if((!empty($hal) && $hal=='okrmmenu') || (!empty($_GET['ok']) && preg_match('/^[0-9]+$/i',$_GET['ok'])))	{$page ='./page/ongkoskirim/ongkoskirim.php';}
	else if(!empty($hal) && $hal=='okrmmenu_ed')	{$page ='./page/ongkoskirim/ongkoskirim_edit.php';}
	else if(!empty($hal) && $hal=='okrmmenu_add')	{$page ='./page/ongkoskirim/ongkoskirim_add.php';}
	else if((!empty($hal) && $hal=='barang') || (!empty($_GET['bp']) && (preg_match('/^[0-9]+$/i',$_GET['bp']))))	{$page ='./page/barang/barang.php';}
	else if(!empty($hal) && $hal=='barang_ed') 		{$page ='./page/barang/barang_ed.php';}
	else if(!empty($hal) && $hal=='barang_add') 	{$page ='./page/barang/barang_add.php';}
	else if((!empty($hal) && $hal=='main') || (!empty($_GET['mp'])) && (preg_match('/^[0-9]+$/i',$_GET['mp']))) {$page ='./page/main/page.php';}
	else if(!empty($hal) && $hal=='detail') 	{$page ='./page/main/detail.php';}		
	else if((!empty($hal) && $hal=='node') || (!empty($_GET['np'])) && (preg_match('/^[0-9]+$/i',$_GET['np']))) {$page ='./page/node/page.php';}	
	else if(!empty($hal) && $hal=='nodepage') {$page ='./page/node/nodepage.php';}	
	else if(!empty($hal) && $hal=='nodeedit') {$page ='./page/node/node_edit.php';}	
	else if(!empty($hal) && $hal=='nodeadd') {$page ='./page/node/node_add.php';}	
	else if((!empty($hal) && $hal=='rotor') || (!empty($_GET['rn'])) && (preg_match('/^[0-9]+$/i',$_GET['rn'])))	{$page ='./page/rotor/roto_page.php';}
	else if((!empty($hal) && $hal=='rotorlist') || (!empty($_GET['rl']) && preg_match('/^[0-9]+$/i',$_GET['rl']))) {$page ='./page/rotor/rotor_list.php';}
	else if(!empty($hal) && $hal=='rotor_ed') 	{$page ='./page/rotor/rotor_ed.php';}
	else if(!empty($hal) && $hal=='rotoradd') 	{$page ='./page/rotor/rotor_add.php';}
	else if((!empty($hal) && $hal=='btamu') || ((!empty($_GET['bt'])) && (preg_match('/^[0-9]+$/i',$_GET['bt'])))) { $page ='./page/btamu/btamu.php'; }	
	else if(!empty($hal) && $hal=='lapbelanja') {$page='./page/lapbelanja/lapbelanja.php';}	
	else if(!empty($hal) && $hal=='lappemesan') {$page='./page/lapbelanja/lappemesan.php';}	
	else if(!empty($hal) && $hal=='lapall') {$page='./page/lapbelanja/lapall.php';}	
	else if(!empty($hal) && $hal=='rekaplap') {$page='./page/lapbelanja/rekaplap.php';}	
	else if(!empty($hal) && $hal=='search') 	{$page='./page/search/search_page.php';}
	else {$page ='./themes/front-page.php';}
	
} else {
   $page ='./page/user/user_in.php';
}
?>
