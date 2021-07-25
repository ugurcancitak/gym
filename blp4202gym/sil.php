<?php

include("connection.php");
error_reporting(0);
ob_start();
session_start();

$id=$_POST["idsil"];


$sil=$db->query("delete from uye where id='$id'");





if($sil) {


	$msg = "Üye silindi. ";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminedit.php");
}


else{


$msg = "Hata.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=adminedit.php");

}







?>