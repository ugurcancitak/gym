<?php 
include("connection.php");
error_reporting(0);
ob_start();
session_start();

$tarih=$_POST['tarih'];
$kota=$_POST['kota'];





$duzenle=$db->query("update randevu set tarih='$tarih', kota='$kota', durum='0', alan='0' ");








if($duzenle){

$sil=$db->query("delete from alinanrandevu");

	$msg = "Tarih ve yeni kota güncellendi ";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminprofile.php");


}
else{


	$msg = "Hata. ";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminprofile.php");


}








?>