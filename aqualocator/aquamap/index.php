<?php
include "dbconnector.php";

$termsQuery = "SELECT * FROM swimpools";
$termsResult = mysqli_query($mysql, $termsQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="/favicon.ico">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link
	href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
	rel="stylesheet"
  />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
	<h1 class="map-title">КАРТА БАССЕЙНОВ</h1> <!-- Добавлен заголовок -->
	<div id="map-test" class="map"></div>
	<a href="../index.php" class="main-button">Назад на главную</a>
	<script src="https://api-maps.yandex.ru/2.1/?apikey=7151535c-198c-4f28-af73-23eab7883cff&lang=ru_RU">
	</script>
	<script src="script.js"></script>
</body>
<footer id="footer" class="py-lg-7">
      <div class="footer-bottom py-3 text-center">
        <div class="container-lg">
          <p class="m-0">
            © 2024 AQUA Navigator.
          </p>
        </div>
      </div>
    </footer>
</html>