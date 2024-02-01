<?php
    require_once 'header.php';
    print_r($_POST['values']);
    file_put_contents("$em.json",  $_POST['values']);
?>