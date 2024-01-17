<?php
include __DIR__ . '/../aquamap/dbconnector.php';
include 'session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $login = $_POST["login"];
    $password_input = $_POST["password"];

    // Подготовленный запрос для получения данных
    $stmt = $mysql->prepare("SELECT id, login, password, name, email FROM swimpools_users WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $stmt->bind_result($id, $login, $password, $name, $email);
    $stmt->fetch();

    if ($id && password_verify($password_input, $password)) {
        // Вход выполнен успешно
        setSession($id, $login);

        // Перенаправление на страницу профиля пользователя
        header('Location: user_profile.php');
        exit();
    } else {
        echo "Неверный логин или пароль.";
    }

    $stmt->close();
}

$mysql->close();
?>
