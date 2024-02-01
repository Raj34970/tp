<?php
require_once "config.php";

// Function to geocode an address using cURL with SSL certificate verification disabled
function geocodeAddress($address) {
    $geocodeUrl = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($address);

    $ch = curl_init($geocodeUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL certificate verification
    $response = curl_exec($ch);

    if ($response === false) {
        // Handle cURL error
        echo 'cURL Error: ' . curl_error($ch);
        return null;
    }

    curl_close($ch);

    $data = json_decode($response, true);

    if (!empty($data) && isset($data[0]['lat']) && isset($data[0]['lon'])) {
        $lat = $data[0]['lat'];
        $lon = $data[0]['lon'];
        return ['lat' => $lat, 'lon' => $lon];
    }

    return null; // Address not found or error
}


$sql = mysqli_query($conn, "SELECT * FROM lost");
$dropPoint = [];

while($getall = mysqli_fetch_array($sql)){
    $decode = unserialize(base64_decode($getall['array']));
    
    $address = $decode['address'];
    $coords = geocodeAddress($address);
    if ($coords !== null) {
        $dropPoint[] = array(
            "item" => $decode["catagory"],
            "address" => $decode['address'],
            "lat" => floatval($coords['lat']),
            "lon" => floatval($coords['lon'])
        );       
    } else {
        // Handle address not found or error
        // You can choose to skip the point or handle it differently
    }
}

// Return the result as JSON
echo json_encode($dropPoint);

$conn->close();
?>