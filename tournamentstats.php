<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Stats</title>
    <link rel="stylesheet" href="./css/viewstatistics.css" />
    <script src="js/tournamentstats.js"></script>
</head>

<?php
session_start();
$_SESSION["page"] = "tournamentstats";
require_once("php/header.php");
?>

<body onLoad="loadTournaments()" id="page">
    <div class="titlediv">
        <h1>Review Tournament Statistics</h1>
        <h3>Choose a Tournament</h3>

        <div class="container">

            <label>Tournament: </label> <br />
            <select name="tournament" id="tournament"></select>
            </select> <br />
            <button onclick="loadTournamentStats()">View</button> <br />

        </div>
    </div>

    <div class="statsarea">

        <label id="tournStatLabel"> </label> <br/>

        <table id="tournamentStats">
                
        </table>
    </div>

</body>

</html>