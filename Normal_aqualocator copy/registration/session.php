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
    global $mysql;

    // Проверяем, авторизован ли пользователь
    if (isLoggedIn()) {
        $userId = $_SESSION['user_id'];

        // Подготовленный запрос для получения данных пользователя, избранных бассейнов и данных о бассейнах
        $stmt = $mysql->prepare("
            SELECT u.id, u.login, u.name, u.email, f.poolId,
                   p.global_id, p.ObjectName
            FROM swimpools_users u
            LEFT JOIN FavoritePools f ON u.id = f.userId
            LEFT JOIN Swimpools p ON f.poolId = p.global_id
            WHERE u.id = ?
        ");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($id, $login, $name, $email, $poolId, $globalId, $objectName);

        $userData = [];
        while ($stmt->fetch()) {
            $userData['id'] = $id;
            $userData['login'] = $login;
            $userData['name'] = $name;
            $userData['email'] = $email;

            if (isset($userData['favoritePools'])) {
                $userData['favoritePools'][] = $poolId;
            } else {
                $userData['favoritePools'] = [$poolId];
            }

            $userData['swimpools'][] = [
                'global_id' => $globalId,
                'objectName' => $objectName,
            ];
        }

        $stmt->close();

        // Возвращаем массив с данными пользователя, избранными бассейнами и данными о бассейнах
        return $userData;
    }

    // Возвращаем пустой массив, если пользователь не авторизован
    return null;
}
?>
