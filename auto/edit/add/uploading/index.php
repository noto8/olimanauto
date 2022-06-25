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
  <link rel="stylesheet" href="style/style/style.css?v=<?php echo time();?>">
</head>

<body>



<?php
  $target_dir = $_SERVER['DOCUMENT_ROOT'].'/auto/assets/style/images/items/';
  $img_count = sizeof($_FILES["image"]["name"]);
  $img_names = [];
  $target_files = [];
  $imageFileType = [];
  for($i=0; $i<$img_count; $i++){
    $img_names[$i] = $_FILES["image"]["name"][$i];
    $target_files[$i] = $target_dir . $img_names[$i];
    $imageFileTypes[$i] = strtolower(pathinfo($target_files[$i],PATHINFO_EXTENSION));
  }
  $uploadOk = 1;

  // Check if image file is a actual image or fake image
  for($i=0; $i<$img_count; $i++){
    $check = getimagesize($_FILES["image"]["tmp_name"][$i]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "Ошибка: Один из выбранных файлов - не изображение.";
      $uploadOk = 0;
      break;
    }
  }

  // Check if file already exists
  for($i=0; $i<$img_count; $i++){
    if(file_exists($target_files[$i])){
      for($j=1; file_exists($target_files[$i]); $j++){
        $img_name_new = str_replace(".".$imageFileTypes[$i], "", $img_names[$i])." (".$j.").".$imageFileTypes[$i];
        $target_files[$i] = $target_dir . $img_name_new;
      }
      $img_names[$i] = $img_name_new;
    }
  }

  // Check if $uploadOk is set to 0 by an error
  if($uploadOk){
    $id = 0;
    foreach($items as $item) if($item['id']>$id) $id = $item['id'];
    $id++;
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    for($i=0; $i<$img_count; $i++){
      if(move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target_files[$i])){
        //uploaded
      } else {
        echo "Ошибка: Не удалось выгрузить изображения.";
      }
    }
    $img_names = implode("\n", $img_names);
  }
  $sql = "INSERT INTO items (id, img, item_name, item_desc, price) VALUES ('$id', '$img_names', '$name', '$desc', '$price')";
  if ($conn->query($sql) === TRUE) {
    //connected
  } else {
    echo "Ошибка: Не удалось вдести данные в БД (обратитесь к администратору).";
    // echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
  header('Location: /auto/edit/');
?>



<script src=""></script>
</body>

</html>