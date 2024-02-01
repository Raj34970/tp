<?php
    session_start();
    $st_email = $_SESSION['email'];
    include_once '../api/api_lost.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <title>Publications</title>
</head>
<body>
    <div class="retun-bar">
        
    </div>
    <div class="top-bar">
        <ul id="hd_pub">
            <li id="hd_pub">Annonce</li>
            <li id="hd_pub">Notification</li>
            <li id="hd_pub">Message</li>
        </ul>
    </div>
    <table class="table" id="found">
        <thead id="found">
            <tr>
                <th scope="col">#</th>
                <th scope="col">props</th>
            </tr>
        </thead>
        <?php for($i=0;$i<count($data); $i++){ ?>
            <tbody id="found">
                <tr>
                    <td>date/time du postule</td>
                    <td><?php echo $data[$i]['date']; ?><br><?php echo $data[$i]['time']; ?></td>
                </tr>
                <tr>
                    <td>address</td>
                    <td><?php echo $data[$i]['address']; ?></td>
                </tr>
                <tr>
                    <td>title</td>
                    <td><?php echo $data[$i]['title']; ?></td>
                </tr>
                <tr>
                    <td>description</td>
                    <td><?php echo $data[$i]['description']; ?></td>
                </tr>
            </tbody>
        <?php } ?>
        </table>

</body>
</html>

<style>
    ul#hd_pub {
        padding: 0;
        margin: 0;
        background: white;
        display: flex;
        justify-content: space-around;
        filter: drop-shadow(2px 4px 6px #f2f2f2);
    }
    li#hd_pub {
        text-align: center;
        width: -webkit-fill-available;
        list-style: none;
        padding: 10px;
        border-bottom: 2px solid white;
        transition: 0.4s;
    }
    li#hd_pub:hover{
        transition: 0.4s;
        background: #f3f1ff;
        border-bottom: 2px solid #846fe7;
    }

    table#found {
        margin-top: 20px !important;
        padding: 15px;
        width: -webkit-fill-available;
        background: white;
        border-radius: 12px;
    }
    thead#found {
        border-bottom: 2px solid white;
        background: #e3ddff;
    }

</style>