<?php 
require "config.php";
require_once '../api/api_signin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trouverperdu</title>
    <link rel="stylesheet" href="/trouverperdu/css/style_hd.css">
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
    </script>

    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="/trouverperdu/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <ul>
            <li id="head"><a href="/trouverperdu/index.php"><img src="/trouverperdu/img/logo.png" width=100px></a></li>
            <li><div class="input-group">
                <select class="form-select form-select-sm" id="catagories_head">
                    <option value="" selected>catagories</option>
                    <option value="key">Cle</option>
                    <option value="phone">Telephone</option>
                    <option value="headphone">Casque</option>
                    <option value="glass">Lunnettes</option>
                    <option value="wallet">Portefeuille</option>  
                    <option value="clothes">Vetement</option>
                    <option value="games">Jeux</option>
                    <option value="cards">Carte</option>
                    <option value="sac">Sac/Valisse</option>
                    <option value="jewels">Montres/Bijoux</option> 
                </select>
                <input type="search" id="form1" class="form-control" placeholder="recherche" />
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </li>
            <li id="address_bar">
                <h5>Votre Geo-localisation</h5>
                <div class="address" style="display: flex;">
                    <img src="/trouverperdu/img/location_white.svg" width="35px" style="margin-inline: 10px;"/>
                    <div id="address"></div>
                </div>
            </li>
            <?php if($st_name != "login"){ ?>
            <li id="profile_bar">
                <a href="/trouverperdu/php/user.php" style="color: white !important;">
                    <img src="/trouverperdu/img/account.svg" style="width: 45px !important;"><?php echo $st_name;?>
                </a>
                <div class="details">
                    <img src="/trouverperdu/img/home.svg" width="30px" style="margin-inline: 15px" /><?php echo $st_address; ?><br>
                    <img src="/trouverperdu/img/cellphone.svg" width="30px" style="margin-inline: 15px" /><?php echo $st_phone; ?><br>
                    <img src="/trouverperdu/img/cross.svg" width="30px"/><a href="logout.php" style="text-decoration: underline !important;">deconnexion !</a>
                </div>
            </li>
            <?php } else{ ?>
                <li><a href="/trouverperdu/php/user.php" style="color: white !important; text-decoration: underline !important;">connexion!</a></li>
                <?php }?>
        </ul>
        <div class="list-group" id="show-list"></div>
    </div>
</body>
</html>

<script src="/trouverperdu/js/getGeoloc.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/trouverperdu/js/click.js"></script>


