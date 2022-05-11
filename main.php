<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation</title>
    <link rel="stylesheet" href="./css/main.css" />
</head>

<body id="BodyArea">

    <?php
    //   if (!isset($_SESSION["loggedIn"])) {
    //       header("Location: ./index.html", true, 307);
    //       exit();
    //   }
    ?>

    <div id="Banner">
        <h1 id="mainHeading">Welcome to SwimStats!</h1>
        <h3 id="subtitle">A proud product of Team.exe</h3>
    </div>

    <div id="navArea">
        <h1 id="navQuestion">What would you like to do?</h1>
        <br>
        <br>
        <div id="navGrid">
            <div class="linkBox">
                <a class="link" href="./manageswimmers.html">Manage swimmers</a>
            </div>
            <div class="linkBox">
                <a class="link" href="./managelocations.html">Manage locations</a>
            </div>
            <div class="linkBox">
                <a class="link" href="./logresults.html">Log results of an event</a>
            </div>
            <div class="linkBox">
                <a class="link" href="./uploadmedia.html">Upload media</a>
            </div>
            <div class="linkBox">
                <a class="link" href="./viewstatistics.html">View statistics</a>
            </div>
            <div class="linkBox">
                <a class="link" href="./logout.php">Logout</a>
            </div>
        </div>
    </div>

</body>

</html>