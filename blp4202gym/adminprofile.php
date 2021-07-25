<?php 
 error_reporting(0);
include("connection.php");
ob_start();
session_start();
 
if(!isset($_SESSION["login"])){
    
  $msg = "Üye girişi gereklidir.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Refresh: 0.1; url=index.php");
}
else {



    ?>   

<!DOCTYPE html>
<html>
<head>
  
   <link rel="stylesheet" type="text/css" href="./css/fstyle.css" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>
    
  </title>
</head>
<body>
  

  



<?php
session_start();
  error_reporting(0);
include("connection.php");

$sorgu=$db->prepare("select * from kullanici where kad=:kmail and ksif=:ksif");
$sorgu->execute(array(
  'kmail' => $_SESSION["kadi"],
  'ksif' => $_SESSION["ksif"]
));


$al = $sorgu->fetch(PDO::FETCH_ASSOC);

 ?>

  <header id="header">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark py-2 ">
  <div class="container">
    <a class="navbar-brand" href="index.php"><img src="img\lg1.png"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                 <li class="nav-item">
          <a class="nav-link" > 
 <?php  echo $_SESSION["kadi"]; 
  
  ?> iyi günler.</a>
        </li>


           <li class="nav-item">
          <a class="nav-link" href="logout.php">
 ÇIKIŞ YAP</a>
        </li>




      </ul>
 
    </div>
  </div>
</nav>
    </header>

<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
     <button class="nav-link" id="nav-urun-tab" data-bs-toggle="tab" data-bs-target="#nav-urun" type="button" role="tab" aria-controls="nav-urun" aria-selected="false">Mağaza İşlemleri</button>
    <button class="nav-link" id="nav-kd-tab" data-bs-toggle="tab" data-bs-target="#nav-kd" type="button" role="tab" aria-controls="nav-kd" aria-selected="false">Kullanıcı Düzenle</button>
     <button class="nav-link" id="nav-rnd-tab" data-bs-toggle="tab" data-bs-target="#nav-rnd" type="button" role="tab" aria-controls="nav-rnd" aria-selected="false">Randevu Düzenle</button>
    <button class="nav-link" id="nav-mbox-tab" data-bs-toggle="tab" data-bs-target="#nav-mbox" type="button" role="tab" aria-controls="nav-mbox" aria-selected="false">Mesaj Kutusu</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Mesaj Gönder</button>
     <button class="nav-link" id="nav-gnd-tab" data-bs-toggle="tab" data-bs-target="#nav-gnd" type="button" role="tab" aria-controls="nav-gnd" aria-selected="false">Gönderilen Mesajlar</button>




  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><?php 



   echo $_SESSION["kadi"]; 
  
  ?> hoşgeldiniz. Hesabınızla alakalı işlemleri sekmelerden yapabilirsiniz.</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    
<?php 
     error_reporting(0);
include("connection.php");
session_start();
$kulid=$_SESSION["id"]; 

$sor=$db->prepare("select * from uye where id='$kulid'");
$sor->execute(array(
  'deger' => $kulid
));


$ver = $sor->fetch(PDO::FETCH_ASSOC);

$maill=$ver[mail];
$sifree=$ver[sifre];
$tell=$ver[tel];

?>


    <form style="max-width:300px;margin-left: ;" action ="guncelle.php" method="post">  

<label class="sr-only">E-mail:</label> 
<input type="email" id="exx" class="form-control" name="mailg"  value="<?php echo $maill; ?>"  required>
<label for="password" class="sr-only">Parola:</label>
<input type="password" id="pwxxx"  class="form-control" value="<?php echo $sifree; ?>" name="sifg" required>
<label class="sr-only">Telefon:</label> 
<input type="text" id="tell" class="form-control" name="telg"  value="<?php echo $tell; ?>"  required>



<button class="btn btn-lg btn-dark btn-block" type="submit">Bilgilerimi Güncelle</button>
</form>
</div>
        <div class="tab-pane fade" id="nav-mbox" role="tabpanel" aria-labelledby="nav-mbox-tab">     <?php
$kulid=$_SESSION["id"];    

       error_reporting(0);
include("connection.php");


foreach($db->query("SELECT * FROM mesajlar where alan_id = '$kulid' ORDER BY id DESC ",PDO::FETCH_BOTH) as $row)
{
echo "<table class=\"blueTable\">";
echo "<thead>";
echo "<tr>";
echo "<th>$row[tarih] </th>";
echo "</tr>";
echo "</thead>";
echo "<tfoot>";
echo "<tr>";
echo "<td colspan=\"1\">";
echo "<div class=\"links\"> <a class=\"active\" href=\"#\">" ?>  <?php 

session_start();
  error_reporting(0);
include("connection.php");

$sor=$db->prepare("select * from uye where id=(select atan_id from mesajlar where id=:deger)");
$sor->execute(array(
  'deger' => $row[id]
));


$ver = $sor->fetch(PDO::FETCH_ASSOC);

echo "Gönderen:" ." ".$ver['ad']." ".$ver['soyad'];  ?>  <?php "</a></div>";
echo "</td>";
echo "</tr>";
echo "</tfoot>";
echo "<tbody>";
echo "<tr>";
echo "<td> - $row[mesaj]</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "<hr>";



}
?>

</div>



 <div class="tab-pane fade" id="nav-kd" role="tabpanel" aria-labelledby="nav-kd-tab">


<iframe style="width: 100%;"  height='1280' frameborder='0' src='adminedit.php'></iframe>



 	</div>


<div class="tab-pane fade" id="nav-rnd" role="tabpanel" aria-labelledby="nav-rnd-tab"> 



<form style="width: 300px;" action="rnduzenle.php" method="post" >

<label class="sr-only">Tarih:</label> 
<input type="text" class="form-control" name="tarih" required>
<label class="sr-only">Kota:</label> 
<input type="text" class="form-control" name="kota" required>





<button class="btn btn-lg btn-dark btn-block" type="submit">Ayarla</button>







</form>



</div>






 	 <div class="tab-pane fade" id="nav-urun" role="tabpanel" aria-labelledby="nav-urun-tab">


<form style="width: 300px; border-color: black; float: left; border-radius: 15px; margin-left:50px; margin-top: 50px;" action="urunekle.php" method="post" >
<label class="sr-only">Ürün ad:</label> 
<input class="form-control" type="text" name="nm" />

<label class="sr-only">Fiyat:</label> 
<input class="form-control" type="text" name="prc" />
<label class="sr-only">Stok:</label> 
<input class="form-control" type="text" name="stk" />

<input class="btn btn-lg btn-dark btn-block" type="submit" value="Ekle" />

</form>



<form  style="width: 300px; float: left; margin-left:50px; margin-top: 50px;"  action="stokguncelle.php" method="post" >
<label class="sr-only">Ürün seçimi:</label>

  <select  name="stokguncellenecek" class="form-select" id="inputGroupSelect02" required="required">
    <option value="">Seçiniz...</option>

 <?php
       error_reporting(0);
include("connection.php");


foreach($db->query("SELECT * FROM urunler ",PDO::FETCH_BOTH) as $row)
{

  echo "<option value=\"$row[id]\">$row[name]</option>";
 } ?> 
    
   </select>
  <br>
  <label class="sr-only">Stok:</label> 
<input class="form-control" type="text" name="stk" />

<input class="btn btn-lg btn-dark btn-block" type="submit" value="Stok Ekle" />


</form>

 	 	<form  style="width: 300px; float: left; margin-left:50px; margin-top: 50px;"  action="urunsil.php" method="post" >
<label class="sr-only">Ürün seçimi:</label>

  <select  name="silinecek" class="form-select" id="inputGroupSelect02" required="required">
    <option  value="">Seçiniz...</option>

 <?php
       error_reporting(0);
include("connection.php");


foreach($db->query("SELECT * FROM urunler ",PDO::FETCH_BOTH) as $row)
{

  echo "<option value=\"$row[id]\">$row[name]</option>";
 } ?> 
    
   </select>
  <br>


<input class="btn btn-lg btn-dark btn-block" type="submit" value="Sil" />

</form>


 	 </div>





  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">



 <div class="text-center">
    <form style="width: 500px; margin-left: 500px;" action ="mesajgonder.php" method="post">
   
<img class="mt-5 mb-5" src="img/lg1.png" />
<hr>
<br>


<label class="sr-only">Kime mesaj atılacak?</label>
<div class="input-group mb-3">
  <select  name="kime" class="form-select" id="inputGroupSelect02" required="required">
    <option value="">Seçiniz...</option>
 <?php
       error_reporting(0);
include("connection.php");


foreach($db->query("SELECT * FROM uye WHERE id <> '$kulid' ",PDO::FETCH_BOTH) as $row)
{

  echo "<option value=\"$row[id]\">$row[ad]</option>";
 } ?> 
    
  
  </select>

</div>
  
  <label for="exampleFormControlTextarea1" class="form-label">Mesajınız:</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mesaj" required autofocus></textarea>






<div class="mt-3">
<button class="btn btn-lg btn-dark btn-block" type="submit">Gönder</button>
</div>
    </form>
</div></div>
<div class="tab-pane fade" id="nav-gnd" role="tabpanel" aria-labelledby="nav-gnd-tab">  <?php
       error_reporting(0);
include("connection.php");


foreach($db->query("SELECT * FROM mesajlar where atan_id= '$kulid' ORDER BY id DESC ",PDO::FETCH_BOTH) as $row)
{
echo "<table class=\"blueTable\">";
echo "<thead>";
echo "<tr>";
echo "<th>$row[tarih] </th>";
echo "</tr>";
echo "</thead>";
echo "<tfoot>";
echo "<tr>";
echo "<td colspan=\"1\">";
echo "<div class=\"links\"> <a class=\"active\" href=\"#\">" ?>  <?php 

session_start();
  error_reporting(0);
include("connection.php");

$sor=$db->prepare("select * from uye where id=(select atan_id from mesajlar where id=:deger)");
$sor->execute(array(
  'deger' => $row[id]
));


$ver = $sor->fetch(PDO::FETCH_ASSOC);

echo "Gönderen:" ." ".$ver['ad']." ".$ver['soyad'];  ?>  <?php "</a></div>";
echo "</td>";
echo "</tr>";
echo "</tfoot>";
echo "<tbody>";
echo "<tr>";
echo "<td> - $row[mesaj]</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "<hr>";



}
?></div>
  </div></div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>








    <?php 




}
?>





