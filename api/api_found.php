<?php
function found($st_email){
    require_once '../php/config.php';
    // Fetch the data from the database
    $query = mysqli_query($conn, "SELECT * FROM found WHERE email LIKE '$st_email'");
    while ($fetch = mysqli_fetch_array($query)) {
        $decode = unserialize(base64_decode($fetch['array']));
        $data[] = array(
            "date" => $decode['date'],
            "time" => $decode['time'],
            "address" => $decode['address'],
            "title" => $decode['title'],
            "description" => $decode['description'],
            "img1" => isset($decode['img1']) ? $decode['img1'] : NULL,
            "img2" => isset($decode['img2']) ? $decode['img2'] : NULL,
            "img3" => isset($decode['img3']) ? $decode['img3'] : NULL,
        );
    }
    return $data;
    var_dump($data);
}

?>
