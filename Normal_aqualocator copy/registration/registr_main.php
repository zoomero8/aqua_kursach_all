<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AQUA Navigator</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
</head>

<body>
  <div class="wrapper">
    <h2>Регистрация</h2>
    <form action="reg.php" method="POST" id="registrationForm">
      <div class="input-box">
        <input type="text" name="login" id="login" placeholder="Укажите ваш логин" required>
        <span id="loginError" class="error-message"></span>
      </div>
      <div class="input-box">
        <input type="text" name="email" id="email" placeholder="Укажите вашу почту" required>
        <span id="emailError" class="error-message"></span>
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

  <script>
    $(document).ready(function () {
      $("#login").on("input", function () {
        var loginValue = $(this).val();
        if (loginValue.length > 0) {
          $.post("check_login.php", { login: loginValue }, function (data) {
            $("#loginError").html(data);
          });
        } else {
          $("#loginError").html("");
        }
      });

      $("#email").on("input", function () {
        var emailValue = $(this).val();
        if (emailValue.length > 0) {
          $.post("check_email.php", { email: emailValue }, function (data) {
            $("#emailError").html(data);
          });
        } else {
          $("#emailError").html("");
        }
      });
    });
  </script>
</body>

</html>
