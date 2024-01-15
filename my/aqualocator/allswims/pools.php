<?php
// Подключаем файл dbconnector.php
include __DIR__ . '/../aquamap/dbconnector.php';

// Обработка поиска
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Запрос к базе данных с учетом поиска по названию и адресу
$query = "SELECT * FROM swimpools 
          WHERE ObjectName LIKE '%$search%' OR Address LIKE '%$search%'";
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
    <a href="../index.php" class="main-button">Назад на главную</a>
    <title>Список бассейнов</title>
</head>
<body>

    <h1>Список бассейнов</h1>

    <!-- Форма для поиска -->
    <form action="pools.php" method="get">
        <label for="search">Поиск по названию бассейна или адресу:</label>
        <input type="text" name="search" id="search" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Искать</button>
    </form>

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
            echo "<td>" . htmlspecialchars($row['ObjectName']) . "</td>";
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
<footer id="footer" class="py-lg-7">
      <div class="footer-bottom py-3 text-center">
        <div class="container-lg">
          <p class="m-0">
            © 2024 AQUA Navigator.
          </p>
        </div>
      </div>
    </footer>

</html>
