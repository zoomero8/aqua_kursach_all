<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="./style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
	href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
	rel="stylesheet"
  />

</head>
<body>
<h2></h2>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="register.php" method="POST"> <!-- Обновленный атрибут action и method -->
            <h1>Регистрация</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-google"></i></a>
                <a href="#" class="social"><i class="fab fa-vk"></i></a>
            </div>
            <span>или используйте почту для регистрации</span>
			<input type="text" name="login" placeholder="Логин" />
            <input type="email" name="email" placeholder="Почта" />
            <input type="password" name="password" placeholder="Пароль" />
			<input type="text" name="name" placeholder="ФИО" />
            <button type="submit" name="register">Создать</button>
        </form>
    </div>
	<div class="form-container sign-in-container">
		<form action="login.php" method="POST">
			<h1>Вход</h1>
			<input type="text" name="login" placeholder="Логин" />
			<input type="password" name="password" placeholder="Пароль" />
			<a href="#">Забыли свой пароль?</a>
			<button>Войти</button>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-google"></i></a>
				<a href="#" class="social"><i class="fab fa-vk"></i></a>
			</div>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>С возвращением!</h1>
				<p>Чтобы оставаться на связи с нами, пожалуйста, войдите в систему, указав свои личные данные</p>
				<button class="ghost" id="signIn">Войти</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Здравствуйте!</h1>
				<p>Укажите персональные данные и начните эффективно пользоваться нашим сервисом</p>
				<button class="ghost" id="signUp">создать</button>
			</div>
		</div>
	</div>
</div>

<footer>
</footer>
  <script  src="./script.js"></script>
</body>
</html>