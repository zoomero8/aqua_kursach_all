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
                   p.global_id, p.ObjectName, p.NameWinter, p.PhotoWinter,
                   p.AdmArea, p.District, p.Address, p.Email, p.WebSite, p.HelpPhone
            FROM swimpools_users u
            LEFT JOIN FavoritePools f ON u.id = f.userId
            LEFT JOIN Swimpools p ON f.poolId = p.global_id
            WHERE u.id = ?
        ");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($id, $login, $name, $email, $poolId, $globalId, $objectName, $nameWinter, $photoWinter, $admArea, $district, $address, $poolEmail, $webSite, $helpPhone);

        $userData = [];
        while ($stmt->fetch()) {
            $userData = [
                'id' => $id,
                'login' => $login,
                'name' => $name,
                'email' => $email,
                'favoritePools' => isset($userData['favoritePools']) ? array_unique([...$userData['favoritePools'], $poolId]) : [$poolId],
                'swimpools' => [
                    'globalId' => $globalId,
                    'objectName' => $objectName,
                    'nameWinter' => $nameWinter,
                    'photoWinter' => $photoWinter,
                    'admArea' => $admArea,
                    'district' => $district,
                    'address' => $address,
                    'poolEmail' => $poolEmail,
                    'webSite' => $webSite,
                    'helpPhone' => $helpPhone,
                ],
            ];
        }

        $stmt->close();

        // Возвращаем массив с данными пользователя, избранными бассейнами и данными о бассейнах
        return $userData;
    }

    // Возвращаем пустой массив, если пользователь не авторизован
    return [];
}
?>