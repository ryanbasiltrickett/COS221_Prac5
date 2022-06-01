<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage swimmers</title>
    <link rel="stylesheet" href="./css/manageswimmers.css" />
    <script src="js/manageswimmers.js"></script>
</head>

<div class="addSwimmer-image">
    <?php
        session_start();
        $_SESSION["page"] = "addswimmers";
        require_once("php/header.php");
    ?>   
</div>

<body>
    <div class="credentials">
        <h1>Add Swimmers</h1>
        <h3>Enter the new swimmers details</h3>

        <div class="container">
            <form>
                <label>First Name: </label>   <br/>
                <input type="text" placeholder="Enter Swimmer First Name" name="fname" required id="fname"> <br/>
                <label>Middle Name: </label>   <br/>
                <input type="text" placeholder="Enter Swimmer Middle Name" name="mname" id="mname"> <br/>
                <label>Last Name: </label>   <br/>
                <input type="text" placeholder="Enter Swimmer Last Name" name="lname" required id="lname"> <br/>
                <label>ID Number: </label> <br/>
                <input type="text" placeholder="Enter Swimmer ID Number" name="id" required id="id">  <br/>
                <label>Country: </label>   <br/>
                <input type="text" placeholder="Enter Country Of Swimmer " name="country" id="country"> <br/>
                <label>Date of Birth: </label>   <br/>
                <input type="date" id="date" placeholder="dd-mm-yyyy" min="1973-01-01" max="2003-12-31" name="date"> <br/>
                <button onclick="addSwimmer()" type="submit">Update</button>   <br/>
            </form>                  
        </div>
    </div>
</body>

</html>