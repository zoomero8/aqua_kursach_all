<?php
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
?>
