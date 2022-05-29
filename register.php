<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/register.css" />
</head>

<body>
    <div id="Banner">
        <h1 id="mainHeading">Register</h1>
        <h3 id="subtitle">Register a SwimStat account below</h3>
    </div>


    <div>
        Username:<input type="text" id="username" required><br>
        Password:<input type="password" id="password" required><br>
        Confirm password:<input type="password" id="confirm" required><br>
        <button onclick="registerUser()">Register</button>
    </div>
    <p id="errorArea"></p>


    <script src="./js/register.js"></script>
    This page needs to capture data to create a new user account, after successful registration redirect to the index page so they can login and use the site
</body>

</html>