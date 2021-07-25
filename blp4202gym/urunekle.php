<?php

include("connection.php");
error_reporting(0);
ob_start();
session_start();

$nm=$_POST["nm"];
$prc=$_POST["prc"];
$stk=$_POST["stk"];



$ekle=$db->query("INSERT INTO urunler (name,price,stok) values('$nm','$prc','$stk')");





if($ekle) {


	$msg = "Ürün ekleme başarılı.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminprofile.php");
}


else{


$msg = "Hata.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminprofile.php");

}










?>