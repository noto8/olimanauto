<?php
  require $_SERVER['DOCUMENT_ROOT'].'/auto/assets/templates/db_connect.php';
  $sql = 'SELECT * FROM `items`';
  $result = mysqli_query($conn, $sql);
  $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
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



<a href="edit/">edit</a>



<script src=""></script>
</body>

</html>