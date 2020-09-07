<?php
    if(!empty($_GET['n'])){
	   $hal=strtolower($_GET['n']);
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
	if(empty($_GET['rl'])){
	   $_GET['rl']='';
	}
	if(!empty($hal) && $hal=='out')				{$page ='./page/user/logout.php';}
	else if(!empty($hal) && $hal=='user_reg')	{$page ='./page/user/user_reg.php';}	
	else if(!empty($hal) && $hal=='user')		{$page ='./page/user/user.php';}
	else if(!empty($hal) && $hal=='user_ed')	{$page ='./page/user/user_ed.php';}	
	else if((!empty($hal) && $hal=='main') || (!empty($_GET['mp']) && (preg_match('/^[0-9]+$/i',$_GET['mp'])))) { $page ='./page/main/page.php'; }
	else if(!empty($hal) && $hal=='detail') 	{$page ='./page/main/detail.php';}		
	else if(!empty($hal) && $hal=='cart_reg') 	{$page ='./page/cart/cart_reg.php';}	
	else if(!empty($hal) && $hal=='cart') 		{$page ='./page/cart/cart.php';}
	else if(!empty($hal) && $hal=='chout') 		{$page ='./page/cart/checkout.php';}	
	else if(!empty($hal) && $hal=='print')		{$page ='./page/cart/cart_print.php';}	
	else if((!empty($hal) && $hal=='node') || (!empty($_GET['np']) || (preg_match('/^[0-9]+$/i',$_GET['np'])))) { $page ='./page/node/page.php'; }
	else if((!empty($hal) && $hal=='rotor') || (!empty($_GET['rn']) || (preg_match('/^[0-9]+$/i',$_GET['rn'])))) { $page ='./page/rotor/roto_page.php'; }
	else if((!empty($hal) && $hal=='rotorlist') || (!empty($_GET['rl']) || (preg_match('/^[0-9]+$/i',$_GET['rl'])))) { $page ='./page/rotor/rotor_list.php'; }
	else if(!empty($hal) && $hal=='okrmmenu')	{$page ='./page/ongkoskirim/ongkoskirim.php';}
	else if(!empty($hal) && $hal=='btamu')		{$page ='./page/btamu/btamu.php';}
	else if(!empty($hal) && $hal=='lapbelanja') {$page='./page/lapbelanja/lapbelanja.php';}	
	else if(!empty($hal) && $hal=='search') 	{$page='./page/search/search_page.php';}	
	else {$page ='./themes/front-page.php';}
?>
