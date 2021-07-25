<?php 
 error_reporting(0);
include("connection.php");
ob_start();
session_start();
 
if(!isset($_SESSION["login"])){

  ?>
    
    <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    

    <link rel="shortcut icon" type="image/png" href="img/sekme_logo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>BLP4202 GYM </title>
<link href="./css/styles.css" rel="stylesheet">
  </head>
  <body>
  <header id="header">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark py-2 ">
  <div class="container">
    <a class="navbar-brand" href="index.php"><img src="img\lg1.png"/></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">GİRİŞ YAP</a>



<form action ="op.php" method="post" class="dropdown-menu p-4" style=" background-color: #292b2c;">
  <span class="navbar-brand mb-0 h1">ÜYE GİRİŞİ</span>
  <hr>
  <a class="navbar-brand"><img src="img\lg1.png"/></a>
  <hr>
  <div class="mb-3 text-center" style="width: 250px;" >
    <label for="exampleDropdownFormEmail2" class="form-label" style="color: white;">KULLANICI E-POSTA</label>
    <input type="email"  class="form-control" id="exampleDropdownFormEmail2" name="kmail" placeholder="mail@mail.com ">
  </div>

    
   

  <div class="mb-3 text-center">
    <label for="exampleDropdownFormPassword2" class="form-label" style="color: white;">ŞİFRE</label>
    <input type="password"  class="form-control" id="exampleDropdownFormPassword2" name="ksif" required placeholder="Şifreniz.">
  </div>
  
  <button type="submit" class="btn btn-light d-grid gap-6 col-6 mx-auto">Giriş yap</button>
</form>


        </li>


          <li class="nav-item">
          <a class="nav-link" href="register.php">KAYIT OL</a>
        </li>
        
            <li class="nav-item">
          <a class="nav-link" href="iletisim.php">İLETİŞİM</a>
        </li>
         </li>
            <li class="nav-item">
          <a class="nav-link" href="deneme.php">EKİBİMİZ</a>
        </li>
       
           <li class="nav-item">
          <a class="nav-link" href="forum.php">FORUM</a>
        </li>

      
      </ul>
 
    </div>
  </div>
</nav>
    </header>
<section class="darkbg" id="hero">
  <div class="container">
<div class="d-flex h-100 flex-column text-light justify-content-center">
<h1 class="display-1">BLP4202 SPOR SALONU</h1>
<p class="lead">1995'den beri sizlerle...</p>


</div>
  </div>
</section>


<section class="py-5" id="about">
<div class="container">
<h2 class="display-5 text-danger mb-4">NEDEN BLP4202 GYM ?</h2>
<div class="row mb-3">
<div class="col-7 bg-light">

  <div class="d-flex flex-column h-100 justify-content-center">
    <p> Hedefiniz ister kilo vermek, ister kas kütlesi inşa etmek, isterseniz de arkadaşlarınız ile antreman yapmak olsun.
      Salonumuz bütün ihtiyaçlarınızı karşılayacaktır. Geniş ve ferah ortama sahip spor salonlarımızda gelişmiş havalandırma sistemlerimiz sayesinde rahatça spor yapabileceksiniz.
      İsterseniz kardiyo kısmında kilo vermeye başlayabilir, isterseniz vücut geliştirme ve ağırlık bölümümüzde kas kütlesi inşa edebilirsiniz. Geniş spor aleti yelpazesi ile her türlü ihtiyacınıza rahatça cevap bulabileceksiniz.
     
      </p>
  </div>

  </div>
   <div class="col-2">
  <img class="img-fluid" src="img\gym.jpg" />
 </div>
</div>

<div class="row">
<div class="col-7 bg-light">

  <div class="d-flex flex-column h-100 justify-content-center">
    <p> Sizde bir an önce kayıt olup hayatınızı değiştirmeye başlayabilirsiniz.
     Uzman ekibimiz sayesinde kişinin ihtiyacına, isteğine göre farklı antreman programları ayarlanmaktadır.
      Ayrıca yine ihtiyaca göre hazırlanan beslenme programı ile size tam destek sağlamaktayız.
       Aydan aya takip edilip ihtiyaca göre programlarda değişime gidilerek sizi hedeflediğiniz vücuda ulaştırmak amacı ile hep yanınızda olacağız.
     Haydi sen de değişime bir adım at. İndirim kodunuz var ise uygulamayı unutmayınız. </p>
  </div>

  </div>
   <div class="col-2 order-first">
  <img class="img-fluid" src="img\pt.jpg" />
 </div>
</div>



</div>
</section>



<div class="ff">
    <blockquote class="blockquote mb-0">
      <br>
      <p align="center">BLP4202GYM 1995-2021  
      </p>
  </footer>
    </blockquote>
  </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>
 

 <?php
}
else {
    ?>   
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="img/sekme_logo.png"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>BLP4202 GYM</title>
<link href="./css/styles.css" rel="stylesheet">
  </head>
  <body>
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
          <a class="nav-link" href="profile.php">PROFIL</a>
        </li>


        
            <li class="nav-item">
          <a class="nav-link" href="iletisim.php">İLETİŞİM</a>
        </li>
         </li>
            <li class="nav-item">
          <a class="nav-link" href="deneme.php">EKİBİMİZ</a>
        </li>
       
           <li class="nav-item">
          <a class="nav-link" href="forum.php">FORUM</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">ÇIKIŞ YAP</a>
        </li>
      
      </ul>
 
    </div>
  </div>
</nav>
    </header>
<section class="darkbg" id="hero">
  <div class="container">
<div class="d-flex h-100 flex-column text-light justify-content-center">
<h1 class="display-1">BLP4202 SPOR SALONU</h1>
<p class="lead">1995'den beri sizlerle...</p>


</div>
  </div>
</section>


<section class="py-5" id="about">
<div class="container">
<h2 class="display-5 text-danger mb-4">NEDEN BLP4202 GYM ?  </h2>
<div class="row mb-3">
<div class="col-7 bg-light">

  <div class="d-flex flex-column h-100 justify-content-center">
    <p> Hedefiniz ister kilo vermek, ister kas kütlesi inşa etmek, isterseniz de arkadaşlarınız ile antreman yapmak olsun.
      Salonumuz bütün ihtiyaçlarınızı karşılayacaktır. Geniş ve ferah ortama sahip spor salonlarımızda gelişmiş havalandırma sistemlerimiz sayesinde rahatça spor yapabileceksiniz.
      İsterseniz kardiyo kısmında kilo vermeye başlayabilir, isterseniz vücut geliştirme ve ağırlık bölümümüzde kas kütlesi inşa edebilirsiniz. Geniş spor aleti yelpazesi ile her türlü ihtiyacınıza rahatça cevap bulabileceksiniz.
     
      </p>
  </div>

  </div>
   <div class="col-2">
  <img class="img-fluid" src="img\gym.jpg" />
 </div>
</div>

<div class="row">
<div class="col-7 bg-light">

  <div class="d-flex flex-column h-100 justify-content-center">
    <p> Sizde bir an önce kayıt olup hayatınızı değiştirmeye başlayabilirsiniz.
     Uzman ekibimiz sayesinde kişinin ihtiyacına, isteğine göre farklı antreman programları ayarlanmaktadır.
      Ayrıca yine ihtiyaca göre hazırlanan beslenme programı ile size tam destek sağlamaktayız.
       Aydan aya takip edilip ihtiyaca göre programlarda değişime gidilerek sizi hedeflediğiniz vücuda ulaştırmak amacı ile hep yanınızda olacağız.
     Haydi sen de değişime bir adım at. İndirim kodunuz var ise uygulamayı unutmayınız. </p>
  </div>

  </div>
   <div class="col-2 order-first">
  <img class="img-fluid" src="img\pt.jpg" />
 </div>
</div>



</div>
</section>



<div class="ff">
    <blockquote class="blockquote mb-0">
      <br>
      <p align="center">BLP4202GYM 1995-2021</p>
  </footer>
    </blockquote>
  </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  </body>
</html>




    <?php 

}
?>



