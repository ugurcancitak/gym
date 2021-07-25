<!DOCTYPE html>
<html>
<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <title></title>
</head>
<body>
<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "blp4202gym");
error_reporting(0);

if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))
  {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'     =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'   =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    }
    else
    {
      echo '<script>alert("Ürün zaten eklendi.")</script>';
    }
  }
  else
  {
    $item_array = array(
      'item_id'     =>  $_GET["id"],
      'item_name'     =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_quantity'   =>  $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}

if(isset($_GET["action"]))
{
  if($_GET["action"] == "delete")
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["item_id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("Ürün silindi.")</script>';
        echo '<script>window.location="sepet.php"</script>';
      }
    }
  }
}

?>
    <br />

    <div style="border: 1px solid #333; background-color:#f1f1f1; border-radius:5px; margin-bottom: 25px; padding:16px;" >
      <br />
      <br />
      <br />
      <h3 align="center">ÜRÜNLER </a></h3><br />
      <br /><br />
      <?php
        $query = "SELECT * FROM urunler ORDER BY id ASC";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_array($result))
          {
        ?>
      <div >
        <form method="post" action="sepet.php?action=add&id=<?php echo $row["id"]; ?>">
          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; margin-bottom: 25px; padding:16px; float:left; margin-left: 25px;" align="center">
            <img src="img/lg1.png" class="img-responsive" /><br />
<!-- <img src="images/<?php echo $row["image"]; ?>" class="img-responsive" /><br /> -->
            <h4 class="text-info"><?php echo $row["name"]; ?></h4>

            <h4 class="text-danger"> <?php echo $row["price"]; ?> TL</h4>

            <h4 class="text-dark">Açıklama: Ürün açıklaması</h4>

            <input type="text" name="quantity" value="1" class="form-control" />

            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Sepete Ekle" />

          </div>
        </form>
      </div>
      <?php
          }
        }
      ?>
      <div style="clear:both"></div>
      <br />
      

      <h3>Sipariş Özeti</h3>
      <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <th width="40%">Ürün Adı</th>
            <th width="10%">Adet</th>
            <th width="20%">Fiyat</th>
            <th width="15%">Toplam</th>
            <th width="5%">-</th>
          </tr>

          <?php 
             $alinanlar = [];
          $alinanadet = [];
          ?>
          <?php
       
          if(!empty($_SESSION["shopping_cart"]))
          {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
          ?>
          <form action="satinal.php" method="POST">

          <tr>
            <td><?php echo $values["item_name"]; ?></td>

            <td>  
         


           
            <input type="hidden" name="<?php echo $values["item_id"]; ?>" 
             value="<?php echo $total; ?>"><?php
             echo $values["item_quantity"];  ?></td>
            <td><?php echo $values["item_price"]; ?> TL</td>
            <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> TL</td>

            <td><a href="sepet.php?action=delete&id=<?php echo $values["item_id"]; ?>"  ><span class="text-danger">Sil</span></a></td>
            <!-- <input type="hidden" name="dizi_post1" value="<?php echo serialize($alinanlar);?>"> -->
            <!-- <input type="hidden" name="dizi_post2" value="<?php echo serialize($alinanadet);?>">  -->
             <!-- $yeni = array_pust($alinanadet, $values["item_quantity"]);
$yeni = array_push($alinanlar, $values["item_id"]);  -->


<input type="hidden" name="dizi_post1[]" value="<?php echo $values["item_id"];?>" />
<input type="hidden" name="dizi_post2[]" value="<?php echo $values["item_quantity"];?>" />
<!-- <input type="hidden" name="dizi_post[]" value="<?php echo serialize($alinanlar);?>" /> -->


          </tr>

          <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
             

            }
          ?> 
 

          <tr>
            <td colspan="3" align="right">TUTAR</td>
            <td name="toplam" align="right"><input type="hidden" name="toplam" value="<?php echo $total; ?>"><?php echo number_format($total, 2); ?> TL</td>
            <td></td>


          </tr>
          <?php
         
          }
          ?>
            


        </table>

<input class="btn btn-success" type="submit" value="SATIN AL">
         <hr>


          

       

      
</form>
      </div>
<!-- buraya -->

    </div>


  </div>
  <br />




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>