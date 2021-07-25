<?php 
include("connection.php");
error_reporting(0);
ob_start();
session_start();

$silinecek=$_POST['silinecek'];






$duzenle=$db->query("delete from urunler where id='$silinecek'");


if($duzenle){

	$msg = "Ürün silindi. ";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminprofile.php");

}
else{

	$msg = "Hata ";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminprofile.php");

}

?>