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
        <a href="/trouverperdu/php/mobile.php"><img src="/trouverperdu/img/leftReturn.svg" id="img_header"/></a>
        <h5 id="header"></h5>
    </div>
    <div class="box-card">
        <div class="trouver">
            <a href="/trouverperdu/php/trouvaille.php"><img src="/trouverperdu/img/search.svg" id="box-card"></a>
            <h5>Trouver</h5>
        </div>
        <div class="perdu">
            <a href="/trouverperdu/php/perdu.php"><img src="/trouverperdu/img/confused.svg" id="box-card"></a>
            <h5>Perdu</h5>
        </div>
    </div>
</body>
</html>

<style>
    .box-card {
        display: flex;
        flex-direction: column;
        margin: 20px;
    }
    img#box-card {
        width: 150px;
    }
    .trouver, .perdu {
        margin: auto;
        margin-bottom: 35px;
        text-align: center;
        background: #f2f2f2;
        border: 2px solid #e7e7e7;
        border-radius: 20px;
    }
</style>