<?php
include("connection.php");
session_start();
ob_start();

$kulid=$_SESSION['id'];

$hangi=$_POST['randevu'];



$kontrol=$db->query("select * from alinanrandevu where uye_id='$kulid'");
$say=$kontrol->rowCount();

if($say==1){

	$msg = "Üye zaten randevu almış";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=randevu.php");
}  else{  

	$ran=$db->query("select * from randevu where id='$hangi'");


$kota = $ran->fetch(PDO::FETCH_ASSOC);


if($kota['kota']==$kota['alan']){

		$msg = "Kota dolu.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=randevu.php"); 
}


else{


$ayır=$db->query("UPDATE randevu set alan=alan+1 where id='$hangi'");


$randevu=$db->query("INSERT INTO alinanrandevu (uye_id,randevu_id) values('$kulid','$hangi')");



	$ran=$db->query("select * from randevu where id='$hangi'");


$kota = $ran->fetch(PDO::FETCH_ASSOC);



if($kota['kota']==$kota['alan']) {
	$guncelle=$db->query("UPDATE randevu set durum='1' where id='$hangi'");
}





	$msg = "Randevu alındı.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=randevu.php");









}








}











?>

