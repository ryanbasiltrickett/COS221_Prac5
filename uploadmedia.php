<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload media</title>
    <link rel="stylesheet" href="./css/uploadmedia.css" />
</head>

<?php
    $_SESSION["page"] = "uploadmedia";
    require_once("php/header.php");
?>

<body>
    <div class="uploadMedia-image">
    </div>
    <div class="credentials">
        <h1>Upload Media</h1>
        <h3>Enter the details of the media you wish to upload</h3>

        <div class="container">
            <form method='POST' action='validate-add.php'>  
                UPDATE CREDENTIALS!
            </form>                
        </div>
    </div>

    This page needs to allow the user to upload media to the database. The task is very vague so you have a lot of freedom for how you want to implement this functionality.
</body>

</html>