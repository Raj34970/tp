
<?php 
    if(isset($_SESSION['email'])){
        $st_email = $_SESSION['email'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=ul, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    <ul id="sidebar_ul">
        <li id="sidebar_li" style="background: #2e84cb; margin-top: 0 !important; border-radius: 0px; color: white; padding-top: 25px; font-weight: 600; ">
            <div class="account">
                <img src="../img/avatar.svg" width="35px !important;" alt="avatar" style="background: white; border-radius: 50%; padding: 4px;">
                <?php echo $st_email.'<span class="logged-in">●</span>';?>
            </div>
        </li>
        <li id="sidebar_li"><a href="/trouverperdu/php/profile.php" class=href><img src="../img/profile_blue.svg" width="28px" class="li_img" />Profile</a></li>
        <li id="sidebar_li"><a href="/trouverperdu/php/pub.php" class=href><img src="../img/promotion.svg" width="28px" class="li_img" />Mes Publcations</a></li>
        <li id="sidebar_li"><a href="/trouverperdu/php/pub.php" class=href><img src="../img/envelope.svg" width="28px" class="li_img" />Mes Messages</a></li>
        <li id="sidebar_li"><a href="/trouverperdu/php/pub.php" class=href><img src="../img/notification.svg" width="28px" class="li_img" />Notification</a></li>
        <li id="sidebar_li"><a href="logout.php"><p class="card-text" id="logout_btn"><img src="../img/logout_red.svg" width="28px"/>deconnecter</p></a></li>
    </ul>
</body>
</html>

<style>
    .account {
        display: flex;
        margin-bottom: 10px;
        margin-inline: 46px;
        align-items: center;
        justify-content: space-between;
    }
    span.logged-in {
        color: #2e9b22;
    }
    ul#sidebar_ul {
        padding: 0;
        margin: 0;
        height: 100vh;
        float: right;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        width: 0px;
        background: #f2f2f2;
        border-bottom: 4px solid #2e84cb;
    }
    li#sidebar_li{  
        margin-top: 35px;
        list-style: none;
    }
    .card{
        align-items: center;
    }
    .card-title {
        text-align: center;
    }
    .card-body{
        padding: 0 !important;
        margin-top: 30px;
        height: 45vh;
    }
    p.card-text {
        margin: 0;
        padding: 10px;
        display: block;
        max-width: 180px;
    }
    p#logout_btn {
        font-weight: 700;
    }
    img.li_img{
        margin-inline: 13px;
    }
</style>