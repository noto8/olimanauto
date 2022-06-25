<?php
  require $_SERVER['DOCUMENT_ROOT'].'/auto/assets/templates/db_connect.php';
  if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM items WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $item = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
  } else{
    $sql = 'SELECT * FROM `items`';
    $result = mysqli_query($conn, $sql);
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  //categories
  $result = mysqli_query($conn, "SELECT category FROM `items`");
  $categories = [];
  while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    if(strlen($row['category'])!=0) $categories[] =  $row['category'];
  }
  $categories = array_unique($categories);
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



<header class="wrapper">
  <a href="/auto/edit/">Назад</a>
</header>

<main class="add wrapper">
  <form action="uploading/" method="post" enctype="multipart/form-data">
    <!-- Images -->
    <span>Выберите<?php if(isset($_GET['id'])) echo " <u>дополнительные</u>"; ?> изображения:</span>
    <input type="file" name="image[]" required multiple>
    <?php
      if(isset($_GET['id'])){

      }
    ?>
    <!-- Name -->
    <textarea class="name" name="name" placeholder="Наименование" required><?php if(isset($_GET['id'])) echo $item['item_name']; ?></textarea>
    <!-- Description -->
    <textarea class="desc" name="desc" placeholder="Описание"><?php if(isset($_GET['id'])) echo $item['item_desc']; ?></textarea>
    <!-- Category -->
    <div class="category-container">
      <select name="category" id="">
        <option value="" disabled selected>Выберите категорию</option>
        <?php
          foreach($categories as $category) echo"
            <option value='".$category."'>".$category."</option>
          ";
        ?>
      </select>
      <textarea name="category" id="" placeholder="или введите новую"></textarea>
    </div>
    <input type="number" name="price" value="<?php if(isset($_GET['id'])) echo $item['price']; ?>" placeholder="Стоимость" >
    <button class="btn">Готово</button>
  </form>
</main>



<script src=""></script>
</body>

</html>