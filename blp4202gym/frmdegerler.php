<?php 

include("connection.php");
error_reporting(0);
ob_start();
session_start();



$kulid=$_SESSION["id"];
$yas=$_POST["yas"];
$boy=$_POST["boy"];
$kilo=$_POST["kilo"];
$cinsiyet=$_POST["cinsiyet"];




$ekle=$db->query("INSERT INTO frmbilgi (uye_id, cinsiyet_id, boy, kilo, yas) values('$kulid', '$cinsiyet', '$boy', '$kilo', '$yas')");



if($ekle) {


	$msg = "Bilgileriniz eklendi.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");
}


else{


$msg = "Hata, sayısal değerler girilmeli.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");


}