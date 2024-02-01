<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="return">
        <a href="/trouverperdu/php/signin.php"s><img src="/trouverperdu/img/return.svg" width= "50px"/></a>
    </div>
    <div class="wrapper">
        <h5>Creér votre compte</h5>
        <form action="" method="POST">
            <label for="email">Nom</label>
            <input type="name" name="nom" id="login_input" placeholder="Thomas" required>
            <label for="email">Prenom</label>
            <input type="name" name="prenom" id="login_input" placeholder="John" required>
            <label for="telephone">Telephone</label>
            <input type="telephone" name="telephone" id="login_input" placeholder="0541236957" required>
            <label for="birthdate">Date de naissance</label>
            <input type="date" name="birth" id="login_input" placeholder="05/12/1988" required>
            <label for="city">Ville</label>
            <input type="city" name="ville" id="login_input" placeholder="Lyon" required>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="login_input" placeholder="jhon@xyz.fr" required>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="login_input" placeholder="wcxhteus1597@-%ù" required>
            <label for="password">Confirmer le mot de passe</label>
            <input type="password" name="confirmpassword" id="login_input" placeholder="wcxhteus1597@-%ù" required > 
            <button id="login-button" type="submit" name="submit" >Enregistrer</button>
        </form>
    </div>
</body>
</html>


<style>
    form {
        text-align: left;
        display: flex;
        flex-direction: column;
    }
    input#login_input {
        padding: 5px;
        background: #f2f2f2;
        margin-bottom: 10px;
        border: none;
        border-radius: 4px;
        border: 2px solid #f2f2f2;
    }
    .wrapper {
        padding: 20px;
    }
    button#login-button {
        padding: 10px;
        border: none;
        margin-top: 20px;
        border-radius: 10px;
    }
    a#login-href {
        margin-top: 30px;
        text-decoration: none;
        color: #4a4a4a;
        font-weight: 600;
    }
    button#create-account {
        position: fixed;
        bottom: 0;
        margin-bottom: 25px;
        width: -webkit-fill-available;
        margin-inline: 15px;
        border: none;
        padding: 10px;
        border-radius: 12px;
    }
    .return {
        background: #5396e6;
    }
</style>


<?php
    require_once 'config.php';
    if(isset($_POST['submit'])){
        $fullname = "";
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $birth = $_POST['birth'];
        $ville = $_POST['ville'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        if($password == $confirmpassword){
            $fullname = $prenom .' '. $nom;
            $array= array(
                "name" => $nom,
                "prenom" => $prenom,
                "telephone" => $telephone,
                "birth" => $birth,
                "ville" => $ville,
                "email" => $email,
                "password" => $password,
            );
            $encode = base64_encode(serialize($array));
            $insert = "insert into user(name, array) values('$fullname', '$encode')";
            $run = mysqli_query($conn, $insert);
            if($run){
                ?><script>swal("Bravo", "Vous ete registre", "success");</script><?php

            }else{
                echo $fullname;
                var_dump($array);
                ?><script>swal("Desole", "Maintenance en cours", "error");</script><?php
            }
        }else{
            ?><script>swal("Desole", "Invalid Credintials", "error");</script><?php
        }
    }
?>
