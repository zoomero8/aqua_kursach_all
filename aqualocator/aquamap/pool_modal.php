<?php
include __DIR__ . '/../aquamap/dbconnector.php';
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

// Закрываем соединение с базой данных
$mysql->close();
?>

<!-- Содержимое модального окна -->
<div class="modal-header">
    <h5 class="modal-title" id="poolModalLabel"><?= htmlspecialchars($poolData['ObjectName'] ?? '', ENT_QUOTES, 'UTF-8') ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <!-- Вставьте нужное содержимое модального окна -->
    <table border="1">
        <!-- ... (остальной код) ... -->
    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
</div>
