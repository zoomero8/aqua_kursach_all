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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body class="body-for-aquamap">

    <header>
        <div class="container">
            <a href="../main/index.php" class="left-button">AQUA Navigator</a>
            <div class="right-buttons">
                <a href="index.php" class="right-button">Карта бассейнов</a>
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


    <h1 class="map-title-for-aquamap" data-aos="fade-up" data-aos-delay="200">
        Карта бассейнов
    </h1>

    <div id="map-test" class="map-for-aquamap"></div>
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
