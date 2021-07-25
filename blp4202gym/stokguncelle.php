<?php 
include("connection.php");
error_reporting(0);
ob_start();
session_start();

$silinecek=$_POST['stokguncellenecek'];
$eklenecek=$_POST['stk'];






$duzenle=$db->query("update urunler set stok=stok+'$eklenecek'");


if($duzenle){

	$msg = "Stok eklendi. ";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminprofile.php");

}
else{

	$msg = "Hata ";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminprofile.php");

}

?>