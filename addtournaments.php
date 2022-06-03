<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Tournament</title>
    <link rel="stylesheet" href="./css/managelocation.css" />
    <script src="js/manageeventinfo.js"></script>
</head>

<div class="addTournament-image">
    <?php
        session_start();
        $_SESSION["page"] = "addtournaments";
        require_once("php/header.php");
    ?>
</div>

<body>
    <div class="credentials">
        <h1>Add Tournament</h1>
        <h3>Enter the details of the tournament to be added</h3>

        <div class="container">
            <form>  
                <label>Name: </label> <br/>
                <input type="text" placeholder="Enter Tournament Name" id="name" required> <br/>
                <label>Start Date: </label>   <br/>
                <input type="date" placeholder="dd-mm-yyyy" id="start" required> <br/>
                <label>End Date: </label>   <br/>
                <input type="date" placeholder="dd-mm-yyyy" id="end" required> <br/>
                <button onclick="addTournament()" type="submit">Add</button>   <br/>
            </form>                
        </div>
    </div>
</body>

</html>