<?php
try {

$db=new PDO("mysql:host=localhost;dbname=blp4202gym;charset=utf8","root","");



}


catch (PDOExpception $e){
	echo $e->getMessage();
}



?>