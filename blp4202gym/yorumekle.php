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



$yapan=$_SESSION["id"];
$yorum=$_POST['yorum'];
$tarih= date('d/m/Y H:i:s');
$puan=$_POST['puan'];

$ekle=$db->query("INSERT INTO yorumlar (yorum, puan,yorum_yapan_id, tarih) values('$yorum','$puan', '$yapan', '$tarih')");



if($ekle) {


	$msg = "Yorum başarıyla eklendi.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=forum.php");
}


else{


$msg = "Hata";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=yorum.php");


}





?>


</body>
</html>