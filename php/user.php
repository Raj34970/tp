<?php 
include "header.php";
if(isset($_SESSION['email']) == "login"){
    header("Location: lost.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="/trouverperdu/img/logo.png" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/trouverperdu/css/style_login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.2/sweetalert2.min.js"></script>
    <title>User</title>
    <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
</head>
<body>
    <form action="" method="POST">
        <div class="svg">
            <img src="/trouverperdu/img/il_login.jpg" width="350px" />
        </div>
        <div class="input-feild">
            <div class="logo"><img src="/trouverperdu/img/logo.png" /></div>
            <div class="input-feild">
                <label for="email">email</label>
                <input type="email" name="email" id="input" required><br><br>
                <label for="lname">mdp</label>
                <input type="password" name="password" id="input" required><br><br>
                <input type="submit" name="submit" value="Submit" id="submit"/>
            </div>
        </div>
    </form>
    <div class="register">
        <a href="register.php" style="color: black;"><h5>creé une compte !</h5></a>
    </div>
</body>
</html>

<?php 
    if(isset($_POST['submit'])){
        $a=0;
        $email = $_POST['email'];
        $password = $_POST['password'];
        require_once '../api/api_signin.php';
        $query = mysqli_query($conn, "SELECT * FROM user"); 
        while($fetch_arr = mysqli_fetch_array($query)){
            $arr = unserialize(base64_decode($fetch_arr['array']));
            if($arr[3]==$email and $arr[4]==$password){
                $_SESSION['email'] = $email;
                //header('Location: lost.php');
                ?><script>swal("Perfect", "Beinvenue", "success");</script><?php 
            }else{
                $a++;
            }
        }
        if($a>0){
            ?><script>swal("Desole", "Invalid Credintials", "error");</script><?php 
        }
    }
?>



