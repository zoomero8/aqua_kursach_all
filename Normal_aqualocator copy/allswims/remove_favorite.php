<?php
include __DIR__ . '/../registration/session.php';

if (!isLoggedIn()) {
    // Если пользователь не авторизован, вернуть ошибку или перенаправить на страницу входа
    // В этом примере, просто вернем ошибку
    echo 'Ошибка: Пользователь не авторизован';
    exit();
}

$poolId = isset($_POST['pool_id']) ? $_POST['pool_id'] : '';

// Удаляем запись из избранного
$userId = $_SESSION['user_id'];
$query = "DELETE FROM FavoritePools WHERE userId = '$userId' AND poolId = '$poolId'";
$result = $mysql->query($query);

if ($result) {
    // Успешно удалено из избранного
    echo 'success';
} else {
    // Ошибка при выполнении запроса
    echo 'Ошибка запроса: ' . $mysql->error;
}

$mysql->close();
?>
