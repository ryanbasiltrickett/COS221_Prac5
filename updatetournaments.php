<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Tournament</title>
    <link rel="stylesheet" href="./css/managelocation.css" />
    <script src="js/manageeventinfo.js"></script>
</head>

<div class="updateTournament-image">
    <?php
        session_start();
        $_SESSION["page"] = "updatetournaments";
        require_once("php/header.php");
    ?>
</div>

<body onLoad="loadTournaments()">
    <div class="credentials">
        <h1>Update Tournament</h1>
        <h3>Enter the updated credentials of the tournament</h3>

        <div class="container">
            <form>  
                <label>Tournment: </label>   <br/>
                <select name="tournament" id="tournament" onChange="loadTournamentDetails()">
                </select> <br/>
                <label>Name: </label> <br/>
                <input type="text" placeholder="Enter Tournament Name" id="name" required> <br/>
                <label>Start Date: </label>   <br/>
                <input type="date" placeholder="dd-mm-yyyy" id="start" required> <br/>
                <label>End Date: </label>   <br/>
                <input type="date" placeholder="dd-mm-yyyy" id="end" required> <br/>
                <button onclick="updateTournament()" type="submit">Update</button>   <br/>
            </form>                
        </div>
    </div>
</body>

</html>