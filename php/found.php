<?php 
include_once "header.php";
require_once "config.php";
include_once "getgeolocation.php";
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
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <script src="/trouverperdu/js/getGeoloc.js"></script>
    <link href="/trouverperdu/img/fab.png" rel="icon" type="image/x-icon" />
    <title>Trouver-perdu</title>
</head>
<body>
    <?php /*
        echo ($latitude = '<p>Latitude: <span id="latitude"></span></p>');
        echo ($longitude = '<p>Longitude: <span id="longitude"></span></p>');
        */
    ?>
    <div class="felx-box">
        <form action="" method="POST">
            <div class="top">
                <div class="input-feild" id="left">
                    <h1>1ere Etap</h1>
                    <h5>Description du la Catagories</h5>
                    <label>Catagories</label>
                    <select id="inputState" name="item" placeholder="catagories" class="form-control" required>
                        <option value="Telephone">Telephone</option>
                        <option value="Portefeuille">Portefeuille</option>
                        <option value="Portefeuille">Ecouter</option>
                        <option value="Portefeuille">Tablet</option>
                        <option value="Portefeuille">Ordinator</option>
                        <option value="cle">cle</option>
                        <option value="Valise">Valise</option>
                        <option value="Lunnettes">Lunnettes</option>
                        <option value="Vetement">Vetement</option>
                        <option value="Bijoux">Bijoux</option>
                        <option value="Bijoux">Bagage</option>
                        <option value="Carte">Carte</option>
                        <option value="Collie">Collie</option>
                        <option value="Collie">Animaux</option>
                    </select>
                    <label>Gamme(si exist)</label> 
                    <input type="description" name="model" class="form-control" placeholder="Samsung A50" autocomplete="nope">
                    <label>Description</label>
                    <input type="description" name="description" class="form-control" placeholder="une trace derier" autocomplete="nope">
                </div>
                <div class="input-feild" id="middle">
                    <h1>2eme Etap</h1>
                    <h5>Location du Catagories</h5>
                    <label>Address</label>
                    <input type="address" name="address" class="form-control" placeholder="358 rue du triolet" autocomplete="nope">
                    <label>Ville</label>
                    <input type="city" name="city" class="form-control" placeholder="Montpellier" autocomplete="nope">
                    <label>Postal</label>
                    <input type="postal" name="postal" class="form-control" placeholder="34090" autocomplete="nope">
                    <h5><img src="/trouverperdu/img/map.svg" width="25px"/>je authorize ma geolocalizaton</h5>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="mySwitch" name="checkbox" value="checked" onclick="check()">
                    <label class="form-check-label" for="mySwitch">geolocation</label>
                </div>
                </div>
                <div class="input-feild" id="right">
                    <h1>3eme Etap</h1>
                    <h5>Telecharge une photo</h5>
                    <img src="" id="target" style="width : 150px;">
                    <label for="fileToUpload"><i class="fa fa-cloud-upload fa-4x" id="upload" aria-hidden="true"></i></label>
                    <input type="file" name="img1" id="fileToUpload" style="display: none;visibility: none" onchange="loadFile(event)">
                    <span class="image-preview"></span>
                    <script>
                        var loadFile = function(event) {
                        var output = document.getElementById('target');
                        var selector = document.getElementById('upload');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                                URL.revokeObjectURL(output.src)
                                output.style.display = "flex";
                                selector.style.display = "none"
                            }
                        }
                    </script>
                </div>
            </div>
            <div class="bottom">
                <div class="button_btn">
                    <button type="submit" name="submit" class="btn btn-success">Suiviant</button>
                </div>
            </div>
        </form>
    </div>
</body> 
<?php 
if(isset($_POST['submit'])){
    $date = date('Y/m/d');
    $time = date("H:i:s");
    $item = $_POST['item'];
    $model = $_POST['model'];
    $description = $_POST['description'];
    $img1 =$_POST['img1'];
    $reward = 5;
    $latitude=0;
    $longitude=0;
    //geoloc or manual entry
    if(isset($_POST['checkbox'])){
        include 'getgeolocation.php';   
        $latitude = $lat;
        $longitude = $long;
    }else{
        $address = $_POST['address'];
        $city = $_POST['city'];
        $postal = $_POST['postal'];
        if(empty($address) or empty($city) or empty($postal)){
            ?><script>swal("Attention", "All feilds required", "warning")</script><?php
            mysqli_close($conn);
        }
    }

    if(!empty($item) and !empty($model) and !empty($description)){
        /*
        echo $date;?><br><?php
        echo $time;?><br><?php
        echo $item;?><br><?php
        echo $model;?><br><?php
        echo $description;?><br><?php
        echo $reward;?><br><?php
        echo $latitude;?><br><?php
        echo $longitude;?><br><?php
        echo $address;?><br><?php
        echo $city;?><br><?php
        echo $postal;?><br><?php
        */
        $insert = "insert into lost(account,date,time,item,model,img1,img2,img3,description,location,city,latitude,longitude)
            values('$account','$date','$time','$item','$model','$img1','acune','acune','$description','$location','$city','$latitude','$longitude')";
        $run=mysqli_query($conn,$insert);
        if($run){
            ?><script>swal("Perfect", "bien registre", "success")</script><?php
        }else{
            ?><script>swal("Attention", "Une problem avec la base du donne", "warning")</script><?php
        }
    }
    else{
        ?><script>swal("Attention", "All feilds required", "warning")</script><?php
        mysqli_close($conn);
    }
}
?>
</html>