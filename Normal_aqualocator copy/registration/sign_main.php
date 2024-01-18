<?php
include "session.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка заполненности полей
    if (empty($_POST["login"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["name"])) {
        echo "Заполните все поля.";
        exit();
    }

    // Проверка формата почты
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Укажите корректный адрес электронной почты.";
        exit();
    }
}
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> AQUA Navigator </title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <div class="wrapper">
    <h2>Войти</h2>
    <form action="sign.php" method="POST">
      <div class="input-box">
        <input type="text" name="login"placeholder="Укажите ваш логин" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Укажите ваш пароль" required>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Войти">
      </div>
      <div class="text">
        <h3>Еще нет аккаунта? <a href="registr_main.php">Зарегистрироваться</a></h3>
      </div>
    </form>
  </div>
</body>


</html>