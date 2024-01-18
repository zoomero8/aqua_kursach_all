<!DOCTYPE html>
<html>

<head>
  <title>AQUAnavigator</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
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
              include __DIR__ . '/../registration/session.php';

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
  <section id="intro" class="scrollspy-section py-5">
    <div class="container-lg">
      <div class="row align-items-center text-center py-4 mt-4">
        <div class="col-lg-6 mb-5">
          <h1 class="display-1 fw-bold" data-aos="fade-up" data-aos-delay="200">
            AQUA Navigator
          </h1>
          <p class="lead my-4" data-aos="fade-up" data-aos-delay="400">
            Бассейны Вашего Города.
          </p>
          <a href="../allswims/pools.php" class="main-button">Перейти к сервису</a>
        </div>
        <div class="col-lg-6">
          <img src="../images/water-deep.png" alt="banner-image" class="rounded-4 img-fluid" data-aos="fade-up"
            style="max-width: 85%;" />
        </div>
      </div>
    </div>
  </section>
  <section id="services" class="scrollspy-section py-lg-7">
    <div class="container-lg">
      <div class="col-lg-7 text-center mx-auto py-5" data-aos="fade-up" data-aos-delay="200">
        <h2 class="display-3 fw-bold">Почему AQUA Navigator?</h2>
        <p class="lead m-4">
          AQUA Navigator - сервис для поиска бассейнов. Находите лучшие объекты, получайте информацию о расписании и
          адресах.
          Регулярные обновления данных обеспечивают актуальность
          информации. Ваш идеальный бассейн всегда под рукой с AQUA Navigator!
        </p>
      </div>
      <div class="row " data-aos="fade-up" data-aos-delay="200">
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="icon-box text-center border py-lg-7 px-3 rounded-4">
            <div class="icon-box-icon mb-3">
              <svg class="balloon svg-primary" width="50" height="50">
                <use xlink:href="#balloon"></use>
              </svg>
            </div>
            <div class="icon-box-content ps-3">
              <h4 class="fs-3 fw-medium text-capitalize">
                Удобство интерфейса
              </h4>
              <p> Простой и интуитивно понятный интерфейс для легкого поиска и использования функций сайта</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="icon-box text-center border py-lg-7 px-3 rounded-4">
            <div class="icon-box-icon mb-3">
              <svg class="bag-heart svg-primary" width="50" height="50">
                <use xlink:href="#bag-heart"></use>
              </svg>
            </div>
            <div class="icon-box-content ps-3">
              <h4 class="fs-3 fw-medium text-capitalize">
                Доступность для всех
              </h4>
              <p>Специальная функция для поиска бассейнов, удовлетворяющих потребностям всех людей</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
          <div class="icon-box text-center border py-lg-7 px-3 rounded-4">
            <div class="icon-box-icon mb-3">
              <svg class="handiplast svg-primary" width="50" height="50">
                <use xlink:href="#handiplast"></use>
              </svg>
            </div>
            <div class="icon-box-content ps-3">
              <h4 class="fs-3 fw-medium text-capitalize">
                Комлексная информация
              </h4>
              <p>Актульаная информация о бассейнах.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contact-us">
    <div class="container-lg">
      <div class="row">
        <div class="display-header mt-0 text-center mb-5">
          <h2 class="display-3 fw-medium">Наши контакты</h2>
          <p class="fs-5">Свяжитесь с нами для получения большей информации</p>
        </div>
        <div class="contact-content">
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-3">
              <div class="icon-box d-flex flex-wrap align-items-center justify-content-center border rounded-4 p-5">
                <div class="icon-box-icon me-3">
                  <svg class="call-chat svg-primary" width="80" height="80">
                    <use xlink:href="#call-chat" />
                  </svg>
                </div>
                <div class="icon-box-content">
                  <p class="mb-0">+7 (999) - 888 00 11</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
              <div class="icon-box d-flex flex-wrap align-items-center justify-content-center border rounded-4 p-5">
                <div class="icon-box-icon me-3">
                  <svg class="mail svg-primary" width="80" height="80">
                    <use xlink:href="#mail" />
                  </svg>
                </div>
                <div class="icon-box-content">
                  <p class="mb-0">aquanav@gmail.com</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
              <div class="icon-box d-flex flex-wrap align-items-center justify-content-center border rounded-4 p-5">
                <div class="icon-box-icon me-3">
                  <svg class="location svg-primary" width="80" height="80">
                    <use xlink:href="#location" />
                  </svg>
                </div>
                <div class="icon-box-content">
                  <p class="mb-0">Россия, Москва</p>
                  <p>Никольский переулок, 6 </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer id="footer" class="py-lg-7 bottom">
    <div class="footer-bottom py-3 text-center">
      <div class="container-lg">
        <p class="m-0">
          © 2024 AQUA Navigator.
        </p>
      </div>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>