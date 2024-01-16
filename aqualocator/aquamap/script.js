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
                    let map = new ymaps.Map('map-test', {
                        center: [55.753656, 37.628137],
                        zoom: 10
                    });
                    map.controls.remove('geolocationControl');
                    map.controls.remove('trafficControl');
                    map.controls.remove('typeSelector');

                    data.forEach(function (pool) {
                        let coordinates = pool.coordinates;
                        let objectName = pool.objectName;
                        let address = pool.address;

                        let placemark = new ymaps.Placemark(coordinates.reverse(), {
                            hintContent: objectName + '<br>' + address,
                            iconLayout: 'default#image',
                            iconImageHref: '../images/location-mark.png',
                            iconImageSize: [40, 40],
                            iconImageOffset: [-19, -44]
                        });

                        // Add a click event listener to the placemark
                        placemark.events.add('click', function () {
                            // Redirect to the generated page for the specific pool
                            window.location.href = '../allswims/pool_details.php?pool_id=' + pool.global_id;
                        });

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
