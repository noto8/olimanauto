<?php
  require $_SERVER['DOCUMENT_ROOT'].'/auto/assets/templates/db_connect.php';
  if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM items WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
  }
  
  $imgs = explode("\n", $item['img']);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="icon" href="style/images/0">
  <link rel="stylesheet" href="/auto/assets/style/style/style.css?v=<?php echo time();?>">
</head>

<body>



<main class="details wrapper">
  <section>
    <h2><?php echo $item['item_name']; ?></h2>
    <article>
      <!-- Left -->
      <div class="left">
        <div class="price">
          <?php
            $price = $item['price'];
            for($i=strlen($price)-1; $i>=0; $i--){
              echo $price[strlen($price)-$i-1];
              if($i%3==0 && $i>0) echo " ";
            }
            echo " ₽";
          ?>
        </div>
        <div class="btn primary">Заказать</div>
      </div>
      <!-- Carousel -->
      <div class="right" data-item="-1">
        <?php
          $imgs = explode("\n", $item['img']);
          require '../assets/templates/carousel.php';
        ?>
      </div>
    </article>

    <p><?php echo $item['item_desc']; ?></p>
  </section>
</main>



<script src="../assets/script/script.js"></script>
</body>

</html>