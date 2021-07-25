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
          <a class="nav-link" href="#">FORUM SAYFASI</a>
        </li>
      
      </ul>
 
    </div>
  </div>
</nav>
    </header>


    <div style="
    margin: auto;
    position: relative;
    font-family: Impact;
font-size: 42px;
color: #878787;
letter-spacing: 4px;
word-spacing: 0px;
font-weight: 400;
font-style: normal;
text-decoration: none;
display: inline-block;
padding: 21px 21px;
border-radius: 20px;
background: #FAFAFA;
text-shadow: 7px 5px 14px #d6d3d3;
align-items: center;
">ÜYE YORUMLARI - BLP4202 SPOR SALONU </div>




       <?php
       error_reporting(0);
include("connection.php");
$verilen="";
$verilmeyen="";
$yorumno="0";

foreach($db->query('SELECT * FROM yorumlar',PDO::FETCH_BOTH) as $row)
{
echo "<table class=\"blueTable\">";
echo "<thead>";
echo "<tr>";
echo "<th>Yorumun girildiği tarih ve saat: $row[tarih]</th>";
echo "</tr>";
echo "</thead>";
echo "<tfoot>";
echo "<tr>";
echo "<td colspan=\"1\">";
echo "<div class=\"links\"> <a class=\"active\" href=\"#\"> "?> <?php session_start();
  error_reporting(0);
include("connection.php");

$sor=$db->prepare("select * from uye where id=(select yorum_yapan_id from yorumlar where id=:deger)");
$sor->execute(array(
  'deger' => $row[id]
));


$ver = $sor->fetch(PDO::FETCH_ASSOC);

echo "Yorum Yapan Kişi :" ." ".$ver['ad']." ".$ver['soyad'];     ?>    <?php echo "</a><a class=\"active\" href=\"#\">Üye Puanı: $row[puan]/5 " ?> <?php for ($i=0; $i < $row[puan] ; $i++) { 
	$verilen= $verilen." "."⭐";
} 
for ($i=0; $i < 5-($row[puan]); $i++) { 
	$verilmeyen= $verilmeyen." "."☆";
}

echo $verilen." ".$verilmeyen; 
$verilen = ""; $verilmeyen=""; ?>  <?php "</a></div>";
echo "</td>";
echo "</tr>";
echo "</tfoot>";
echo "<tbody>";
echo "<tr>";
echo "<td> - $row[yorum]</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "<hr>";



}
?>

<br>
<hr>
<br>
<div class="d-grid gap-2 col-2 mx-auto" >
  <a href="yorum.php"><button class="btn btn-dark" type="button">YORUM EKLE</button> </a>
 </div>


  
  





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>





