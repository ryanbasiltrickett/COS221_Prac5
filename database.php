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


//This file effectively acts as the API. It needs to return the data from the database in a JSON format so that it can be used 
//populate the web pages 
include_once("/config.php");
$GLOBALS["connection"] = null; //this is a global DB connection object, always connect ot the DB via this variable
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


    //write functions to query the database and return whatever data here
}
