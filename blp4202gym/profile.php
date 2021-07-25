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

if($_SESSION["yetki"]==1){
  header("Location: adminprofile.php");

}else if($_SESSION["yetki"]==2){
  header("Location: trainerprofile.php");

}


    ?>   

<!DOCTYPE html>
<html>
<head>


<script type="text/javascript" src="pscript.js" defer></script>
 
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
  
  ?> iyi günler. 
</a>
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
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Hesap</button>
    <button class="nav-link" id="nav-uye-tab" data-bs-toggle="tab" data-bs-target="#nav-uye" type="button" role="tab" aria-controls="nav-uye" aria-selected="false">Üyelik</button>
     <button class="nav-link" id="nav-bakiye-tab" data-bs-toggle="tab" data-bs-target="#nav-bakiye" type="button" role="tab" aria-controls="nav-bakiye" aria-selected="false">Bakiye</button>
        <button class="nav-link" id="nav-rnd-tab" data-bs-toggle="tab" data-bs-target="#nav-rnd" type="button" role="tab" aria-controls="nav-rnd" aria-selected="false">Randevu</button>
    <button class="nav-link" id="nav-frm-tab" data-bs-toggle="tab" data-bs-target="#nav-frm" type="button" role="tab" aria-controls="nav-frm" aria-selected="false">Form Bilgiler</button>
    <button class="nav-link" id="nav-frmtk-tab" data-bs-toggle="tab" data-bs-target="#nav-frmtk" type="button" role="tab" aria-controls="nav-frmtk" aria-selected="false">Form Takip</button>
    <button class="nav-link" id="nav-prg-tab" data-bs-toggle="tab" data-bs-target="#nav-prg" type="button" role="tab" aria-controls="nav-prg" aria-selected="false">Program Talebi</button>
    <button class="nav-link" id="nav-gprog-tab" data-bs-toggle="tab" data-bs-target="#nav-gprog" type="button" role="tab" aria-controls="nav-gprog" aria-selected="false">Güncel Programınız</button>
    <button class="nav-link" id="nav-mbox-tab" data-bs-toggle="tab" data-bs-target="#nav-mbox" type="button" role="tab" aria-controls="nav-mbox" aria-selected="false">Mesaj Kutusu</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Mesaj Gönder</button>
     <button class="nav-link" id="nav-gnd-tab" data-bs-toggle="tab" data-bs-target="#nav-gnd" type="button" role="tab" aria-controls="nav-gnd" aria-selected="false">Gönderilen Mesajlar</button>
      <button class="nav-link" id="nav-urun-tab" data-bs-toggle="tab" data-bs-target="#nav-urun" type="button" role="tab" aria-controls="nav-urun" aria-selected="false">Ürünler</button>
      <button class="nav-link" id="nav-sta-tab" data-bs-toggle="tab" data-bs-target="#nav-sta" type="button" role="tab" aria-controls="nav-sta" aria-selected="false">Satın Alma Geçmişi</button>




  </div>
</nav>


<!-- GİRİŞ -->
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

    HOŞGELDİNİZ.





    






  </div>


  <!-- PROFİL EDIT -->
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




<!-- ÜYELİK -->


<div class="tab-pane fade" id="nav-uye" role="tabpanel" aria-labelledby="nav-uye-tab">

<?php

error_reporting(0);
include("connection.php");
session_start();
$kulid=$_SESSION["id"]; 

$sor=$db->prepare("select gun from uye where id=:deger");
$sor->execute(array(
  'deger' => $kulid
));
$ver = $sor->fetch(PDO::FETCH_ASSOC);


echo "Üyelik mevcut gün sayınız : " ." ". $ver[gun] ." ". "gün.";

?>

<style>
  p{
    display:none;
  }
</style>
<br>

ÜYELİK YENİLEME

<form method="post" action="gunyukle.php">

<input type="radio" name="grup" id="rb5" value="1" onclick="checkMe()" required /> 
1 GÜN
<br>
<input type="radio" name="grup" id="rb4" value="30" onclick="checkMe()"/> 
1 AY
<br>
<input type="radio" name="grup" id="rb" value="90" onclick="checkMe()"/>
3 AY
<br>
<input type="radio" name="grup" id="rb2" value="180" onclick="checkMe()"/>
6 AY
<br>
<input type="radio" name="grup" id="rb3" value="360" onclick="checkMe()"/>
12 AY
<br>
<br>

İNDİRİM KODU 
<input type="text"  id="kod"/>

<div>
<p id="msg" name="tpl">TUTAR</p><p id="tl"> TL </p>
<input id="dene" type="hidden"  name="toplamm" />
<p id="msgg">DURUM</p>
</div>
  

<!-- <input type="submit" value="Kayıt Yenile"> -->
<button id="btn"  type="submit" onclick="myF()">Kayıt Yenile</button>


  
</form>

<button id="buton" onclick="add()">KODU UYGULA</button>


<script>
function checkMe(){
  var tl = document.getElementById("tl");

  var rb = document.getElementById("rb");
  var rb2 = document.getElementById("rb2");
  var rb3 = document.getElementById("rb3");
  var text= document.getElementById("msg");
  var tl= document.getElementById("tl");
  
 

  if(rb.checked==true){

    tl.style.display="block";
    text.style.display="block";
    document.getElementById("msg").innerHTML = "500";
  }else if(rb2.checked==true){
    tl.style.display="block";
    text.style.display="block";
      document.getElementById("msg").innerHTML = "800";
  }else if(rb3.checked==true){
    tl.style.display="block";
    text.style.display="block";
      document.getElementById("msg").innerHTML = "1000";

  }else if(rb4.checked==true){
    tl.style.display="block";
     text.style.display="block";
      document.getElementById("msg").innerHTML = "200";
  }else if(rb5.checked==true){
    tl.style.display="block";
     text.style.display="block";
      document.getElementById("msg").innerHTML = "30";
  }
}


function add(){

  var d,text;
  d=document.getElementById("kod").value;

  
 var a=document.getElementById("msg");
  var textt = document.getElementById("msgg");


if( d == "INDIRIM"){

  if(a !== "TUTAR"){

  var i=parseInt(document.getElementById("msg").textContent, 10); 

  var j=75/100;  
var k = Number(i) * Number(j);

document.getElementById("msg").innerHTML = k;


tl.style.display="block";

textt.style.display="block";
  document.getElementById("msgg").innerHTML = "INDIRIM UYGULANDI";

  document.getElementById("kod").disabled = true;
   document.getElementById("buton").disabled = true;

  }

  



}else{

  textt.style.display="block";
  document.getElementById("msgg").innerHTML = "GEÇERSİZ KOD";
}

 
}  

function myF() {
 
  var x = document.getElementById("msg").textContent;
  document.getElementById("dene").value=x;
}


  </script>
















</div>


<!-- BAKİYE İŞLEMLERİ -->

        <div class="tab-pane fade" id="nav-bakiye" role="tabpanel" aria-labelledby="nav-bakiye-tab">
          <?php

error_reporting(0);
include("connection.php");
session_start();
$kulid=$_SESSION["id"]; 

$sor=$db->prepare("select bakiye from uye where id=:deger");
$sor->execute(array(
  'deger' => $kulid
));
$ver = $sor->fetch(PDO::FETCH_ASSOC);


echo "Bakiyeniz : " ." ". $ver[bakiye] ." ". "TL";

?>
<form style="max-width:300px;margin-left: ;" action ="bakiyeyukle.php" method="post">  
<label class="sr-only">Yüklenecek tutar:</label> 
<input type="text" class="form-control" name="bakiye" required>
<label class="sr-only">KK NO:</label> 
<input type="text" class="form-control" required>
<label class="sr-only">SKT:</label> 
<input type="text" class="form-control" required>
<label class="sr-only">CCV:</label> 
<input type="text" class="form-control" required>
<br>

<button class="btn btn-lg btn-dark btn-block" type="submit">Bakiye Yükle</button>
</form>


        </div>

        <div class="tab-pane fade" id="nav-rnd" role="tabpanel" aria-labelledby="nav-rnd-tab">





<iframe style="width: 100%" height='1280' frameborder='0' src='randevu.php'></iframe>




        </div>


        <!-- FORM bılgıler -->
         <div class="tab-pane fade" id="nav-frm" role="tabpanel" aria-labelledby="nav-frm-tab">


          <form style="max-width:300px;margin-left: ;" action ="frmdegerler.php" method="post"> 

<label class="sr-only">Yaş:</label> 
<input type="text"  class="form-control" name="yas"    required>

<label class="sr-only">Boy: (cm örn: 189)</label> 
<input type="text"  class="form-control" name="boy"   required>

<label class="sr-only">Kilo: (kg)</label> 
<input type="text"  class="form-control" name="kilo"   required>

<label class="sr-only">Cinsiyet:</label> <br>

Erkek
<input type="radio" name="cinsiyet"  value="1"  required /> 
Kadın
<input type="radio" name="cinsiyet" value="2" />  


<button class="btn btn-lg btn-dark btn-block" type="submit">Ekle</button>

</form>





    



 



         </div>

<!--  FORM TAKİP --> 
 <div class="tab-pane fade" id="nav-frmtk" role="tabpanel" aria-labelledby="nav-frmtk-tab">




<iframe style="width: 100%" height='1280' frameborder='0' src='frmtakip.php'></iframe>



</form>
  </div>


         <!-- PROGRAM TALEBI  -->
          <div class="tab-pane fade" id="nav-prg" role="tabpanel" aria-labelledby="nav-prg-tab">
            


<?php 
include("connection.php");

ob_start();
session_start();




$sorgu=$db->prepare("select * from frmbilgi where uye_id=:deger");
$sorgu->execute(array(
'deger' => $kulid
));


$tur = $sorgu->fetch(PDO::FETCH_ASSOC);


$say=$sorgu->rowCount();

if($say==1) {

?>

   <div class="text-center">
    <form style="max-width:300px;margin:auto" action ="progtalep.php" method="post">
   

<hr>
<br>


<label for="password" class="sr-only">Hedef:</label>

  <select  name="hedef" class="form-select" id="inputGroupSelect02" required="required">
    <option value="">Hedefinizi seçiniz.</option>
    <option value="1">Kilo vermek</option>
    <option value="2">Kas kütlesi kazanmak.</option>
    <option value="3">Form korumak.</option>
    <option value="4">Kilo almak.</option>

  </select>

  <br>

  
  <label for="exampleFormControlTextarea1" class="form-label">Üye notu(isteğe bağlı): </label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="nt" ></textarea>
<br>

<button class="btn btn-lg btn-dark btn-block" type="submit">Program Talebi Oluştur</button>
</form>
</div>




<?php


}
else{


echo "<div style=\"width: 300px; \" class=\"alert alert-danger\" role=\"alert\">";
 echo " Yaş, boy, kilo, cinsiyet değerleri girilmemiş. Form takip sayfasından giriniz!";
echo "</div>";

}

?>

          </div>



<!--  PROGRAMINIZ  -->

 <div class="tab-pane fade" id="nav-gprog" role="tabpanel" aria-labelledby="nav-gprog-tab">

<?php 
session_start();
$kulid=$_SESSION["id"];    

       error_reporting(0);
include("connection.php");
foreach($db->query("SELECT * FROM programlar where uye_id = '$kulid'",PDO::FETCH_BOTH) as $row){




$ayır = explode (".",$row['program']);

foreach ($ayır as $deger){
  echo $deger;
  echo "<br>";
}

}




?>





  </div>


<!-- MESAJ KUTUSU -->
        <div class="tab-pane fade" id="nav-mbox" role="tabpanel" aria-labelledby="nav-mbox-tab"> 



            <?php
           
$kulid=$_SESSION["id"];    

       error_reporting(0);
include("connection.php");


foreach($db->query("SELECT * FROM mesajlar where alan_id = '$kulid' and durum='0' ORDER BY id DESC",PDO::FETCH_BOTH) as $row)
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


<!-- MESAJ GÖNDER -->
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


foreach($db->query("SELECT * FROM uye where id <> '$kulid' ",PDO::FETCH_BOTH) as $row)
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


<!-- GÖNDERİLEN MESAJLAR -->
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



<!-- ALIŞVERİŞ SEPETİ -->
<div class="tab-pane fade" id="nav-urun" role="tabpanel" aria-labelledby="nav-urun-tab">


<iframe style="width: 100%;" height='1280' frameborder='0' src='sepet.php'></iframe>

</div>

<div class="tab-pane fade" id="nav-sta" role="tabpanel" aria-labelledby="nav-sta-tab">






<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Alınan Ürün Adı</th>
      <th scope="col">Alınan Adet</th>
      <th scope="col">Tutar</th>
      <th scope="col">Tarih</th>
    </tr>
  </thead>
  <tbody>
    <tr>


      <?php

foreach($db->query("select urunler.name, urunler.price, satinalinan.alan_uye_id, satinalinan.adet, satinalinan.tarih from satinalinan inner join urunler on satinalinan.alinan_urun_id=urunler.id where satinalinan.alan_uye_id='$kulid'",PDO::FETCH_BOTH) as $row){
$tutar=$row[price]*$row[adet];

//echo $row[name]." ". $row[adet] ." ". "adet" ." ". $row[tarih] ." ". "TOPLAM TUTAR: " ." ". $row[adet]*$row[price] ." ". "TL" ." ". "<br>" ." ". "<hr>";



 echo     "<th scope=\"row\">-</th>";
  echo    "<td>$row[name]</td>";
  echo    "<td>$row[adet]</td>";
   echo   "<td>$tutar TL</td>";
echo     "<td>$row[tarih]</td>";
echo    "</tr>";
}

?>
  </tbody>
</table>








 </div>


  
</div>



  </div>
</div></div>








  </div></div>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>








    <?php 




}
?>





