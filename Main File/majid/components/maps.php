<div id="map"></div>
    <script>
        var map;
        function initMap() {
            var Famazon = {
                lat: 50.25952945079411,
                lng: 11.207643468677922
            };
            map = new google.maps.Map(document.getElementById('map'), {
                center: Famazon,
                zoom: 8
            });
            var pinpoint = new google.maps.Marker({
                position: Famazon,
                map: map
            });
        }
    </script>
 


