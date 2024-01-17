<?php
include "dbconnector.php";

$termsQuery = "SELECT * FROM swimpools";
$termsResult = mysqli_query($mysql, $termsQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<a href="../main/index.php" class="newmain-button">Назад</a>
<h1 class="display-2 text-center mx-auto" data-aos="fade-up" data-aos-delay="200">
    Карта бассейнов
</h1>

	<div id="map-test" class="map"></div>
	<script src="https://api-maps.yandex.ru/2.1/?apikey=7151535c-198c-4f28-af73-23eab7883cff&lang=ru_RU">
	</script>
	<script src="script.js"></script>
</body>
<footer id="footer" class="footer mt-auto py-lg-7 fixed-bottom">
    <div class="footer-bottom py-3 text-center">
        <div class="container-lg">
            <p class="m-0">
                © 2024 AQUA Navigator.
            </p>
        </div>
    </div>
</footer>
</html>