<?php
include "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $name = $_POST["name"];
    
    // Проверка на уникальность email
    $checkEmailQuery = $mysql->prepare("SELECT id FROM swimpools_users WHERE email = ?");
    $checkEmailQuery->bind_param("s", $email);
    $checkEmailQuery->execute();
    $checkEmailQuery->store_result();

    if ($checkEmailQuery->num_rows > 0) {
        echo "Ошибка при регистрации: Этот email уже используется.";
    } else {
        // Вставка данных при уникальном email
        $stmt = $mysql->prepare("INSERT INTO swimpools_users (login, email, password, name) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $login, $email, $password, $name);
        $stmt->execute();

        if ($stmt->affected_rows == 1) {
            header('Location: sign_main.php');  // Изменено на sign_main.php
            exit();  // Убедитесь, что выходите из скрипта после вызова header()
        } else {
            echo "Ошибка при регистрации: " . $stmt->error;
        }

        $stmt->close();
    }

    $checkEmailQuery->close();
}

$mysql->close();
?>