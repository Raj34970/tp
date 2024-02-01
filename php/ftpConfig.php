<?php
    $connect=ftp_connect("johnsite.com");
    $result=ftp_login($connect,"","");
    if(!$result){
        echo'Could not connect to Server';  
    }
    $result=ftp_put($connect,'myFile.php', FTP_ASCII);
    echo'UPLOADING FILE......';
    if($result){
        echo'File Uploaded!';
    }
?>