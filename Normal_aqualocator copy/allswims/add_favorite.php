<?php
include __DIR__ . '/../registration/session.php';

if (!isLoggedIn()) {
    // Если пользователь не авторизован, вернуть ошибку или перенаправить на страницу входа
    // В этом примере, просто вернем ошибку
    echo 'Ошибка: Пользователь не авторизован';
    exit();
}

$poolId = isset($_POST['pool_id']) ? $_POST['pool_id'] : '';

// Добавляем запись в избранное
$userId = $_SESSION['user_id'];
$query = "INSERT INTO FavoritePools (userId, poolId) VALUES ('$userId', '$poolId')";
$result = $mysql->query($query);

if ($result) {
    // Успешно добавлено в избранное
    echo 'success';
} else {
    // Ошибка при выполнении запроса
    echo 'Ошибка запроса: ' . $mysql->error;
}

$mysql->close();
?>
