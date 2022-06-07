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

<body onLoad="loadUpdate()">
    <div class="tournStats-image">
        <h1>Review Tournament Statistics</h1>
        <div id="tournStats">
        <label>Tournament: </label> 
        <select name="tournament" id="tournament" onChange="loadTournamentStats()"></select>
        <br/>
        <br/>
        <br/>

        <label id="tournStatLabel"> </label> <br/>

        <table id="tournamentStats">
                
        </table>
    </div>

</body>

</html>