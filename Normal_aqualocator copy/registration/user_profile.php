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
    <div class="left-column">
        <a href="../main/index.php" class="newmain-button">Главная</a>
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
    </div>
</body>

<div class="container">
    <div class="right-column">
    <h1 class="display-2 mx-auto fs-2" data-aos="fade-up" data-aos-delay="200">Избранные бассейны</h1>
        <?php if (!empty($userData['swimpools'])): ?>
            <!-- Используйте цикл для вывода информации о каждом бассейне -->
            <?php foreach ($userData['swimpools'] as $swimpool): ?>
                <div class="swimpool-item">
                        <p>
                            <?= $swimpool['objectName'] ?>
                        </p>
                        <!-- Добавьте кнопку для удаления бассейна из избранного -->
                        <button class="btn btn-danger remove-from-favorites" data-pool-id="<?= $swimpool['global_id'] ?>">Удалить из избранного</button>
                    </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Вы еще не добавили бассейны.</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.add-to-favorites').click(function () {
            var poolId = $(this).data('pool-id');
            $.post('add_favorite.php', { pool_id: poolId }, function (data) {
                if (data === 'success') {
                    // Успешно добавлено в избранное, обновите страницу или выполните другие действия
                    location.reload();
                } else {
                    // Ошибка добавления в избранное
                    console.error(data);
                }
            });
        });

        $('.remove-from-favorites').click(function () {
            var poolId = $(this).data('pool-id');
            $.post('../allswims/remove_favorite.php', { pool_id: poolId }, function (data) {
                if (data === 'success') {
                    // Успешно удалено из избранного, обновите страницу или выполните другие действия
                    location.reload();
                } else {
                    // Ошибка удаления из избранного
                    console.error(data);
                }
            });
        });
    });
</script>


<footer id="footer" class="footer mt-auto py-lg-7 fixed-bottom">
    <div class="footer-bottom py-3 text-center">
        <div class="container-lg">
            <p class="m-0">
                © 2024 AQUA Navigator.
            </p>
        </div>
    </div>
</footer>


</html>