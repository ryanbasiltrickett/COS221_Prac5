<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Media</title>
    <link rel="stylesheet" href="./css/uploadmedias.css" />
</head>

<div class="uploadMedia-image">
    <?php
        session_start();
        $_SESSION["page"] = "uploadmedia";
        require_once("php/header.php");
    ?>
</div>


<body>

    <div class="credentials">
        <h1>Upload Media</h1>
        <h3>Enter the details of the media you wish to upload</h3>

        <div class="container">
            <form method='POST' action='validate-upload.php'>  
                <label >Upload picture or Video:</label> <br> <br>

                <input type="file" id="file" name="file" accept="image/png, image/jpeg, video/mp4"> <br/>
                <button onclick="uploadMedia()" type="submit">Upload</button>   <br/>
            </form>                
        </div>
    </div>

</body>

</html>