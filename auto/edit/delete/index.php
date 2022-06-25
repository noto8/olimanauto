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



<?php
  require $_SERVER['DOCUMENT_ROOT'].'/auto/assets/templates/db_connect.php';
  $sql = "DELETE FROM items WHERE id=$id";
  if ($conn->query($sql) === FALSE){
    echo "Ошибка: Не удалось удалить. Повторите попытку или обратитесь к администратору.";
    // echo "Error deleting record: " . $conn->error;
  }
  $conn->close();
  header('Location: /auto/edit/');
?>



<script src=""></script>
</body>

</html>