<!DOCTYPE html>
<html>
<head>
<style>
table
{	font-family:cooper black;	font-size:20px; }</style>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<title></title>
</head>
<body>



	 <form style="max-width:300px;margin-left: ;" action ="frmdegerler.php" method="post"> 
<label class="sr-only">Güncel kilonuz:</label> 
<input type="text"  class="form-control" name="kkg" number   required>
<label class="sr-only">Güncel bel ölçüsü(cm):</label> 
<input type="text"  class="form-control" name="bcm"  number  required>
<label class="sr-only">Güncel kol ölçüsü(cm):</label> 
<input type="text"  class="form-control" name="kcm"  number  required>
<button class="btn btn-lg btn-dark btn-block" type="submit">Ekle</button>



</form>
  </div>

<hr>
   <form  style="max-width:300px;   margin-left:auto;
      margin-right:auto;

      width:70%;"action="<?=$_SERVER['PHP_SELF']?>" method="post">

    <select  name="graf" class="form-select" id="inputGroupSelect02" required="required">
    	<br>
    <option value="">Oluşturulacak grafik</option>
    <br>
    <option value="kilo">Kilo değişimi</option>
    <option value="bel">Bel ölçüsü değişimi</option>
    <option value="kol">Kol ölçüsü değişimi</option>


   

  </select>
  <br>

  <button  style="margin-left:50px; "class="btn btn-lg btn-dark btn-block" type="submit">GRAFİK OLUŞTUR</button>


</form>

<?php 



include("connection.php");
echo "<table  border=0 cellspacing=17 cellpadding=5 align=center>";
ob_start();
session_start();
error_reporting(0);

$kulid=$_SESSION["id"];

  if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $graf=$_POST['graf'];
            foreach($db->query("SELECT * FROM frmtakip where uye_id='$kulid' ",PDO::FETCH_BOTH) as $kyt){

		
			
	$yukseklik=$kyt[$graf]*4;

			echo  " <div style=\"float: left; margin-left: 200px;\" ><td valign=bottom align=center >$kyt[tarih]<br>
			<img src='./img/bar_1.png' height=$yukseklik width=75><br>$kyt[$graf]</td></div>";

	
		}

            
        }

?>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>


</html>