<?php 
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="/trouverperdu/css/style_register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <script src="/trouverperdu/js/getGeoloc.js"></script>
    <link href="/trouverperdu/img/fab.png" rel="icon" type="image/x-icon" />
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <title>Trouver-perdu</title>
</head>
<body>
    <div class="headbar">
        <h5>trouver-perdu</h5>
        <a href="/trouverperdu/index.php"><button type="button" id="headbar-button">se connecter</button></a>
    </div>
    <div class="input-feild">
        <div class="il_svg">
            <img src="/trouverperdu/img/registar.jpg" width="350px"/>
        </div>
        <form method="POST" action="">
            <h3 id="heading"><img src="/trouverperdu/img/create.svg" width="35px"/> Cree votre compte !</h3>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label for="fname">Prenom</label>
                        <input type="text" id="form3Example1" placeholder="Prenom" class="form-control" name="fname" required/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                    <label for="lname">Nom</label>
                        <input type="text" id="form3Example2" placeholder="Nom" class="form-control" name="lname" required/>
                    </div>
                </div>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label for="email">email</label>
                <input type="email" id="form3Example3" placeholder="email" class="form-control" name="email" required/>
            </div>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <label for="email">mode du passe</label>
                <input type="password" id="form3Example4" placeholder="mot de passe.." class="form-control" name="password" required/>
            </div>
            <div class="form-outline mb-4">
                <label for="email">confirme mode du passee</label>
                <input type="password" id="form3Example4" placeholder="mot de passe.." class="form-control" name="confirm_password" required/>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <label for="email">phone</label>
                        <input type="text" id="form3Example1" placeholder="phone" class="form-control" name="phone" required/>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <label for="email">adresse</label>
                        <input type="text" id="form3Example2" placeholder="Adresse" class="form-control" name="address" required/>
                    </div>
                </div>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                <label class="form-check-label" for="form2Example33">
                Subscribe to our newsletter
                </label>
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary btn-block mb-4" id="primary_button">Sign up</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>or sign up with:</p>
                <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-github"></i>
                </button>
            </div>
        </form>
    </div>
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

<?php 
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        //to cocatinate name
        $name = $fname.' '.$lname;
        if($password != $confirm_password){
            ?><script>swal("Attention","Votre mode du passe n'est pas meme !","warning");</script><?php
        }
        $array = array($fname,$name,$email,$email,$password,$phone,$address);
        $serialize_user = base64_encode(serialize($array));
        
        $insert = "insert into user(name,array) values('$name','$serialize_user')";
        $run = mysqli_query($conn,$insert); 
        if($run){
            ?><script>swal("Perfect", "Vous ete enregistre", "success")</script><?php
        }else{
            ?><script>swal("Desole", "Nos serveur est en maintenance, en va retorne rapidment..", "attention")</script><?php
        }
    }
?>