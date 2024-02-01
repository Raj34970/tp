<?php 
session_start();
require_once '../php/config.php';
$sql = mysqli_query($conn,"SELECT * FROM user");
$i=0;
while($fetch_user= mysqli_fetch_array($sql)){
    $array_user[] = unserialize(base64_decode($fetch_user['array']));
    //var_dump($array_user);
}
?>