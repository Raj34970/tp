<?php 
    require_once 'api_lost.php';
    $sql = mysqli_query($conn, "SELECT * FROM lost");
    if($sql){
        while($query = mysqli_fetch_array($sql)){
            $arr_lost[] = array(
                $query['id'],//0
                $query['account'], //1
                $query['date'], //2
                $query['time'], //3
                $query['item'], //4
                $query['model'], //5
                $query['img1'], //6
                $query['img2'], //7
                $query['img3'], //8
                $query['description'], //9
                $query['location'], //10
                $query['city'], //11
                $query['latitude'], //12
                $query['longitude'], ); //13
        }
    }
    //var_dump($arr_lost);
?>