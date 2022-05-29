<?php
//I have implemented a singleton for the database connection for consistent interface and to make sure max 1 connection
//Write any functions that need to query the database as members of this class
//Include this php file in any php page that needs to access database in some way
//Use the instance() function to retrieve the current class instance
//Connecting and disconnecting from the DB is all handled here automatically with constructor and destructor so no need
//to ever manually connect or disconnect, simply call the function you need to call :)
//You can access your sensitive data via the globals defined in config.php
//never ever ever ever ever declare your password anywhere other than in config.php and do not ever push config.php to github
//However, make sure that config.php is in the same directory as this file orderwise the include_once won't work



include_once("./config.php");
$GLOBALS["connection"] = null; //this is a global DB connection object, always connect to the DB via this variable
class DBConnection
{
    public static function instance()
    {
        static $instance = null;
        if ($instance == null) {
            return new DBConnection();
        } else {
            return $instance;
        }
    }


    public function __construct()
    {
        $GLOBALS["connection"] = new mysqli($GLOBALS["host"], $GLOBALS["username"], $GLOBALS["password"]);
        if ($GLOBALS["connection"]->connect_error) {
            die("Error connecting to the database: " + $GLOBALS["connection"]->connect_error);
        } else {
            $GLOBALS["connection"]->select_db($GLOBALS["databaseName"]);
        }
    }


    public function __destruct()
    {
        $GLOBALS["connection"]->close();
    }



    //You can use these functions as examples as how to query the DB and format a response

    //Please note the following conventions:
    //  If you do not need to return data to the front end, simply indicate if the response has a status success or failure
    //  If you must return data, use the 'data' attribute in the json response


    public function verifyLogin($username, $password)
    {
        $query = "SELECT Password FROM login_credentials WHERE Username='$username'";
        $result = $GLOBALS["connection"]->query($query);
        //echo $GLOBALS["connection"]->error;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $flag = $password == $row["Password"];
            if ($flag) {
                $temp = $this->createJSONResponse("success", null);
                return $temp;
            } else {
                $temp = $this->createJSONResponse("failure", null);
                return $temp;
            }
        } else {
            $temp = $this->createJSONResponse("failure", null);
            return $temp;
        }
    }

    //You can use these functions as examples as how to query the DB and format a response
    public function registerUser($username, $password)
    {
        $query = "INSERT INTO login_credentials (Username, Password)";
        $query = $query . 'VALUES ("' . $username . '", "' . $password . '")';

        $success = $GLOBALS["connection"]->query($query);
        if ($success) {
            $temp = $this->createJSONResponse("success", null);
            return $temp;
        } else {
            $temp = $this->createJSONResponse("failure", null);
            return $temp;
        }
    }




    // You can use this function to turn your data into a JSON response fit for the front end, I think (but really hope) it works
    //assocArr is an array of associative arrays, so for example assocArr[5]["name"] should return the 'name' attribute of the 6th item
    //You can then return the result of this function
    //For error checking purposes, you can also specify if a request was a failure or success, the client can use the status attribute to decide how to display the data
    public function createJSONResponse($status, $assocArr)
    {
        if ($status == "failure") {
            $returnJSON = json_encode(["status" => "failure", "timestamp" => time(), "data" => null]);
            return $returnJSON;
        } else if ($status = "success") {
            $returnJSON = json_encode(["status" => "success", "timestamp" => time(), "data" => $assocArr]);
            return $returnJSON;
        } else {
            return null;
        }
    }


    //function receives json request, translates it, then calls the appropriate function using params from json object
    //the json returned by the individual functions is echo-ed as the response
    public function processRequest()
    {
        $jsonParam = file_get_contents('php://input');
        $params = json_decode($jsonParam, true);

        $function = $params["function"];
        if ($function == "login") {
            $temp = $this->verifyLogin($params["username"], $params["password"]);
            echo $temp;
        } else if ($function == "register") {
            $temp = $this->registerUser($params["username"], $params["password"]);
            echo $temp;
        } else {
            echo json_encode(["status" => "invalid function", "timestamp" => time(), "data" => null]);
        }
    }
}

DBConnection::instance()->processRequest();
