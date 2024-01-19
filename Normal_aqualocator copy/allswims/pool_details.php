<?php
include __DIR__ . '/../registration/session.php';

// Получаем идентификатор бассейна из URL
$poolId = isset($_GET['pool_id']) ? $_GET['pool_id'] : '';

// Запрос к базе данных для получения данных о бассейне
$query = "SELECT * FROM swimpools WHERE global_id = '$poolId'";
$result = $mysql->query($query);

// Обработка ошибок при выполнении запроса
if (!$result) {
    die('Ошибка запроса: ' . $mysql->error);
}
// Получение данных о бассейне
$poolData = $result->fetch_assoc();
?>

<?php
// Инициализируем $isFavorite значением false
$isFavorite = false;

// Проверяем, авторизован ли пользователь
if (isLoggedIn()) {
    // Получаем данные пользователя
    $userData = getUserData();

    // Проверяем, есть ли бассейн в избранном у пользователя
    $isFavorite = $userData && in_array($poolId, $userData['favoritePools']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

</head>

<body class="body-for-aquamap">
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
    <div class="button-container">
        <?php if (isLoggedIn()): ?>
            <?php if ($isFavorite): ?>
                <div class="button-wrapper">
                    <button class="custom-button remove-from-favorites" data-pool-id="<?= $poolId ?>">Удалить из
                        избранного</button>
                </div>
            <?php else: ?>
                <button class="custom-button add-to-favorites" data-pool-id="<?= $poolId ?>">
                    Добавить в избранное
                </button>
            <?php endif; ?>
        <?php endif; ?>
        <h1 class="map-title-for-aquamap" data-aos="fade-up" data-aos-delay="200">
            <?= htmlspecialchars($poolData['ObjectName'] ?? '', ENT_QUOTES, 'UTF-8') ?>
        </h1>

        <table border="1">
            <tr>
                <th>О бассейне</th>
                <th>Данные</th>
            </tr>
            <tr>
                <td>График работы</td>
                <td>
                    <?php
                    // Разбиваем строку на отдельные дни
                    $workingHours = explode(',', $poolData['WorkingHoursWinter'] ?? '');

                    // Выводим график работы для каждого дня
                    foreach ($workingHours as $daySchedule) {
                        // Разбиваем информацию о дне (название и часы)
                        $dayInfo = explode(' ', $daySchedule);

                        // Выводим информацию
                        echo '<p><strong>' . htmlspecialchars($dayInfo[0] ?? '') . ':</strong> ' . htmlspecialchars($dayInfo[1] ?? '') . '</p>';
                    }
                    ?>
                </td>
            <tr>
                <td>Вид бассейна</td>
                <td>
                    <?= htmlspecialchars($poolData['NameWinter'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                </td>
            </tr>
            </tr>
            <tr>
                <td>Район</td>
                <td>
                    <?= htmlspecialchars($poolData['District'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                </td>
            </tr>
            <tr>
                <td>Адрес</td>
                <td>
                    <?= htmlspecialchars($poolData['Address'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                </td>
            </tr>
            <tr>
                <td>Почта</td>
                <td>
                    <?= htmlspecialchars($poolData['Email'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                </td>
            </tr>
            <tr>
                <td>Ссылка на сайт</td>
                <td>
                    <?= htmlspecialchars($poolData['WebSite'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                </td>
            </tr>
            <tr>
                <td>Номер телефона</td>
                <td>
                    <?= '+7 ' . htmlspecialchars($poolData['HelpPhone'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                </td>
            </tr>
            <tr>
                <td>Приспособленность для занятий инвалидов</td>
                <td>
                    <?= htmlspecialchars($poolData['DisabilityFriendly'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                </td>
            </tr>
        </table>


    </div>
</body>
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
            $.post('remove_favorite.php', { pool_id: poolId }, function (data) {
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