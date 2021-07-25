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
  <style>
#myDIV {
  width: 100%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin-top: 20px;
}
</style>

  
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
 <button class="nav-link" id="nav-prog-tab" data-bs-toggle="tab" data-bs-target="#nav-prog" type="button" role="tab" aria-controls="nav-prog" aria-selected="false">Program Talepleri</button>
    <button class="nav-link" id="nav-mbox-tab" data-bs-toggle="tab" data-bs-target="#nav-mbox" type="button" role="tab" aria-controls="nav-mbox" aria-selected="false">Mesaj Kutusu</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Mesaj Gönder</button>
     <button class="nav-link" id="nav-gnd-tab" data-bs-toggle="tab" data-bs-target="#nav-gnd" type="button" role="tab" aria-controls="nav-gnd" aria-selected="false">Gönderilen Mesajlar</button>




  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><?php  echo $_SESSION["kadi"]; 
  
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




        <div class="tab-pane fade" id="nav-prog" role="tabpanel" aria-labelledby="nav-prog-tab">

<?php
error_reporting(0);
include("connection.php");
foreach($db->query("select progtalep.id, hedefler.hedef_ad, uye.id as uyeid, uye.ad, uye.soyad, frmbilgi.boy, frmbilgi.kilo, frmbilgi.yas, cinsiyetler.cinsiyet,progtalep.uye_notu from frmbilgi INNER JOIN uye ON frmbilgi.uye_id=uye.id INNER JOIN progtalep ON uye.id=progtalep.uye_id INNER JOIN hedefler ON progtalep.hedef_id=hedefler.id INNER JOIN cinsiyetler ON frmbilgi.cinsiyet_id=cinsiyetler.id where durum='0' ",PDO::FETCH_BOTH) as $row){  ?>
<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="x<?php echo $row[id]; ?>">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cx<?php echo $row[id]; ?>" aria-expanded="false" aria-controls="cx<?php echo $row[id]; ?>">Program Talebi ID: <?php  echo $row[id]; ?>

      </button>
    </h2>
    <div id="cx<?php echo $row[id]; ?>" class="accordion-collapse collapse" aria-labelledby="x<?php echo $row[id]; ?>" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ad</th>
      <th scope="col">Soyad</th>
      <th scope="col">Hedef</th>
      
      <th scope="col">Boy</th>
      <th scope="col">Kilo</th>
      <th scope="col">Yaş</th>
      <th scope="col">Cinsiyet</th>
      <th scope="col">Not</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">-</th>
      <td><?php echo $row['ad']; ?></td>
      <td><?php echo $row['soyad']; ?></td>
      <td><?php echo $row['hedef_ad']; ?></td>
     
      <td><?php echo $row['boy']; ?></td>
      <td><?php echo $row['kilo']; ?></td>
      <td><?php echo $row['yas']; ?></td>
      <td><?php echo $row['cinsiyet']; ?></td>
       <td><?php echo $row['uye_notu']; ?></td>

    </tr>
   </tbody>
</table>






    <form style="max-width:300px;margin:auto" action ="progekle.php" method="post">
<div style="" id="myDIV">
  <input type="hidden" value="<?php echo $row[uyeid]; ?>" name="kime" />
   <input type="hidden" value="<?php echo $row[id]; ?>" name="bitti" />
<label for="exampleFormControlTextarea1"  class="form-label">Program: </label>
  <textarea  class="form-control" id="exampleFormControlTextarea1" rows="3" name="prog" ></textarea>
  <div class="alert alert-primary" role="alert">
  Hareketleri "." (nokta) ile ayırınız.
</div>


  <button style="float: right;" type="submit" class="btn btn-lg btn-dark btn-block">Program Oluştur</button>
</div>

</form>



         



      </div>
    </div>
  </div>
  
</div>



<?php



}

?>

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


foreach($db->query("SELECT * FROM mesajlar where atan_id= '$kulid' ORDER BY id DESC",PDO::FETCH_BOTH) as $row)
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





