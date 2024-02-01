<?php
include_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="/trouverperdu/css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/trouverperdu/js/getGeoloc.js"></script>
    
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <link href="/trouverperdu/img/fab.png" rel="icon" type="image/x-icon" />
    <title>Votre Profile</title>
</head>
<body>
    <div class="wrapper">
        <div class="topBar">
            <a href="/trouverperdu/php/mobile.php"><h3 id="topbar_h3">trouver-perdu</h3></a>
        </div>
        <div class="avatar-img">
            <img src="/trouverperdu/img/avatar.svg" id="avatar">    
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">name</th>
                    <td><input class="tdinput" type="name" name="name" placeholder="Mark"></td>
                </tr>
                <tr>
                    <th scope="row">Addresse</th>
                    <td><input class="tdinput" type="address" name="address" placeholder="358 rue du triolet"></td>
                </tr>
                <tr>
                    <th scope="row">Ville</th>
                    <td><input class="tdinput" type="ville" name="city" placeholder="Montpellier"></td>
                </tr>
                <tr>
                    <th scope="row">Country</th>
                    <td><input class="tdinput" type="country" name="country" placeholder="France"></td>
                </tr>
                <tr>
                    <th scope="row">phone</th>
                    <td><input class="tdinput" type="phone" name="phone" placeholder="0774396977"></td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-success" id="modify">valide</button>

        <div class="progress" style="height: 1px;">
            <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
</body>
</html>
