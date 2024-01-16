<?php
include __DIR__ . '/../aquamap/dbconnector.php';

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

// Закрываем соединение с базой данных
$mysql->close();
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
        
</head>

<body>
<a href="pools.php" class="newmain-button">Назад</a>
<h1 class="swim-title"><?= htmlspecialchars($poolData['ObjectName']) ?></h1>

<!-- Добавьте другую информацию о бассейне по необходимости -->

<!-- Таблица для отображения дополнительных данных -->
<table border="1">
    <tr>
        <th>О бассейне</th>
        <th>Данные</th>
    </tr>
    <tr>
        <td>Район</td>
        <td><?= htmlspecialchars($poolData['District']) ?></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><?= htmlspecialchars($poolData['Address']) ?></td>
    </tr>
    <!-- Добавьте другие строки по необходимости -->
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
