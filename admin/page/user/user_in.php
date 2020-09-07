<style type="text/css">
#body-user{
	width: 290px;
	margin:10px 10px 0 45%;
}
.title-user{
	height: 21px;
	font-weight: bold;
	color:#fff;
	padding: 3px 0 0 15px;
	background:#7BB642;
}
.m{
	margin:4px;
}
</style>
<?php 
	if(isset($_POST['submit'])){
		if (empty($_POST['lunama']))	{$mss_luname="*";}
		if (empty($_POST['lpasswd']))	{$mss_lpasswd="*";}
		if (!empty($_POST['lunama']) && !empty($_POST['lpasswd'])){
			user_LOGIN($_POST['lunama'],$_POST['lpasswd']);			
		}
	}
?>
<div id="body-user">
<div class="title-vmenu">Administrator Login</div>
<div id="border">
<form method="POST" action="<?php print $_SERVER['REQUEST_URI']; ?>" >
<table border='0' cellpadding='0' cellspacing='0'>
	<tr><td rowspan='9' width='105'><img src='./misc/xLog.png' alt='admin'height='100' class='m'></td></tr>
	<tr><td colspan='2' height='6'></td></tr>
	<tr><td colspan='2'><b>&nbsp;Username:&nbsp;</b><?php if(!empty($mss_uname)) { print $mss_uname; } ?></td></tr>
	<tr><td colspan='2'><input type='text' name='lunama' tabindex='1' size='24' maxlength='16' style="<?php print $mss_bg ?>"></td></tr>
	<tr><td colspan='2'><b>&nbsp;Password:&nbsp;</b><?php if(!empty($mss_passwd)) { print $mss_passwd; } ?></td></tr>
	<tr><td colspan='2'><input type='password' name='lpasswd' tabindex='2' size='24' maxlength='32' style="<?php print $mss_bg ?>"></td></tr>
	<tr><td colspan='2' height='6'></td></tr>
	<tr><td colspan='2'><button name="submit" class="btn">&nbsp;&nbsp;Login&nbsp;&nbsp;</button><a href="../index.php"></td></tr>
	<tr><td colspan='2' height='6'></td></tr>
</table>
</form>
</div>
</div>