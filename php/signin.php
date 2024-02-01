<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.2/sweetalert2.min.js"></script>
    <title>Signin-Page</title>
</head>
<body>
    <div class="wrapper">
        <h5>Bonjour</h5>
        <p>Connectez-vous pour decouvrir toutes nos fonctionnalités </p>
        <form action="" method="POST">
            <input type="email" name="email" id="login_input" placeholder="jhon@xyz.fr">
            <input type="password" name="password" id="login_input" placeholder="wcxhteus1597@-%ù">
            <a href="" class="href" id="login-href">Mot de passe oublié</a>
            <button id="login-button" type="submit" name="submit">Se connecter</button>
        </form>
        <button id="create-account"><a href="createAccount.php" class="href" id="login-href">Creé un compte</a></button>
    </div>
</body>
</html>

<?php 
    require_once 'config.php';
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = mysqli_query($conn, "SELECT * FROM signin");
        $fetch = mysqli_fetch_array($sql);
        if($fetch['email']==$email and $password == $fetch['password']){
            session_start();    
            $_SESSION['email'] = $email;
            header("Location: /trouverperdu/php/mobile.php");
        }else{?>
            <script>swal("Desole", "Invalid Credintials", "error");</script>
        <?php }
    }
?>


<style>
    form {
        text-align: center;
        display: flex;
        flex-direction: column;
    }
    input#login_input {
        padding: 10px;
        background: #f2f2f2;
        margin-top: 10px;
        margin-bottom: 10px;
        border: none;
        border-radius: 5px;
    }
    .wrapper {
        margin: 20px;
    }
    button#login-button {
        background: #e3782a;
        padding: 10px;
        border: none;
        font-weight: 600;
        margin-top: 20px;
        border-radius: 10px;
        color: #fff;
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
</style>