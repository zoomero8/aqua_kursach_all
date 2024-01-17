<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> AQUA Navigator </title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper">
    <h2>Регистрация</h2>
    <form action="reg.php" method="POST">
      <div class="input-box">
        <input type="text" name="login" placeholder="Укажите ваш логин" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Укажите вашу почту" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Придумайте пароль" required>
      </div>
      <div class="input-box">
        <input type="text" name="name" placeholder="Укажите ваше имя" required>
      </div>
      <div class="input-box button">
        <input type="Submit" value="Зарегистрироваться">
      </div>
      <div class="text">
        <h3>Уже зарегистрированы? <a href="sign_main.php">Войти</a></h3>
      </div>
    </form>
  </div>
</body>

</html>