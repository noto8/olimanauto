<?php
  if(sizeof($_POST)){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if($user == "a" && $pass == "a"){
      session_start();
      $_SESSION["user"] = $user;
      $_SESSION["pass"] = $pass;
      header('Location: /auto/edit/');
    }
    else echo "Неправильный логин/пароль.";
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



<main class="login wrapper">
  <form method="POST" class="login">
    Логин<br><input type="text" name="user" required></input><br/>
    Пароль<br><input type="password" name="pass" required></input><br/>
    <button class="btn min">Войти</button>
  </form>
</main>



<script src=""></script>
</body>

</html>