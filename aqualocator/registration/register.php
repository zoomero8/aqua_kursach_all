<?php
include __DIR__ . '/../aquamap/dbconnector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $name = $_POST["name"];
    
    // Подготовленный запрос для вставки данных
    $stmt = $mysql->prepare("INSERT INTO swimpools_users (login, email, password, name) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $login, $email, $password, $name);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        echo "Регистрация прошла успешно!";
    } else {
        echo "Ошибка при регистрации: " . $stmt->error;
    }

    $stmt->close();
}

$mysql->close();
?>
