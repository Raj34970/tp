<?php 
    require 'config.php';
    session_start();
    if(!isset($_SESSION['email'])){
        header('Location: signin.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="/trouverperdu/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/trouverperdu/js/getGeoloc.js"></script>
    <link rel="manifest" href="/trouverperdu/JSON/manifest.json">
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        /* for service-worker */ 
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('service-worker.js', { scope: '/trouverperdu/' })
            .then((registration) => {
                console.log('Service Worker registered with scope:', registration.scope);
            })
            .catch((error) => {
                console.error('Service Worker registration failed:', error);
            });
        }
    </script>
    <link href="/trouverperdu/img/fab.png" rel="icon" type="image/x-icon" />
    <title>Trouver-perdu</title>
</head>
<body>
    <?php include_once 'sidebar.php'; ?>
    <div class="main-box">
        <div class="maps" id="maps"><?php require_once('geo.php') ;?></div>
    </div>
    <div id="bottom">
        <div class="bottom-bar">
            <button id="avatar_btn" onclick="list()"><img src="/trouverperdu/img/search.svg" width="30px"/>Rechercher</button>
            <a href="addlost.php"><button id="avatar_btn"><img src="/trouverperdu/img/plus.svg" width="30px"/>Publier</button></a>
            <button id="avatar_btn" onclick="map()"><img src="/trouverperdu/img/map.svg" width="30px"/>Map</button>
            <button id="avatar_btn" onclick="toggle()"><img src="/trouverperdu/img/avatar.svg" width="30px"/>Compte</button>
        </div>
    </div>
</body>
</html>

<script src="/trouverperdu/js/toggle.js"></script>