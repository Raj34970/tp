<?php 
    session_start();
    $st_email = $_SESSION['email'];
    //echo $st_email;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    <title>Trouverperdu</title>
</head>
<body>
    <form action="" method="POST">
        <h5 id="header"><a href="/trouverperdu/php/trouvaille.php"><img src="/trouverperdu/img/leftReturn.svg" id="img_header"/></a><img src="/trouverperdu/img/key.svg" id="img_catagory" />Clé</h5>
        <div class="wrapper-photo">
            <div class="photo-content">
                <div class="preview-container" id="preview1">
                    <img src="/trouverperdu/img/photocapture.svg" class="src">
                    <label for="fileInput1" class="file-input"></label>
                </div>
            </div>
            <div class="photo-content">
                <input name="img1" type="file" id="fileInput1" accept="image/*" onchange="previewImage(event, 'preview1')"/>
                
                <div class="preview-container" id="preview2">
                    <img src="/trouverperdu/img/photocapture.svg" class="src">
                    <label for="fileInput2" class="file-input"></label>
                </div>
            </div>
            <div class="photo-content">
                <input name="img2" type="file" id="fileInput2" accept="image/*" onchange="previewImage(event, 'preview2')"/>
                
                <div class="preview-container" id="preview3">
                    <img src="/trouverperdu/img/photocapture.svg" class="src">
                    <label for="fileInput3" class="file-input"></label>
                </div>
                <input name="img3" type="file" id="fileInput3" accept="image/*" onchange="previewImage(event, 'preview3')"/>
            </div>
        </div>
        <div class="input-feild">
            <div class="box-input">
                <label class="sr-only" for="inlineFormInputGroupUsername">Adresse</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><img src="/trouverperdu/img/location.svg" width="25px"></div>
                    </div>
                    <input type="text" name="address" class="form-control" placeholder="Montpellier, comedie, 34000" aria-label="Address" aria-describedby="basic-addon1" id="address-input">
                    <ul id="address-list"></ul>
                </div>
            </div>
            <div class="box-input">
                <label class="sr-only" for="inlineFormInputName">Titre</label>
                <input type="text" class="form-control" name="title" id="inlineFormInputName" placeholder="Clé voiture" require>
            </div>
            <div class="box-input">
                <label class="sr-only" for="inlineFormInputName">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="6" require></textarea>
            </div>
            <div class="validate">
                <button type="submit" name="submit" class="btn btn-success">Valider</button>
            </div>
        </div>
    </form>
</body>
</html>

<?php 
    if(isset($_POST['submit'])){
        include_once 'config.php';
        $date = date("d/m/Y");
        $time = date('H:i');

        $catagory = $_GET['catagory'];
        $address = $_POST['address'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $img1 = $_POST['img1'];
        $img2 = $_POST['img2'];
        $img3 = $_POST['img3'];
        
        $array = array(
            "date" => $date,
            "time" => $time,

            "img1" => $img1,
            "img2" => $img2,
            "img3" => $img3,
            
            "catagory" => $catagory,
            "address" => $address,
            "title" => $title,
            "description" => $description,
        );

        $encoded = base64_encode(serialize($array));
        $insert = "INSERT INTO lost(email, array) VALUES('$st_email','$encoded')";
        $run = mysqli_query($conn, $insert);
        if($run){?>
            <script>
                swal(
                    'Bien enregistre',
                    'Votre produict ete bien enregistre',
                    'success',
                );
            </script>
        <?php } else{ ?>
            <script>
                swal(
                    'Error',
                    'Ils ya une problem avec la base du donne',
                    'error',
                );
            </script>
        <?php }
        //var_dump($array);
    }
?>



<script src="../js/streetAPI.js"></script>
<script src="../js/geoloc.js"></script>

<style>
    img#img_catagory {
        width: 28px;
        margin-inline: 20px;
    }
    h5#header {
        padding: 10px;
        font-weight: 400;
        background: #f2f2f2;
    }
    .photo-conent {
        width: 100vw;
        text-align: center;
        background: #e8e8e8;
        margin: 15px;
        border-radius: 8px;
        border: 1px solid #d8d8d8;
    }
    .wrapper-photo {
        justify-content: space-around;
        display: flex;
    }
    .input-feild {
        margin: 15px;
    }
    .box-input {
        margin-bottom: 23px;
    }
    input{
        filter: drop-shadow(2px 4px 6px #f2f2f2);
    }
    label {
        display: inline-block;
        width: -webkit-fill-available;
        padding: 2px;
    }
    img#img_header {
        width: 50px;
    }
    .validate {
        float: right;
    }

    .photo-content {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .preview-container {
        margin-right: 10px;
        position: relative;
    }
    
    .file-input {
        position: absolute;
        transform: translateX(-60px);
        opacity: 0;
        cursor: pointer;
    }
    ul#address-list {
        padding: 0;
        list-style: none;
        width: -webkit-fill-available;
        background: #f2f2f2;
    }
    li {
        margin: 10px;
        border-bottom: 2px solid #e3e3e3;
        margin-inline: 0;
        padding-inline: 10px;
        padding-bottom: 10px;
    }
    
    .upload-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100px;
        height: 100px;
    }
    
    .preview-container img {
        max-width: 50px;
    }

    input#fileInput1, input#fileInput2, input#fileInput3 {
        display: none;
    }
</style>


<script>
    function previewImage(event, previewId) {
        var preview = document.getElementById(previewId);
        var file = event.target.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var image = document.createElement("img");
                image.src = e.target.result;
                preview.innerHTML = "";
                preview.appendChild(image);
            };

            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '<img src="/trouverperdu/img/photocapture.svg" class="src">';
        }
    }
</script>