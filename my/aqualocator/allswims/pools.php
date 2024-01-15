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
    <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet" />
    
    <a href="../index.php" class="main-button">Назад на главную</a>

</head>
<body>


<h1 class="swim-title">ВСЕ БАССЕЙНЫ</h1>
    <!-- Форма для поиска -->
    <form action="pools.php" method="get">
        <label for="search"></label>
        <input type="text" name="search" id="search" value="<?= htmlspecialchars($search) ?>">
        <button type="submit">Поиск</button>
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
