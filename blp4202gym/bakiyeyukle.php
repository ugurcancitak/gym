<?php 

include("connection.php");
error_reporting(0);
ob_start();
session_start();



$kulid=$_SESSION["id"];
$bakiye=$_POST["bakiye"];



$ekle=$db->prepare("update uye set bakiye=bakiye+:bakiye where id=:deger");
$ekle->execute(array(
	'bakiye' => $bakiye,
  'deger' => $kulid

));



if($ekle){

	$msg = "Bakiye yükleme başarılı.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");
}else{

	$msg = "Hata.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");

}



?>