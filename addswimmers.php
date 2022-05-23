<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage swimmers</title>
    <link rel="stylesheet" href="./css/manageswimmers.css" />
</head>

<?php
    $_SESSION["page"] = "addswimmers";
    require_once("php/header.php");
?>

<body>
    <div class="addSwimmer-image">
    </div>
    <div class="credentials">
        <h1>Add Swimmers</h1>
        <h3>Enter the new swimmers details</h3>

        <div class="container">
            <form method='POST' action='validate-add.php'>  
                <label>First Name: </label>   <br/>
                <input type="text" placeholder="Enter Swimmer First Name" name="fname" required> <br/>
                <label>Middle Name: </label>   <br/>
                <input type="text" placeholder="Enter Swimmer Middle Name" name="mname"> <br/>
                <label>Last Name: </label>   <br/>
                <input type="text" placeholder="Enter Swimmer Last Name" name="lname" required> <br/>
                <label>ID Number: </label> <br/>
                <input type="text" placeholder="Enter Swimmer ID Number" name="id" required>  <br/>
                <label>Country: </label>   <br/>
                <input type="text" placeholder="Enter Country Of Swimmer " name="country"> <br/>
                <label>Date of Birth: </label>   <br/>
                <input type="date" id="data" placeholder="dd-mm-yyyy" min="1973-01-01" max="2003-12-31" name="date"> <br/>
                <button onclick="addSwimmer()" type="submit">Add</button>   <br/>
            </form>                
        </div>
    </div>
</body>

</html>