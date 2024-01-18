<?php
include "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $login = $_POST["login"];
    
    // Проверка уникальности логина
    $checkLoginQuery = $mysql->prepare("SELECT id FROM swimpools_users WHERE login = ?");
    $checkLoginQuery->bind_param("s", $login);
    $checkLoginQuery->execute();
    $checkLoginQuery->store_result();

    if ($checkLoginQuery->num_rows > 0) {
        echo "Этот логин уже используется.";
    } else {
        echo "";
    }

    $checkLoginQuery->close();
}

$mysql->close();
?>
