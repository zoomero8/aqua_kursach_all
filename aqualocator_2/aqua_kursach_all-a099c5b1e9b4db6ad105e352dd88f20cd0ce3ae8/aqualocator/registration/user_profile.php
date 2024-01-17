<?php
include 'session.php';

// Проверка, авторизован ли пользователь
if (!isLoggedIn()) {
    // Если не авторизован, перенаправить на страницу входа
    header('Location: ../registration/sign_main.php');
    exit();
}

// Получение данных пользователя из сессии
$userData = getUserData(); // Предположим, что у вас есть функция getUserData, которая возвращает данные пользователя
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles_account.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

</head>

<body class="mt-5">
    <a href="../main/index.php" class="newmain-button">Назад</a>
    <a href="../aquamap/index.php" class="map-main-button">К карте</a>
    <h1 class="display-2 text-center mx-auto fs-2" data-aos="fade-up" data-aos-delay="200">
        <?= htmlspecialchars($userData['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>
    </h1>

    <table border="1">
        <tr>
            <th>Об аккаунте</th>
            <th>Данные</th>
        </tr>
        <tr>
            <td>Логин</td>
            <td>
                <?= htmlspecialchars($userData['login'] ?? '', ENT_QUOTES, 'UTF-8') ?>
            </td>
        </tr>
        <tr>
            <td>Почта</td>
            <td>
                <?= htmlspecialchars($userData['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>
            </td>
        </tr>
        
    </table>
</body>

<footer id="footer" class="footer mt-auto py-lg-7">
    <div class="footer-bottom py-3 text-center">
        <div class="container-lg">
            <p class="m-0">
                © 2024 AQUA Navigator.
            </p>
        </div>
    </div>
</footer>


</html>