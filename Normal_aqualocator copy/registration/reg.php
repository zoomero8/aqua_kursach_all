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

    $checkEmailQuery->close();
}

$mysql->close();
?>
