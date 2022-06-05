<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Stats</title>
    <link rel="stylesheet" href="./css/viewstatistics.css" />
</head>


<?php
session_start();
$_SESSION["page"] = "viewstatistics";
require_once("php/header.php");
?>


<body id="page">

    <div class="credentials">
        <h1>View fastest swimmers per event</h1>
        <h3>Choose an event</h3>

        <div class="container">

            <label>Event: </label> <br />
            <select name="event" id="events">
            </select> <br />
            <button onclick="getTopFive()">View</button> <br />

        </div>
    </div>

    <div id="resultsArea">
        <div class="gridCell">
            <p class="gridTitle">Rank</p>
        </div>
        <div class="gridCell">
            <p class="gridTitle">Swimmer</p>
        </div>
        <div class="gridCell">
            <p class="gridTitle">Time</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">1</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">Dave Davidson</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">00:40:38</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">2</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">Dave Davidson</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">00:40:38</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">3</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">Dave Davidson</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">00:40:38</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">4</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">Dave Davidson</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">00:40:38</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">5</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">Dave Davidson</p>
        </div>
        <div class="gridCell">
            <p class="gridContent">00:40:38</p>
        </div>
    </div>


    <script src="./js/eventstats.js"></script>
</body>

</html>