<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event Phase</title>
    <link rel="stylesheet" href="./css/manageeventinfo.css" />
    <script src="js/manageeventinfo.js"></script>
</head>

<div class="manageEventInfo-image">
    <?php
    session_start();
    $_SESSION["page"] = "manageeventinfo";
    require_once("php/header.php");
    ?>
</div>

<body onLoad="loadEventPhasePage()">
    <div class="credentials">
        <h1>Add Event Phase</h1>
        <h3>Enter the details of the tournament event phase to be added</h3>

        <div class="container">
            <form>
                <label>Tournament: </label> <br />
                <select id="tournament" required>
                </select> <br />
                <label>Event: </label> <br />
                <select id="event" required>
                </select> <br />
                <label> Phase Classification: </label> <br />
                <input type="text" placeholder="Enter Classification of Phase" id="phase" required> <br />
                <label>Date: </label> <br />
                <input type="date" placeholder="dd-mm-yyyy" id="date" required> <br />
                <label>Start Time: </label> <br />
                <input type="time" placeholder="hh:mm:ss" id="start" required> <br />
                <label>End Time: </label> <br />
                <input type="time" placeholder="hh:mm:ss" id="end" required> <br />
                <button onclick="addPhase()" type="submit">Add</button> <br />
            </form>
        </div>
    </div>
</body>

</html>