
<?php
function bmr($kg,$cm,$yas)
{
$sonuc=66+(13,7*$kg)+5*$cm-(6,8*$yas);
return $sonuc;
}

$bir=$_POST["bir"];
$iki=$_POST["iki"];

echo $bir."+".$iki."=".tpl($bir,$iki);
?>
