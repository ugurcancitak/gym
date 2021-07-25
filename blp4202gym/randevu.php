<!DOCTYPE html>
<html>
<head>
	<title></title>

	   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>


<?php
error_reporting(0);
include("connection.php");
foreach($db->query("select * from randevu where durum='0' ",PDO::FETCH_BOTH) as $row){  ?>
<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="x<?php echo $row[id]; ?>">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cx<?php echo $row[id]; ?>" aria-expanded="false" aria-controls="cx<?php echo $row[id]; ?>">Saat Aralığı: <?php  echo $row[saat]; ?>

      </button>
    </h2>
    <div id="cx<?php echo $row[id]; ?>" class="accordion-collapse collapse" aria-labelledby="x<?php echo $row[id]; ?>" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tarih</th>
      <th scope="col">Saat</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['tarih']; ?></td>
      <td><?php echo $row['saat']; ?></td>


    </tr>
   </tbody>
</table>







    <form action ="randevual.php" method="post">
<div style="" id="myDIV">

   <input type="hidden" value="<?php echo $row[id]; ?>" name="randevu" />





  <button style="width: 100%;" type="submit" class="btn btn-lg btn-dark btn-block">Ayırt</button>
</div>

</form>



         



      </div>
    </div>
  </div>
  
</div>



<?php



}

?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>



