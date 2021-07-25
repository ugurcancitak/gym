<?php
error_reporting(0);
ob_start();
session_start();



$ad=$_SESSION["ad"];

$soyad=$_SESSION["soyad"];

$kime=$_SESSION["kime"];


include ('class.phpmailer.php');
include ('class.smtp.php');



 
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp-mail.outlook.com';
$mail->SMTPSecure = 'tls'; //yada SSL
$mail->Port = 587;  //SSL kullanacaksanız portu 465 olarak değiştiriniz
$mail->Username = 'blp4202deneme@outlook.com';
$mail->Password = 'Blp.4202';
$mail->SetFrom($mail->Username, 'BLP4202-GYM');
$mail->AddAddress($kime);
$mail->CharSet = 'UTF-8';
$mail->Subject = 'Kayıt Bildirimi';
$mail->MsgHTML('Sayın üyemiz ' ." ". $ad." ". $soyad ." ".'kaydınız başarı ile tamamlanmıştır.' ." ". $kime ." ".'mail adresiniz ile sisteme kayıt oldunuz. BLP4202-GYM HOŞGELDİNİZ.');


if($mail->Send()){


	$msg = "Üye kayıt başarılı.";
echo "<script type='text/javascript'>alert('$msg');</script>";



session_destroy();
ob_end_flush();



header("Refresh: 0.1; url=index.php");

}

?>