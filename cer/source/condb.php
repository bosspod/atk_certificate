<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "atk_certificate";

$condb = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_set_charset($condb, "utf8");

if(mysqli_connect_errno()){
	echo 'Failed to connect to the Database : '.mysqli_connect_error();
}
?>