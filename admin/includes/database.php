<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "dbyourclothes";

$dbconn = mysql_connect("$server","$user","$pass");
if (!$dbconn) die ("Gagal Melakukan Koneksi");
mysql_select_db($database,$dbconn) or die ("Database Tidak Diketemukan di Server");

?>
