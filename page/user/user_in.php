<style type="text/css">
   input {
      border:solid 1px #b72c24;
   }
</style>
<?php
if (!empty($_SESSION['loggedin']) && isset($_SESSION['loggedin'])){}
else if (!empty($_GET['n']) && (($_GET['n']=='user_reg') or ($_GET['n']=='cart'))){}
	else {
	if(isset($_POST['submit'])){
		if (empty($_POST['lunama']))	{$mss_luname="*";}
		if (empty($_POST['lpasswd']))	{$mss_lpasswd="*";}
		if (!empty($_POST['lunama']) && !empty($_POST['lpasswd'])){
			user_LOGIN($_POST['lunama'],$_POST['lpasswd']);			
		}
	}
?>
<div id="border-sd">
	<div id="m-right">
	<div class="title-vmenu">Form Login</div>
	<form method="POST" action="<?php print $_SERVER['REQUEST_URI']; ?>" >
	<table border='0' cellpadding='0' cellspacing='0'>
		<tr><td rowspan='9' width='10'></td></tr>
		<tr><td colspan='2' height='6'></td></tr>
		<tr><td colspan='2'><b>&nbsp;Username:&nbsp;</b><?php if(!empty($mss_luname)) { print $mss_luname; } ?></td></tr>
		<tr><td colspan='2'><input type='text' name='lunama' tabindex='1' size='24' maxlength='16' style="<?php print $mss_bg ?>"></td></tr>
		<tr><td colspan='2'><b>&nbsp;Password:&nbsp;</b><?php if(!empty($mss_lpasswd)) { print $mss_lpasswd; } ?></td></tr>
		<tr><td colspan='2'><input type='password' name='lpasswd' tabindex='2' size='24' maxlength='32' style="<?php print $mss_bg ?>"></td></tr>
		<tr><td colspan='2' height='6'></td></tr>
		<tr>
		<td width='80'><button name="submit" tabindex='3' class="btn">&nbsp;&nbsp;Login&nbsp;&nbsp;</button></td>
		<td><img src='./misc/mm.png' alt='mm' width='9'> <a href="?n=user_reg" style="color:#b72c24" onmouseover="this.style.color='#ff0000'" 
			onmouseout="this.style.color='#b72c24'">Register now</a></td>
		</tr>
		<tr><td colspan='2' height='6'></td></tr>
	</table>	
	</form>
	</div>
	</div>
<?php } ?>