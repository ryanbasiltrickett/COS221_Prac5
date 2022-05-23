<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage swimmers</title>
    <link rel="stylesheet" href="./css/manageswimmers.css" />
</head>



<body>

    <div class="deleteSwimmer-image">
        <?php
        $_SESSION["page"] = "manageswimmers";
        require_once("php/header.php");
        ?>
    </div>

    <div class="credentials">
            <h1>Delete swimmers</h1>
            <h3>Enter the details of the swimmer to be deleted</h3>

            <div class="container">
                <form method='POST' action='validate-add.php'>  
                    <label>ID Number: </label> <br/>
                    <input type="text" placeholder="Enter Swimmer ID Number" name="id" required>  <br/>
                    <button onclick="deleteSwimmer()" type="submit">Delete</button>   <br/>
                </form>                
            </div>
              
        </div>

</body>

</html>