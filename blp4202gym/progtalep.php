<?php 

include("connection.php");
error_reporting(0);
ob_start();
session_start();



$kulid=$_SESSION["id"];
$hedef=$_POST["hedef"];
$nt=$_POST["nt"];



$ekle=$db->query("INSERT INTO progtalep (uye_id, hedef_id, uye_notu, durum) values('$kulid', '$hedef', '$nt', '0')");



if($ekle) {


	$msg = "Program talebi oluşturuldu.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");
}


else{


$msg = "Hata.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");


}