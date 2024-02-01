<?php
require_once '../php/config.php';
// Fetch the data from the database
$query = mysqli_query($conn, "SELECT * FROM lost");
while ($fetch = mysqli_fetch_array($query)) {
    $decode = unserialize(base64_decode($fetch['array']));
    $data[] = array(
        "date" => $decode['date'],
        "time" => $decode['time'],
        "img1" => $decode['img1'],
        "img2" => $decode['img2'],
        "img3" => $decode['img3'],
        "catagory" => $decode['catagory'],
        "title" => $decode['title'],
        "description" => $decode['description'],
        "address" => $decode['address'],
    );
}
//var_dump($data);
?>
