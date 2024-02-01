<?php 
    include_once 'config.php';
    $sql = mysqli_query($conn, "SELECT * FROM lost ORDER BY 'date' DESC");
    if($sql){
        while($query = mysqli_fetch_array($sql)){
            $decode = unserialize(base64_decode($query['array']));
            $arr_lost[] = array(
                "id" => $query['id'],
                "account" => $decode['account'], //1
                "date" => $decode['date'], //2
                "time" => $decode['time'], //3 
                "item" => $decode['item'], //4
                "model" => $decode['model'], //5
                "img1" => $decode['img1'], //6
                "img2" => $decode['img2'], //7
                "img3" => $decode['img3'], //8
                "description" => $decode['description'], //9
                "location" => $decode['location'], //10
                "city" => $decode['city'], //11
                "latitude" => $decode['latitude'], //12
                "longitude" => $decode['longitude'], 
            );
        }
    }
    //var_dump($arr_lost);
?>