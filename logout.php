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
    <div id="Banner">
        <h1 id="mainHeading">Logout</h1>
        <h3 id="subtitle">Thank you for using SwimStat!</h3>
    </div>


    This page needs to display a message to the user that they have logged out successfully.
    <?php
    //This removes the session
    session_start();
    session_destroy();
    ?>
</body>

</html>