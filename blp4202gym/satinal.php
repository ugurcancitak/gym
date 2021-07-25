<?php 


date_default_timezone_set('Europe/Istanbul');
error_reporting(0);
session_start();
include("connection.php");
$toplam = $_POST["toplam"];
$tarih= date('d/m/Y H:i:s');

$kulid=$_SESSION["id"]; 


$sor=$db->prepare("select bakiye from uye where id=:deger");
$sor->execute(array(
  'deger' => $kulid
));



$ver = $sor->fetch(PDO::FETCH_ASSOC);

$son = $ver['bakiye'] - $toplam;

if ($ver['bakiye'] < $toplam){

 $msg = "Bakiye yetersiz";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");

} else {

	

$sor=$db->prepare("update uye set bakiye=:son where id=:deger");
$sor->execute(array(
	'son' => $son,
  'deger' => $kulid

));






for ($i=0; $i < count($_POST['dizi_post2']); $i++) { 

$sor=$db->prepare("update urunler set stok=stok-:son  where id=:deger");
$sor->execute(array(
'son' => $_POST['dizi_post2'][$i],
  'deger' => $_POST['dizi_post1'][$i]
  

));

	
}





for ($i=0; $i < count($_POST['dizi_post2']); $i++){

	$id=$_POST['dizi_post1'][$i];
	$ad=$_POST['dizi_post2'][$i];


$ekle=$db->query("INSERT INTO satinalinan (alan_uye_id, alinan_urun_id, adet, tarih) values('$kulid','$id', '$ad', '$tarih')");






}




}



$msg = "Başarılı";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=sepet.php");












?>