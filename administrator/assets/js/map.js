var Map = {
    geocoder:null,
    map:null,
    init:function() {
        if ($("#secMap").hasClass("map"))
        {
            Map.geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(24.8600, 67.0100);
            var mapOptions = {
                zoom: 8,
                center: latlng,
                draggable: true
            };
            Map.map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        }
    },

    codeAddress:function() {
        Map.geocoder.geocode( { 'address': $("#txtMapAddress").val()}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {

                Map.map.setCenter(results[0].geometry.location);
                $("#txtLatitude").val(results[0].geometry.location.lat());
                $("#txtLongitude").val(results[0].geometry.location.lng());
                var marker = new google.maps.Marker({
                    map: Map.map,
                    position: results[0].geometry.location
                });

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

};