<?php 
    require 'config.php'; 
    require '../api/api_lost.php';
    $i=0; $a=0;
    $stId = $_GET['id'];
    for($i=0;$i<count($arr_lost);$i++){
        if($stId == $arr_lost[$i][0]){
            $a=$i;
            break;
        }
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
    
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    
    <link href="/trouverperdu/img/fab.png" rel="icon" type="image/x-icon" />
    <title>Trouver-perdu @article</title>
</head>
<body>
    <div class="topBar">
        <a href="/trouverperdu/php/mobile.php"><h3 id="topbar_h3">trouver-perdu</h3></a>
    </div>
    <div class="container">
        <img src="/trouverperdu/img/<?php echo $arr_lost[$a][6];?>" width="350px" />
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
            <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
            <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
        </ul>
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>HOME</h3>
                <p>Some content.</p>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Some content in menu 1.</p>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Some content in menu 2.</p>
            </div>
        </div>
        <table class="table table-striped" id="table_article">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">date</th>
                    <td><?php echo $arr_lost[$a][2]; ?></td>
                </tr>
                <tr>
                    <th scope="row">time</th>
                    <td><?php echo $arr_lost[$a][3]; ?></td>
                </tr>
                <tr>
                    <th scope="row">item</th>
                    <td><?php echo $arr_lost[$a][4]; ?></td>
                </tr>
                <tr>
                    <th scope="row">account</th>
                    <td><?php echo $arr_lost[$a][1]; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>