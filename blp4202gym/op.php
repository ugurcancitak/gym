<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
<?php 
include("connection.php");

ob_start();
session_start();




$kmail=$_POST['kmail'];
$sifre=$_POST['ksif'];

$sorgu=$db->prepare("select * from uye where mail=:kmail and sifre=:ksif");
$sorgu->execute(array(
	'kmail' => $kmail,
	'ksif' => $sifre
));


$tur = $sorgu->fetch(PDO::FETCH_ASSOC);


$_SESSION["id"]=$tur["id"];
$_SESSION["kadi"]=$kmail;
$_SESSION["ksif"]=$sifre;
$_SESSION["yetki"]=$tur["yetki_id"];




$say=$sorgu->rowCount();

if($say==1) {

	$_SESSION["login"] = "true";

	if($tur["yetki_id"]==1) {
	header("Location:index.php");
	exit;

	}elseif($tur["yetki_id"]==2) {
		header("Location:index.php");
	exit;
}elseif($tur["yetki_id"]==3){
	header("Location:index.php");
	exit;
}



	
}
else{


$msg = "Kullanıcı adı veya şifre hatalı.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=index.php");

}

?>


</body>
</html>