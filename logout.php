<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="./css/logout.css" />
</head>

<body>
    <div class="index-image">
        <div class="content">
            <h1>Thank you for using SwimStat!</h1>

        </div>
    </div>



    <?php
    //This removes the session
    session_start();
    session_destroy();
    ?>
</body>

</html>