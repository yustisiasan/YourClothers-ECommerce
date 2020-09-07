<?php
unset($_SESSION['loggedin']);
unset($_SESSION['unama']);
unset($_SESSION['role']);
unset($_SESSION['checkout']);
unset($_SESSION['nama']);
unset($_SESSION['email']);
unset($_SESSION['alamat']);
unset($_SESSION['phone']);
unset($_SESSION['konama']);
session_destroy();
?>
<script type="text/javascript">
	TO_INDEX();
</script>