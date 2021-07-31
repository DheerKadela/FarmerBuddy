<?php
$server="sql205.epizy.com";
$user="epiz_29286453";
$pass="GQQVuX9Ntepb";
$dbname="epiz_29286453_myshop";
$con=mysqli_connect($server,$user,$pass,$dbname);
if(!$con)
{
	die("connection failed:" .mysqli_connect_error());
}
?>