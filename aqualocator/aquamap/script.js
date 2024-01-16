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
                    map.controls.remove('geolocationControl'); // удаляем геолокацию
                    // map.controls.remove('searchControl'); // удаляем поиск
                    map.controls.remove('trafficControl'); // удаляем контроль трафика
                    map.controls.remove('typeSelector'); // удаляем тип
                    // map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
                    map.controls.remove('zoomControl'); // удаляем контрол зуммирования
                    map.controls.remove('rulerControl'); // удаляем контрол правил
                    // map.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
                    

                    // Отображение меток на карте
                    data.forEach(function (pool) {
                        let coordinates = pool.coordinates;
                        let objectName = pool.objectName;
                        let address = pool.address;
                        // Создание объекта метки
                        let placemark = new ymaps.Placemark(coordinates.reverse(), {
                            hintContent: objectName + '<br>' + address,
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
