<?php
include "dbconnector.php";

$termsQuery = "SELECT * FROM swimpools";
$termsResult = mysqli_query($mysql, $termsQuery);

$pools = array();

while ($row = mysqli_fetch_assoc($termsResult)) {
    $geoData = json_decode($row['geoData'], true);


    // Проверка на null и ошибки декодирования JSON
    if ($geoData !== null && json_last_error() == JSON_ERROR_NONE) {
        $pool = array(
            'global_id' => $row['global_id'],
            'coordinates' => $geoData['coordinates'],
            'objectName' => $row['ObjectName'],
            'address' => $row['Address']
            // Добавьте другие поля, которые вам нужны, например: 'description' => $row['description']
        );
        $pools[] = $pool;
    } else {
        // Пропустить записи с пустым geoData или некорректным JSON
        continue;
    }
}
header('Content-Type: application/json');
echo json_encode($pools);
mysqli_close($mysql);
?>
