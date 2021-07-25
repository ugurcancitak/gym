<?php 

include("connection.php");

ob_start();
session_start();

$kulid=$_SESSION["id"];


$tpl=$_POST['toplamm'];


$gun=$_POST['grup'];





$ekle=$db->prepare("update uye set gun=gun+:gun, bakiye=bakiye-:dusulecek where id=:deger");
$ekle->execute(array(
	'gun' => $gun,
'dusulecek' => $tpl,
  'deger' => $kulid
  

));



if($ekle){

	$msg = "Kayıt yenileme başarılı.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");
}else{

	$msg = "Hata.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");

}






?>