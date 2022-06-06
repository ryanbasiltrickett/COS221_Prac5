<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Team Results</title>
    <link rel="stylesheet" href="./css/logresult.css" />
    <script src="js/logresults.js"></script>
</head>

<?php
session_start();
$_SESSION["page"] = "logresults";
require_once("php/header.php");
?>

<body onLoad="loadTeamPage()">
    <div class="logResultsTeam-image">
        <div class="credentialsTeam">
            <h1>Log Results</h1>
            <h3>Enter result details</h3>

            <div class="container">
                <form method='POST' action='validate-add.php'>
                    <label>Swimmer 1: </label> <br />
                    <select name="swimmer1" id="swimmer1">
                    </select> <br />
                    <label>Swimmer 2: </label> <br />
                    <select name="swimmer2" id="swimmer2">
                    </select> <br />
                    <label>Swimmer 3: </label> <br />
                    <select name="swimmer3" id="swimmer3">
                    </select> <br />
                    <label>Swimmer 4: </label> <br />
                    <select name="swimmer4" id="swimmer4">
                    </select> <br />
                    <label>Tournment: </label> <br />
                    <select name="tournament" id="tournament">
                    </select> <br />
                    <label>Event: </label> <br />
                    <select name="event" id="event">
                    </select> <br />
                    <label>Swimming Lane: </label> <br />
                    <select name="lane" id="lane">
                    </select> <br />
                    <label>Event Phase: </label> <br />
                    <select name="phase" id="phase">
                    </select> <br />
                    <label>Time: </label> <br />
                    <input type="text" id="time" placeholder="mm:ss:ms" name="time"> <br />
                    <button onclick="addTeamResult()" type="submit">Add Results</button> <br />
                </form>
            </div>
        </div>
    </div>
</body>

</html>