<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>

 
<?php 
date_default_timezone_set('Europe/Istanbul');
include("connection.php");
error_reporting(0);
ob_start();
session_start();
$tarih= date('d/m/Y H:i:s');
$atan=$_SESSION["id"];
$mesaj=$_POST['mesaj'];

$kime=$_POST['kime'];

$ekle=$db->query("INSERT INTO mesajlar (atan_id, alan_id, mesaj, durum, tarih) values('$atan','$kime','$mesaj','0','$tarih')");



if($ekle) {


	$msg = "Mesaj başarıyla gönderildi.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");
}


else{


$msg = "Mesaj gönderilemedi.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=profile.php");


}





?>


</body>
</html>