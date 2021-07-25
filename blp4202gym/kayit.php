<?php


include("connection.php");
error_reporting(0);
ob_start();
session_start();



$mail=$_POST['mail'];
$sifre=$_POST['sifre'];
$ad=$_POST['ad'];
$soyad=$_POST['soyad'];
$tel=$_POST['tel'];




$_SESSION["ad"]=$ad;
$_SESSION["soyad"]=$soyad;
$_SESSION["kime"]=$mail;




$sorgu=$db->prepare("select * from uye where mail=:kmail");
$sorgu->execute(array(
	'kmail' => $mail,
	
));


$say=$sorgu->rowCount();

if($say==0) {

	

$ekle=$db->query("INSERT INTO uye (mail,sifre,ad,soyad,tel,bakiye,gun,yetki_id) values('$mail','$sifre','$ad', '$soyad', '$tel','0','0','3')");





if($ekle) {

header("Refresh: 0.1; url=mailgonder.php");





}


else{


$msg = "Hata.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=index.php");

}






}



	

else{


$msg = "Girilen mail sistemde kayıtlı.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=index.php");

}
















?>