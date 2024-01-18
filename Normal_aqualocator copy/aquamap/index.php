<?php
include __DIR__ . '/../registration/session.php';

$termsQuery = "SELECT * FROM swimpools";
$termsResult = mysqli_query($mysql, $termsQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<header id="header" class="site-header position-fixed z-2 w-100 border-bottom mb-5">
    <nav id="header-nav" class="navbar navbar-expand-lg py-2 bg-white">
      <div class="container-lg">
        <a class="navbar-brand pb-4" href="index.php">
          <div class="logo">
            <span class="logo-text">AQUA NAVIGATOR</span>
          </div>
        </a>
        <button class="navbar-toggler d-flex d-lg-none order-3 p-2 border-0 shadow-none bg-white" type="button">
          <svg class="navbar-icon" width="50" height="50">
            <use xlink:href="#navbar-icon"></use>
          </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
          <div class="offcanvas-header px-4 pb-0">
            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"
              data-bs-target="#bdNavbar"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav scrollspy-nav justify-content-end flex-grow-1 gap-lg-5 pe-3">
              <li class="scrollspy-link nav-item">
                <a class="nav-link text-dark" data-target="products" href="../aquamap/index.php">Карта бассейнов</a>
              </li>
              <li class="scrollspy-link nav-item">
                <a class="nav-link text-dark" data-target="products" href="../allswims/pools.php">Бассейны</a>
              </li>
              <?php
              

              if (isLoggedIn()) {
                // Если пользователь вошел в аккаунт, отобразите кнопку "Личный кабинет" и "Выйти"
                echo '<li class="scrollspy-link nav-item">
                    <a class="nav-link text-dark" href="../registration/user_profile.php">Личный кабинет</a>
                  </li>';
                echo '<li class="scrollspy-link nav-item">
                    <a class="nav-link text-dark" href="../registration/logout.php">Выйти</a>
                  </li>';
              } else {
                // Если пользователь не вошел в аккаунт, отобразите кнопки "Войти" и "Зарегистрироваться"
                echo '<li class="scrollspy-link nav-item">
                    <a class="nav-link text-dark" data-target="products" href="../registration/sign_main.php">Войти</a>
                  </li>';
                echo '<li class="scrollspy-link nav-item">
                    <a class="nav-link text-dark" data-target="products" href="../registration/registr_main.php">Зарегистрироваться</a>
                  </li>';
              }
              ?>
              <span class="scrollspy-indicator"></span>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
<a href="../main/index.php" class="map-main-button">Главная</a>
<a href="../main/index.php" class="newmain-button">Бассейны</a>
<h1 class="display-2 text-center mx-auto" data-aos="fade-up" data-aos-delay="200">
    Карта бассейнов
</h1>

	<div id="map-test" class="map"></div>
	<script src="https://api-maps.yandex.ru/2.1/?apikey=7151535c-198c-4f28-af73-23eab7883cff&lang=ru_RU">
	</script>
	<script src="script.js"></script>
</body>
<footer id="footer" class="footer mt-auto py-lg-7 bottom">
    <div class="footer-bottom py-3 text-center">
        <div class="container-lg">
            <p class="m-0">
                © 2024 AQUA Navigator.
            </p>
        </div>
    </div>
</footer>
</html>