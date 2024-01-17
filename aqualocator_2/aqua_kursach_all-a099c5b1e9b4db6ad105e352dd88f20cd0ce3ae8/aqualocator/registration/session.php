<?php
include __DIR__ . '/../aquamap/dbconnector.php';
session_start();

function setSession($userId, $userLogin) {
    $_SESSION['user_id'] = $userId;
    $_SESSION['user_login'] = $userLogin;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function redirectToMain() {
    header('Location: ../main/index.php');
    exit();
}

function redirectToReg() {
    header('Location: sign_main.php');
    exit();
}

function getUserData() {
    // Предположим, что у вас есть объект $mysql, соединение с базой данных
    global $mysql;

    // Проверяем, авторизован ли пользователь
    if (isLoggedIn()) {
        $userId = $_SESSION['user_id'];

        // Подготовленный запрос для получения данных пользователя
        $stmt = $mysql->prepare("SELECT id, login, name, email FROM swimpools_users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($id, $login, $name, $email);
        $stmt->fetch();

        // Возвращаем массив с данными пользователя
        return [
            'id' => $id,
            'login' => $login,
            'name' => $name,
            'email' => $email,
        ];
    }

    // Возвращаем пустой массив, если пользователь не авторизован
    return [];
}
?>