<?php 
     error_reporting(0);
include("connection.php");
session_start();
$kulid=$_SESSION["id"]; 



$mail=$_POST['mailg'];
$sifre=$_POST['sifg'];
$tel=$_POST['telg'];

$sor=$db->prepare("update uye set mail=:mail, sifre=:sifre, tel=:tel where id=:deger");
$sor->execute(array(
  'deger' => $kulid,
  'mail' => $mail,
  'sifre' => $sifre,
  'tel' => $tel
));





if($sor){



	$msg = "Üyelik bilgileriniz güncellendi.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");

}


else{

		$msg = "Hata.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");




}






?>