<?php 
session_start();
session_destroy();
header('Location:/trouverperdu/php/signin.php');
?>