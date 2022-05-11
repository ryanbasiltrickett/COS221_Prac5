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


    //write functions to query the database and return whatever data here
}
