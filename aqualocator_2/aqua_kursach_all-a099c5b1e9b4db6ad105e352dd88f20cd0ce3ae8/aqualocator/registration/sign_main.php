<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> AQUA Navigator </title>
  <link rel="stylesheet" href="style.css">
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