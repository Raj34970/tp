<?php
    require 'php/config.php';
    require 'api/api_lost.php';
    require_once 'api/api_signin.php';

    if(isset($_SESSION['email'])){
        header('location:php/mobile.php'); 
    }
    
    ob_start();
    if(isset($_POST['submit'])){
        $i=0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login_successful = false;

        while($i<count($mod_array_user)){
            if($mod_array_user[$i]['email'] == $email and $mod_array_user[$i]['password'] == $password){
                $login_successful = true;
                break;
            }
            $i++;
        }
        if($login_successful){
            header('location: /trouverperdu/php/mobile.php');
            session_start();
            $_SESSION['email'] = $email;
            ob_end_flush();
            exit();
        }
        else{?>
            <script>
                Swal.fire({
                    icon: "error",
                    title : "Desole!",
                    background:  "white",
                    text: "Votre email/mdp ne pas correct !",
                    footer: "creé par indevapp.fr"
                });
            </script>
        <?php }
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/getGeoloc.js"></script>
    
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    
    <link href="/trouverperdu/img/fab.png" rel="icon" type="image/x-icon" />
    <title>Trouver-perdu</title>
</head>
<body>
    <!-- ---------- for computer -->
    <div class="box">
        <div class="heading" id="left">
            <h1>Objet Perdu</h1>
            <a href="/trouverperdu/php/lost.php"><img src="/trouverperdu/img/lost.svg" width=100px></a>
        </div>
        <div class="heading" id="right">
            <h1>Objet Trouver</h1>
            <a href="/trouverperdu/php/found.php"><img src="/trouverperdu/img/search.svg" width=100px></a>
        </div>
    </div>
    
    <!-- ---------- for mobile --> 
    <div class="headbar">
        <h5>trouver-perdu</h5>
        <button type="button" id="headbar-button">se connecter</button>
    </div>
    <h1 id="index_h1">"Vous êtes bien dans le webapp pour trouver vos articles"</h1>
    <div class="flex-box">
        <img src="/trouverperdu/img/socio_freepik.jpg" id="index_img" width="250px"/>
        <h5 id="index_h5">Ne perd pas votre material !</h5>
        <p id="index_p">Ne jamais perdre votre matériel toujours garder 
            une trace de vos effets perdus avec notre application 
            Web nouvellement publié. Et en plus, c’est complètement 
            gratuit à utiliser. Commencez à l’utiliser aujourd’hui.
        </p>
    </div>
    <div class="flex-box2">
        <img src="/trouverperdu/img/questionMark_freepik.jpg" id="index_img" width="250px"/>
        <h1 id="index_h1">Qui somme nous ?</h1>
        <p>Nous sommes quelques développeurs qui ont fait une 
            application web pour trouver vos biens perdus 
            aussi vite que possible !
        </p>
    </div>
    <div class="flex-box">
        <img src="/trouverperdu/img/location_freepik.jpg" id="index_img" width="250px"/>
        <h5 id="index_h5">Comment ça marche ?</h5>
        <p id="index_p">Ne jamais perdre votre matériel toujours garder 
            une trace de vos effets perdus avec notre application 
            Web nouvellement publié. Et en plus, c’est complètement 
            gratuit à utiliser. Commencez à l’utiliser aujourd’hui.
        </p>
    </div>
    
    <h1 id="index_h1">Connecter-Vous</h1>
    <form action="" method="POST">
        <img src="/trouverperdu/img/il_login.jpg" width="250px" />
        <div class="input-login">
            <label>email<img src="/trouverperdu/img/email_blue.svg" width="20px"/></label>
            <input type="email" name="email" autofill="none" required/>
        </div>
        <div class="input-login">
            <label>mdp<img src="/trouverperdu/img/key.svg" width="20px"/></label>
            <input type="password" name="password" autofill="none" required/>
        </div>
        <button name="submit" type="submit" id="submit-button">connexion</button>
        <a href="#" class="href">creé une compté ?</a>
    </form>
</body>
<footer>
    <div class="flex-box3">
        <h5 id="index_h5">trouver-perdu</h5>
        <h5>Contacter nous:</h5>
        <ul>
            <li><i class="fa fa-facebook fa-2x"></i></li>
            <li><i class="fa fa-instagram fa-2x"></i></li>
            <li><i class="fa fa-linkedin fa-2x"></i></li>
        </ul>
        <hr>
        <h5 id="index_footer_h5"><img src="/trouverperdu/img/lock.svg" style="width: 25px; margin-inline: 10px;" />Crée par indevapp.fr</h5>
    </div>
</footer>
</html> 

<script>
    $("button").click(function() {
        $('html,body').animate({
            scrollTop: $("form").offset().top},
            'slow');
    });
</script>

<?php


?>