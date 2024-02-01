<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="header-bar">
        <a href="/trouverperdu/php/addlost.php"><img src="/trouverperdu/img/leftReturn.svg" id="img_header"/></a>
        <h5 id="header">Deposer une annonce</h5>
    </div>
    <div class="button-btn">
        <button id="catagory" onclick="catagory()">Categorie</button>
    </div>
    <ul id="catagory">
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=key" class="href"><img src="/trouverperdu/img/key.svg" alt="" id="img_catagory">Clé</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=wallet" class="href"><img src="/trouverperdu/img/wallet.svg" alt="" id="img_catagory">Porte Feuille</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=animal" class="href"><img src="/trouverperdu/img/animal.svg" alt="" id="img_catagory">Animal</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=phone" class="href"><img src="/trouverperdu/img/phone.svg" alt="" id="img_catagory">Telephone</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=electronics" class="href"><img src="/trouverperdu/img/laptop.svg" alt="" id="img_catagory">Ordinateur/Tablette</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=card" class="href"><img src="/trouverperdu/img/idCard.svg" alt="" id="img_catagory">Carte</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=clothes" class="href"><img src="/trouverperdu/img/clothes.svg" alt="" id="img_catagory">Vetement</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=headphones" class="href"><img src="/trouverperdu/img/headphones.svg" alt="" id="img_catagory">Ecouteur</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=sunglass" class="href"><img src="/trouverperdu/img/sunglass.svg" alt="" id="img_catagory">Lunette</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=key" class="href"> <img src="/trouverperdu/img/backpack.svg" alt="" id="img_catagory">Baggage</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=jewellery" class="href"><img src="/trouverperdu/img/jewelry.svg" alt="" id="img_catagory">Bijoux</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=money" class="href"><img src="/trouverperdu/img/euro.svg" alt="" id="img_catagory">Monnaie</a></li>
        <li id="catagory"><a href="/trouverperdu/php/details.php?catagory=others" class="href"><img src="/trouverperdu/img/points.svg" alt="" id="img_catagory">Autres</a></li>
    </ul>
</body>
</html>


<style>
    a{
        color: black;
        text-decoration: none;
    }
    h5#header {
        padding: 10px;
        font-weight: 400;
    }
    img#img_header {
        width: 45px;
    }
    .header-bar {
        display: flex;
        justify-content: space-between;
        background: #f2f2f2;
    }
    .button-btn {
        text-align: center;
    }
    button#catagory {
        border: none;
        width: -webkit-fill-available;
        padding: 10px;
        margin: 20px;
        border-radius: 6px;
        font-weight: 600;
        border-bottom: 2px solid#e25328;
    }
    ul#catagory {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    li#catagory {
        padding: 10px;
        border-bottom: 1px solid#f2f2f2;
    }
    li#catagory:active {
        background: #f3f3f3;
    }
    img#img_catagory {
        width: 28px;
        margin-inline: 20px;
    }
</style>