<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log results</title>
    <link rel="stylesheet" href="./css/logresult.css" />
</head>

<div class="logTeamResults-image">
    <?php
        session_start();
        $_SESSION["page"] = "logteam";
        require_once("php/header.php");
    ?>
</div>


<body>

    <div class="credentials">
        <h1>Log Results</h1>
        <h3>Enter result details</h3>

        <div class="container">
            <form method='POST' action='validate-add.php'>  
                <label>Swimmer 1: </label>   <br/>
                <select name="swimmer1" id="swimmer1">
                </select> <br/>
                <label>Swimmer 2: </label>   <br/>
                <select name="swimmer2" id="swimmer2">
                </select> <br/>
                <label>Swimmer 3: </label>   <br/>
                <select name="swimmer3" id="swimmer3">
                </select> <br/>
                <label>Swimmer 4: </label>   <br/>
                <select name="swimmer4" id="swimmer4">
                </select> <br/>
                <label>Tournment: </label>   <br/>
                <select name="tournament" id="tournament">
                </select> <br/>
                <label>Event: </label>   <br/>
                <input type="text" placeholder="Enter Event Of Tournament " name="event"> <br/>
                <label>Time: </label>   <br/>
                <input type="text" id="time" placeholder="mm:ss:mm" name="time"> <br/>
                <button onclick="addResult()" type="submit">Add Results</button>   <br/>
            </form>                
        </div>
    </div>

    You also need to be able to capture results for an entire team by specifying the 4 swimmers, the event, the tournament and the final time. This also needs to generate a team in the teams table, it might be needed to capture data such as date depending on the final data model.
</body>

</html>