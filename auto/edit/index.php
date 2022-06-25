<?php
  require $_SERVER['DOCUMENT_ROOT'].'/auto/assets/templates/db_connect.php';
  $sql = 'SELECT * FROM `items` ORDER BY `items`.`id` DESC';
  $result = mysqli_query($conn, $sql);
  $items = mysqli_fetch_all($result, MYSQLI_ASSOC);

  session_start();

  if(isset($_POST['logout'])){
    header('Location: /auto/');
    session_destroy();
  }

  if($_SESSION["user"] != "a" && $_SESSION["pass"] != "a") header('Location: /auto/edit/login/');
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



<header class="edit wrapper" style="text-align: right;">
  <a href="/auto/">Главная страница</a>
  <form action="" method="post">
    <button name="logout" class="logout">Выйти</button>
  </form>
</header>

<main class="edit wrapper">
  <a href="add/" class="btn">Добавить</a>
  
  <?php
    $edit = 1;
    require $_SERVER['DOCUMENT_ROOT'].'/auto/assets/templates/items.php';
  ?>
</main>



<script src="../assets/script/script.js"></script>
</body>

</html>