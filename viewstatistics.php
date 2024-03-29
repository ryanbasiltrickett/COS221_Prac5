<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Statistics</title>
    <link rel="stylesheet" href="./css/viewstatistics.css" />
</head>


<?php
    session_start();
    $_SESSION["page"] = "viewstatistics";
    require_once("php/header.php");
?>

<body id="page">
    <div class="credentials">
        <h1>View Statistics</h1>
        <h3>What statistics would you like to view?</h3>

        <div id="main-buttons">
            <a href="individualstats.php"> <button type="button">Individual Swimmer Stats</button></a>
            <a href="eventstats.php"> <button type="button">Event Stats</button></a>
            <a href="tournamentstats.php"> <button type="button">Tournament Stats</button></a>
        </div>
    </div>

</body>

</html>