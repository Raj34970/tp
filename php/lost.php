<?php 
    include 'header.php';
    require_once 'config.php';
    require_once '../api/api_lost.php';
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
    <div class="top-bar">
        <div class="form-check form-switch">
            <img src="/trouverperdu/img/map.svg" width="25px" /><input class="form-check-input" type="checkbox" id="mySwitch" name="checkbox" value="checked" onclick="toggle()"><img src="/trouverperdu/img/list.svg" width="25px" />
        </div>
        <div class="class-range">
            5kms<input type="range" class="form-range" id="customRange1" min="5" max="50kms" step="1">50kms
        </div>
    </div>
    <!-- maps -->
    <div class="maps" id="maps">
        <?php include 'listall.php'; ?>
        <?php include 'geo.php';?>
    </div>
    <div class="container" id="list">
        <h1 id="heading"><img src="/trouverperdu/img/list.svg" width="35px"/>Liste</h1>
        <div class="list-body">
            <?php include 'listall.php'; ?>
            <div class="row">
                <?php $i=0; for($i=0;$i<count($arr_lost);$i++){?>
                <!-- list -->
                <div class="col-md-4">
                    <div class="card" style="width: 14rem;">
                        <p class="card-text">ils ya<?php ?></p>
                        <img class="card-img-top" src="/trouverperdu/img/<?php echo $arr_lost[$i][6]; ?>" alt="Card image cap" />
                        <div class="card-body">
                            <p class="card-text">model: <?php echo $arr_lost[$i][5];?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <script>
        function toggle() {
            var elements2 = document.getElementsByClassName("maps");
            for (var i = 0; i < elements2.length; i++) {
                if (elements2[i].style.display === "none") {
                    elements2[i].style.display = "flex";
                } else {
                    elements2[i].style.display = "none";
                }
            }
        }
    </script>
</body>
<footer><?php include 'footer.php'; ?></footer>
</html>