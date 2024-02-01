<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link rel= "stylesheet" href="/trouverperdu/css/style_maps.css">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
    </script>
    <title>Geo</title>
</head>
<body>
    <?php
        $lat='<p id="map_p">Latitude: <span id="latitude"></span></p>';
        $long ='<p id="map_p">Longitude: <span id="longitude"></span></p>'; 
    ?>
</body>
<p id="latlong"><?php echo $lat; echo $long; ?></p>
<style>
</style>
</html>


<script src="/trouverperdu/js/getGeoloc.js"></script>




