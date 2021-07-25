<?php 

include("connection.php");
error_reporting(0);
ob_start();
session_start();



$kulid=$_SESSION["id"];
$kime=$_POST["kime"];
$bitti=$_POST["bitti"];
$program=$_POST["prog"];

$guncelle=$db->query("UPDATE progtalep set durum='1' where id='$bitti'");







$ekle=$db->query("INSERT INTO programlar (uye_id, program, trainer_id) values('$kime', '$program', '$kulid')");



if($ekle) {


	$msg = "Program oluşturuldu.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=trainerprofile.php");
}


else{


$msg = "Hata.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=trainerprofile.php");




}   


?>