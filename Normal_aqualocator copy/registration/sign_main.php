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
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
</head>

<body>

  <header>
    <div class="container">
      <a href="../main/index.php" class="left-button">AQUA Navigator</a>
      <div class="right-buttons">
        <a href="../aquamap/index.php" class="right-button">Карта бассейнов</a>
        <a href="../allswims/pools.php" class="right-button">Бассейны</a>
        <?php
        if (isLoggedIn()) {
          // Если пользователь вошел в аккаунт, отобразите кнопку "Личный кабинет" и "Выйти"
          echo '<a class="right-button" href="../registration/user_profile.php">Личный кабинет</a>';
          echo '<a class="right-button" href="../registration/logout.php">Выйти</a>';
        } else {
          // Если пользователь не вошел в аккаунт, отобразите кнопки "Войти" и "Зарегистрироваться"
          echo '<a class="right-button" data-target="products" href="../registration/sign_main.php">Войти</a>';
          echo '<a class="right-button" data-target="products" href="../registration/registr_main.php">Зарегистрироваться</a>';
        }
        ?>
      </div>
    </div>
  </header>
  <div class="wrapper">
    <h2>Войти</h2>
    <form action="sign.php" method="POST">
      <div class="input-box">
        <input type="text" name="login" placeholder="Укажите ваш логин" required>
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