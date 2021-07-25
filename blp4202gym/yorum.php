





<?php 
 error_reporting(0);
include("connection.php");
ob_start();
session_start();
 
if(!isset($_SESSION["login"])){
    
	$msg = "Üye girişi gereklidir.";
echo "<script type='text/javascript'>alert('$msg');</script>";

header("Location: login.php");
}
else {
    ?>   

<!DOCTYPE html>
<html>
<head>
	<link href="./css/fstyle.css" rel="stylesheet">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title></title>
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
          <a class="nav-link" >YORUM SAYFASI</a>
        </li>
      
      </ul>
 
    </div>
  </div>
</nav>
    </header>

    <br>
    <hr>


   <div class="text-center">
    <form style="max-width:300px;margin:auto" action ="yorumekle.php" method="post">
   
<img class="mt-5 mb-5" src="img/lg1.png" />
<hr>
<br>

  
  <label for="exampleFormControlTextarea1" class="form-label">Yorumunuz:</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="yorum" required autofocus></textarea>


<label for="password" class="sr-only">Değerlendir:</label>
<div class="input-group mb-3">
  <select  name="puan" class="form-select" id="inputGroupSelect02" required="required">
    <option value="">İşletmeyi 5 üzerinden puanlayınız...</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>

</div>



<div class="mt-3">
<button class="btn btn-lg btn-dark btn-block" type="submit">Yorumu kaydet.</button>
</div>
    </form>
</div>

  
  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>





    <?php 




}
?>
