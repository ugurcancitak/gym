<?php 

include("connection.php");
error_reporting(0);
ob_start();
session_start();

$id=$_POST["kimi"];
$ad=$_POST["ad"];
$soyad=$_POST["soyad"];
$sifre=$_POST["sifre"];
$tel=$_POST["tel"];
$bakiye=$_POST["bakiye"];
$gun=$_POST["gun"];
$mail=$_POST["mail"];
$yetki=$_POST["yetki"];



$ekle=$db->query("UPDATE  uye set ad='$ad', soyad='$soyad', sifre='$sifre', tel='$tel', bakiye='$bakiye', gun='$gun', mail='$mail', yetki_id='$yetki' where id='$id'");



if($ekle) {


	$msg = "Üye bilgileri güncellendi.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminedit.php");
}


else{


$msg = "Hata.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminedit.php");

}


?>
