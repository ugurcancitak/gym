<?php 
 error_reporting(0);
include("connection.php");
ob_start();
session_start();

$kulid=$_SESSION["id"];
 
if(!isset($_SESSION["login"])){

  $msg = "Admin üye girişi gereklidir.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=index.php");
}
else if($_SESSION["yetki"]==1) {   ?>



<!DOCTYPE html>
<html>
<head>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title></title>
</head>
<body>




 <form  style="max-width:300px;   margin-left:auto;
      margin-right:auto;

      width:70%;"action="<?=$_SERVER['PHP_SELF']?>" method="post">


<label class="sr-only">Düzenlenecek kullanıcı bilgisi:</label> 
<input type="text"  class="form-control" name="aranacak"    required>
  <br>


<label class="sr-only">Hangi kolon?:</label> 
		  <select  name="kolon" class="form-select" id="inputGroupSelect02" required="required">
    <option value="">Seçiniz...</option>

<?php

include("connection.php");




   foreach($db->query("select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'uye' ",PDO::FETCH_BOTH) as $kyt){

            	echo "<option value=\"$kyt[COLUMN_NAME]\">$kyt[COLUMN_NAME]</option>";

            }


						 

?>


</select>
<br>
<br>

  <button class="btn btn-lg btn-dark btn-block" type="submit">ARA</button>
<br>
<br>

</form>





<?php 

include("connection.php");

ob_start();
session_start();
error_reporting(0);

$kulid=$_SESSION["id"];

  if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $aranacak=$_POST['aranacak'];
            $kolon=$_POST['kolon'];

            foreach($db->query(" select * from uye where $kolon='$aranacak' ",PDO::FETCH_BOTH) as $row){
            	 ?>
<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="x<?php echo $row[id]; ?>">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cx<?php echo $row[id]; ?>" aria-expanded="false" aria-controls="cx<?php echo $row[id]; ?>">UYE ID: <?php  echo $row[id]; ?>

      </button>
    </h2>
    <div id="cx<?php echo $row[id]; ?>" class="accordion-collapse collapse" aria-labelledby="x<?php echo $row[id]; ?>" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      	    <form action ="kullaniciguncelle.php" method="post">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Ad</th>
      <th scope="col">Soyad</th>
      <th scope="col">Tel</th>
      
      <th scope="col">Bakiye</th>
      <th scope="col">Gün</th>
      <th scope="col">Mail</th>
      <th scope="col">Şifre</th>
      <th scope="col">Yetki</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
     <input type="hidden" name="kimi" value="<?php echo $row[id]; ?>" />
     
      <td><input type="text" name="ad" value="<?php echo $row['ad']; ?>"></td>
      <td><input type="text" name="soyad" value="<?php echo $row['soyad']; ?>"></td>
     
      <td><input type="text" name="tel" value="<?php echo $row['tel']; ?>"></td>
      <td><input type="text" name="bakiye" value="<?php echo $row['bakiye']; ?>"></td>
      <td><input type="text" name="gun" value="<?php echo $row['gun']; ?>"></td>
      <td><input type="text" name="mail" value="<?php echo $row['mail']; ?>"></td>
       <td><input type="text" name="sifre" value="<?php echo $row['sifre']; ?>"></td>
      <td>  <select  name="yetki" class="form-select" id="inputGroupSelect02">
   
    <option value="1" <?php if($row[yetki_id]==1){echo 'selected="selected"';} ?>>Admin</option>
    <option value="2" <?php if($row[yetki_id]==2){echo 'selected="selected"';} ?>>Trainer</option>
    <option value="3" <?php if($row[yetki_id]==3){echo 'selected="selected"';} ?>>Member</option>
    </select>


</td>

    </tr>
   </tbody>
</table>

  <button style="float: right;" type="submit" class="btn btn-lg btn-primary btn-block">Bilgileri Güncelle</button>



</form>




  <form action="sil.php" method="post">

<input type="hidden" name="idsil" value="<?php echo $row[id]; ?>" />

    <button style="float: right;" type="submit" class="btn btn-lg btn-danger btn-block">Kullanıcı Sil</button>
</div>

</form>



         



      </div>
    </div>
  </div>
  
</div>



<?php



} }

?>

            	

            





        




 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>








<?php }  else{

  $msg = "Admin girişi gereklidir.";
echo "<script type='text/javascript'>alert('$msg');</script>";
header("Refresh: 0.1; url=index.php");


}    ?>




