<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link rel= "stylesheet" href="/trouverperdu/css/style_maps.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.3.0/leaflet-routing-machine.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.3.0/leaflet-routing-machine.min.js"></script>
    <title>Geo</title>
</head>

<body>
  <div id="map"></div>
  <?php 
      $lat='<p id="map_p">Latitude: <span id="latitude"></span></p>';
      $long ='<p id="map_p">Longitude: <span id="longitude"></span></p>'; 
  ?>
</body>
</html>
<?php
    echo $lat;?><?php
    echo $long;
?>
<script>
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
      document.getElementById("latitude").innerHTML = latitude;
      document.getElementById("longitude").innerHTML = longitude;

      var map = L.map("map").setView([latitude, longitude], 16);
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 19
      }).addTo(map);
      L.marker([latitude, longitude]).addTo(map);

      map.on('click', function(e) {
        var destination = e.latlng;
        L.Routing.control({
          waypoints: [
            L.latLng(latitude, longitude),
            destination
          ],
          routeWhileDragging: true, // Enable route calculation while dragging waypoints
          show: false // Hide the default control UI
        })
        .on('routesfound', function(e) {
          var routes = e.routes;
          if (routes.length > 0) {
            var summary = routes[0].summary;
            console.log(summary.totalDistance, summary.totalTime); // Example: Log total distance and time

            // Access the route coordinates and display them on the map
            var routeCoordinates = routes[0].coordinates;
            L.polyline(routeCoordinates, { color: 'blue' }).addTo(map);
          } else {
            console.log('No routes found for the given waypoints.');
          }
        })
        .on('routingerror', function(e) {
          console.log('Routing error:', e.error);
        })
        .on('waypointserror', function(e) {
          console.log('Waypoints error:', e.error);
        })
        .addTo(map);
      });



      // Get the drop point location data from the server
      $.ajax({
        url: "getall.php",
        method: "get",
        dataType: "json", // Specify the dataType as JSON
        success: function(data) {
          console.log(data);
          var waypoints = [];
          for (var i = 0; i < data.length; i++) {
            var dropPoint = data[i];
            console.log(dropPoint);

            var customIcon = L.icon({
              iconUrl: '/trouverperdu/icons/' + dropPoint.item + '.svg',
              iconSize: [40, 40],
            });

            var lat = parseFloat(dropPoint.lat);
            var lon = parseFloat(dropPoint.lon);
            var address = (dropPoint.address);
            console.log("Latitude:", lat, "Longitude:", lon);

            if (!isNaN(lat) && !isNaN(lon)) { // Check if lat and lon are valid numbers
              var marker = L.marker([lat, lon], { icon: customIcon }).addTo(map);
              var popupContent = "<b>Item:</b> " + dropPoint.item + "<br><b>"+address+"</b> ";
              marker.bindPopup(popupContent);
              waypoints.push(L.latLng(lat, lon));
            } else {
              console.log("Invalid latitude or longitude:", dropPoint.lat, dropPoint.lon);
            }
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log("Error fetching data: " + textStatus + ", " + errorThrown);
        }
      });

    });
  }
  else {
    document.getElementById("latitude").innerHTML = "Geolocation is not supported by this browser.";
    document.getElementById("longitude").innerHTML = "";
  }
</script>



