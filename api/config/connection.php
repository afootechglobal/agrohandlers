<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
header("Access-Control-Allow-Origin: *");

// ////////////for local connect 
$siteuser='root';
$serverpass='';
//$siteuser='agrohand';
//$serverpass='.$AH@2022';

$hostname = "localhost";  
//conn_admin string with database  
$conn = mysqli_connect($hostname, $siteuser, $serverpass)or die("Unable to connect to MySQL");
mysqli_select_db($conn,"agrohand_db");
/////////////////////////////////////////////////////////////////
?>
