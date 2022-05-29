<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SwimStat</title>
  <link rel="stylesheet" href="./css/login.css" />
</head>

<body id="BodyArea">

  <div class="login-image">

  </div>

  <div class="credentials">
    <h1>Login</h1>
    <h3>Enter your login details</h3>

    <div class="container">
      <div' id="loginDetails">
        <label>Username: </label> <br />
        <input type="text" placeholder="Enter Username" id="username" name="username" required> <br /> <br />
        <label>Password: </label> <br />
        <input type="password" placeholder="Enter Password" id="password" name="password" required> <br />
        <button onclick="validateLogin()">Login</button> <br />
    </div>
    <p id="errorArea"></p>
    <button id="registerButton">Register an account</button>

  </div>

  </div>
  <script src="./js/validateLogin.js"></script>






</body>

</html>