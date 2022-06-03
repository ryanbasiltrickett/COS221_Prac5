<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Media</title>
    <link rel="stylesheet" href="./css/uploadmedia.css" />
    <script src="js/uploadmedia.js"></script>
</head>

<div class="uploadMedia-image">
    <?php
        session_start();
        $_SESSION["page"] = "uploadmedia";
        require_once("php/header.php");
    ?>
</div>


<body onLoad="loadSwimmers()">

    <div class="credentials">
        <h1>Upload Media</h1>
        <h3>Upload the media of chosen swimmer</h3>

        <div class="container">
            <form method="POST" action="php/validate-media.php">  
                <br/>
                <label>Swimmer: </label> <br/>
                <select name="swimmer" id="swimmer">
                </select> <br/>

                <input type="file" id="file" name="image_file" accept="image/*"> <br/>
                <button  type="submit" onsubmit="uploadMedia()" name="upload">Upload</button>   <br/>
            </form>                
        </div>
    </div>

</body>

</html>