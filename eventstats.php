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
    $_SESSION["page"] = "eventstats";
    require_once("php/header.php");
?>


<body id="page">

    <div class="titlediv">
        <h1>Review Fastest Swimmers Per Event</h1>
        <h3>Choose an Event</h3>

        <div class="container">

            <label>Event: </label> <br />
            <select name="event" id="events">
            </select> <br />
            <button onclick="getTopFive()">View</button> <br />

        </div>
    </div>


    <div class="statsarea">
        <table id="resultsArea">
            
        </table>
    </div>

    <script src="./js/eventstats.js"></script>
</body>

</html>