<?php
// Подключаем файл dbconnector.php
include __DIR__ . '/../aquamap/dbconnector.php';

// Обработка поиска
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Обработка фильтрации по инвалидам
$showDisabilityFriendly = isset($_GET['disability_friendly']) ? $_GET['disability_friendly'] : '';

// Запрос к базе данных с учетом поиска по названию, адресу и району
$query = "SELECT * FROM swimpools 
          WHERE (ObjectName LIKE '%$search%' OR Address LIKE '%$search%' OR District LIKE '%$search%')";

// Добавляем условие для фильтрации по полю DisabilityFriendly, если кнопка нажата
if ($showDisabilityFriendly == 'true') {
    $query .= " AND DisabilityFriendly = 'приспособлен для всех групп инвалидов'";
}

$itemsPerPage = 10;

// Определение текущей страницы
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

// Вычисление смещения (сколько записей пропустить)
$offset = ($page - 1) * $itemsPerPage;

// Обновление запроса для учета пагинации
$query .= " LIMIT $offset, $itemsPerPage";

$result = $mysql->query($query);

// Обработка ошибок при выполнении запроса
if (!$result) {
    die('Ошибка запроса: ' . $mysql->error);
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
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Добавляем скрипт для фильтрации по инвалидам -->
    <script>
        function filterDisabilityFriendly() {
            var showDisabilityFriendly = document.getElementById('showDisabilityFriendly').checked;

            // Обновляем URL с новым параметром
            var url = new URL(window.location.href);
            url.searchParams.set('disability_friendly', showDisabilityFriendly);
            window.location.href = url.href;
        }
    </script>
</head>

<body class="mt-5">
    <a href="../main/index.php" class="newmain-button">Главная</a>
    <a href="../aquamap/index.php" class="map-main-button">К карте</a>

    <h1 class="display-2 text-center mx-auto" data-aos="fade-up" data-aos-delay="200">
        Все бассейны
    </h1>

    <!-- Форма для поиска -->
    <form action="pools.php" method="get">
        <label for="search"></label>
        <input type="text" name="search" id="search" value="<?= htmlspecialchars($search) ?>"
            placeholder="Поиск по названию или адресу">
        <button type="submit">Поиск</button>
    </form>
    <div class="position-static text-center">
        <input type="checkbox" class="form-check-input" id="showDisabilityFriendly"
            onchange="filterDisabilityFriendly()" <?php echo $showDisabilityFriendly == 'true' ? 'checked' : ''; ?>>
        <label class="form-check-label" for="showDisabilityFriendly">Для пользователей с ограниченными
            возможностями</label>
    </div>

    <!-- Таблица для отображения результатов -->
    <table border="1">
        <tr>
            <th>Название спортивного комплекса</th>
            <th>Район</th>
            <th>Адрес</th>
            <!-- Добавьте другие колонки по необходимости -->
        </tr>

        <?php
        // Отображение результатов запроса
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo '<td><a href="pool_details.php?pool_id=' . $row['global_id'] . '">' . htmlspecialchars($row['ObjectName']) . '</a></td>';
            echo "<td>" . htmlspecialchars($row['District']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Address']) . "</td>";
            // Добавьте другие ячейки по необходимости
            echo "</tr>";
        }

        // Закрываем соединение с базой данных
        $mysql->close();
        ?>
    </table>

</body>
<div class="pagination-container">
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">Предыдущая</a>
        <?php endif; ?>

        <?php if ($result->num_rows > 0): ?>
            <span>Страница
                <?= $page ?>
            </span>
        <?php endif; ?>

        <?php if ($result->num_rows == $itemsPerPage): ?>
            <a href="?page=<?= $page + 1 ?>">Следующая</a>
        <?php endif; ?>
    </div>
</div>
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