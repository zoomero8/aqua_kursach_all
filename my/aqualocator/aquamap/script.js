$(document).ready(function () {
    ymaps.ready(function () {

        $.ajax({
            url: 'get_pools.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.error) {
                    console.error('Error fetching pool data:', data.error);
                } else {
                    // Инициализация карты
                    let map = new ymaps.Map('map-test', {
                        center: [55.753656, 37.628137],
                        zoom: 10
                    });

                    // Отображение меток на карте
                    data.forEach(function (pool) {
                        let coordinates = pool.coordinates;
                        // Создание объекта метки
                        let placemark = new ymaps.Placemark(coordinates.reverse(), {
                            hintContent: 'Место для вашего контента', // Замените на ваш текст
                            iconLayout: 'default#image',
                            iconImageHref: '../images/location-mark.png',
                            iconImageSize: [40, 40],
                            iconImageOffset: [-19, -44]
                        });

                        // Добавление метки на карту
                        map.geoObjects.add(placemark);
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching pool data:', xhr, status, error);
            }
        });
    });
});
