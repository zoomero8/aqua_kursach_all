<?php
include "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {
    $email = $_POST["email"];

    // Проверка уникальности email
    $checkEmailQuery = $mysql->prepare("SELECT id FROM swimpools_users WHERE email = ?");
    $checkEmailQuery->bind_param("s", $email);
    $checkEmailQuery->execute();
    $checkEmailQuery->store_result();

    if ($checkEmailQuery->num_rows > 0) {
        echo "Этот email уже используется.";
    } else {
        echo "";
    }

    $checkEmailQuery->close();
}

$mysql->close();
?>
