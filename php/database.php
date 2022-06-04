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



include_once("config.php");
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


    //This function also sets session variable for login if successful
    public function verifyLogin($username, $password)
    {
        $query = "SELECT Password FROM login_credentials WHERE Username='$username'";
        $result = $GLOBALS["connection"]->query($query);
        //echo $GLOBALS["connection"]->error;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $flag = $password == $row["Password"];
            if ($flag) {
                session_start();
                $_SESSION["loggedIn"] = true;
                $_SESSION["page"] = "";
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


    //Returns a list all events, all attributes - you can use this as an example for how to return data using the API
    public function getEvents()
    {
        $query = "SELECT * FROM swimming_events ORDER BY Stroke_Name, Distance, Gender;";
        $result = $GLOBALS["connection"]->query($query);
        //echo $GLOBALS["connection"]->error;
        if ($result->num_rows > 0) {
            $returnArr = [];
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $returnArr[$counter]["id"] = $row["Stroke_ID"];
                $returnArr[$counter]["name"] = $row["Stroke_Name"];
                $returnArr[$counter]["dist"] = $row["Distance"];
                $returnArr[$counter]["gender"] = $row["Gender"];
                $counter++;
            }
            $temp = $this->createJSONResponse("success", $returnArr);
            return $temp;
        } else {
            $temp = $this->createJSONResponse("failure", null);
            return $temp;
        }
    }

    public function getTopPerEvent($eventId)
    {
        $query = "SELECT s.first_Name AS first, s.last_Name AS last, i.Time AS time, e.Gender AS gender 
        FROM swimmers AS s 
        INNER JOIN individual_stroke_event_stats AS i 
        ON s.Swimmer_ID = i.Swimmer_ID 
        INNER JOIN tournament_event_phases AS t 
        ON i.Event_Phase_ID = t.Tourn_Event_Phase_ID 
        INNER JOIN swimming_events AS e 
        ON t.Stroke_Event_ID = e.Stroke_ID 
        WHERE e.Stroke_ID = $eventId
        ORDER BY i.Time;";

        $result = $GLOBALS["connection"]->query($query);
        //echo $GLOBALS["connection"]->error;
        if ($result->num_rows > 0) {
            $returnArr = [];
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $returnArr[$counter]["name"] = $row["first"] . " " . $row["last"];
                $returnArr[$counter]["time"] = $row["time"];
                $returnArr[$counter]["gender"] = $row["gender"];
                $counter++;
                if ($counter == 5) {
                    break;
                }
            }
            $temp = $this->createJSONResponse("success", $returnArr);
            return $temp;
        } else {
            $temp = $this->createJSONResponse("failure", null);
            return $temp;
        }
    }

    //Returns all swimmers who are currently active in the database
    public function getAllSwimmers()
    {
        $query = "SELECT Swimmer_ID, id_Num, first_Name, middle_Name, last_Name
                  FROM swimmers
                  WHERE Active = true
                  ORDER BY last_Name, first_Name;";
        $result = $GLOBALS["connection"]->query($query);
        if ($result->num_rows > 0) {
            $returnArr = [];
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $returnArr[$counter]["swimmer_id"] = $row["Swimmer_ID"];
                $returnArr[$counter]["name"] = $row["first_Name"] . " " . $row["last_Name"];
                $returnArr[$counter]["id"] = $row["id_Num"];
                $counter++;
            }
            return $this->createJSONResponse("success", $returnArr);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Returns swimmer details by id
    public function getSwimmerDetails($id)
    {
        $query = "SELECT id_Num, first_Name, middle_Name, last_Name, birth_date
                  FROM swimmers, persons
                  WHERE Swimmer_ID = $id AND swimmers.Person_Id = persons.id;";
        $result = $GLOBALS["connection"]->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $returnArr = [];
            $returnArr[0]["first"] = $row["first_Name"];
            $returnArr[0]["mid"] = $row["middle_Name"];
            $returnArr[0]["last"] = $row["last_Name"];
            $returnArr[0]["id"] = $row["id_Num"];
            $returnArr[0]["dob"] = $row["birth_date"];

            return $this->createJSONResponse("success", $returnArr);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Sets swimmer to inactive
    public function deleteSwimmer($id)
    {
        $query = "UPDATE swimmers
                  SET Active = false
                  WHERE Swimmer_ID = $id;";

        if ($GLOBALS["connection"]->query($query) === true) {
            return $this->createJSONResponse("success", null);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Adds a swimmer to the database
    public function addSwimmer($first, $mid, $last, $id, $dob)
    {
        $personKey = "swimmer.stats.com-p." . rand(100, 10000);

        $query = "INSERT into persons
                  (person_key, publisher_id, birth_date)
                  VALUES('$personKey', 1, '$dob');";

        if ($GLOBALS["connection"]->query($query) === true) {

            $personId = $GLOBALS["connection"]->insert_id;

            if ($mid == "")
                $query = "INSERT into swimmers
                        (Person_Id, first_Name, last_Name, id_Num)
                        VALUES($personId, '$first', '$last', $id)";
            else
                $query = "INSERT into swimmers
                        (Person_Id, first_Name, middle_Name, last_Name, id_Num)
                        VALUES($personId, '$first', '$mid', '$last', $id)";

            if ($GLOBALS["connection"]->query($query) === true) {
                return $this->createJSONResponse("success", null);
            } else {
                return $this->createJSONResponse("failure", null);
            }
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Updates swimmer details
    public function updateSwimmer($first, $mid, $last, $id, $swimmerId, $dob)
    {
        if ($mid == "")
            $query = "UPDATE swimmers
                      SET first_Name = '$first', middle_Name = NULL, last_Name = '$last', id_Num = '$id'
                      WHERE Swimmer_ID = $swimmerId;";
        else
            $query = "UPDATE swimmers
                      SET first_Name = '$first', middle_Name = '$mid', last_Name = '$last', id_Num = '$id'
                      WHERE Swimmer_ID = $swimmerId;";

        if ($GLOBALS["connection"]->query($query) === true) {
            $query = "SELECT Person_Id
                      FROM swimmers
                      WHERE Swimmer_ID = $swimmerId;";

            $result = $GLOBALS["connection"]->query($query);
            if ($result->num_rows > 0) {
                $personId = $result->fetch_assoc()["Person_Id"];

                $query = "UPDATE persons
                      SET birth_date = '$dob'
                      WHERE id = $personId;";

                if ($GLOBALS["connection"]->query($query) === true)
                    return $this->createJSONResponse("success", null);
                else
                    return $this->createJSONResponse("failure", null);
            } else {
                return $this->createJSONResponse("failure", null);
            }
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Returns all tournaments
    public function getAllTournaments()
    {
        $query = "SELECT Tournament_Id, Name
                  FROM tournament
                  ORDER BY Name;";
        $result = $GLOBALS["connection"]->query($query);
        if ($result->num_rows > 0) {
            $returnArr = [];
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $returnArr[$counter]["tournament_id"] = $row["Tournament_Id"];
                $returnArr[$counter]["name"] = $row["Name"];
                $counter++;
            }
            return $this->createJSONResponse("success", $returnArr);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Adds a location to the database
    public function addLocation($timezone, $latitude, $longitude, $country_code, $location)
    {

        $query = "INSERT INTO `locations`(`timezone`, `latitude`, `longitude`, `country_code`) 
                VALUES (' " . $timezone . " ',' " . $latitude . " ',' " . $longitude . " ',' " . $country_code . "');";

        if ($GLOBALS["connection"]->query($query) === true) {

            $id = $GLOBALS["connection"]->insert_id;

            $query = "INSERT INTO `swimming_locations`(`Tournament_ID`, `Tournament_Location`) 
                VALUES (' " . $id . " ',' " . $location . "');";

            if ($GLOBALS["connection"]->query($query) === true) {
                return $this->createJSONResponse("success", null);
            } else {
                return $this->createJSONResponse("failure", null);
            }
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Updates a location in the database
    public function updateLocation($timezone, $latitude, $longitude, $country_code, $location, $id)
    {
        $query = "UPDATE `swimming_locations` 
                    SET `Tournament_Location`= '$location'
                    WHERE Tournament_ID = $id;";

        if ($GLOBALS["connection"]->query($query) === true) {

            $query = "UPDATE `locations` 
                    SET `timezone`= '$timezone' ,`latitude`= '$latitude' ,`longitude`= '$longitude' ,`country_code`= '$country_code' 
                    WHERE id = $id;";

            if ($GLOBALS["connection"]->query($query) === true) {
                return $this->createJSONResponse("success", null);
            } else {
                return $this->createJSONResponse("failure", null);
            }
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Returns all locations
    public function getAllLocations()
    {
        $query = "SELECT Tournament_ID , `Tournament_Location`
                  FROM swimming_locations
                  ORDER BY Tournament_Location;";

        $result = $GLOBALS["connection"]->query($query);
        if ($result->num_rows > 0) {
            $returnArr = [];
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $returnArr[$counter]["location_id"] = $row["Tournament_ID"];
                $returnArr[$counter]["location_name"] = $row["Tournament_Location"];
                $counter++;
            }
            return $this->createJSONResponse("success", $returnArr);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Returns location details by id
    public function getLocationDetails($id)
    {
        $query = "SELECT `timezone`, `latitude`, `longitude`, `country_code`, `Tournament_Location`
                  FROM locations, swimming_locations
                  WHERE id = " . $id . " AND locations.id = swimming_locations.Tournament_ID;";

        $result = $GLOBALS["connection"]->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $returnArr = [];
            $returnArr[0]["timezone"] = $row["timezone"];
            $returnArr[0]["latitude"] = $row["latitude"];
            $returnArr[0]["longitude"] = $row["longitude"];
            $returnArr[0]["country_code"] = $row["country_code"];
            $returnArr[0]["Tournament_Location"] = $row["Tournament_Location"];

            return $this->createJSONResponse("success", $returnArr);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Uploads media to the database
    public function uploadMedia($id, $file)
    {
        //$path = "../media/" . $file;
        //$path = "../media/" . "Black.jpeg";
        //echo $path;
        //$image = file_get_contents($path);
        //return $this->createJSONResponse( $image, null);
        //echo $image;
        //return $this->createJSONResponse("didnotcrash", null);
        //header('Content-Type: image/jpeg');
        //$image = readfile($path);

        $query = "INSERT INTO `swimmer_media`(`Swimmer_ID`, `Picture`) 
                    VALUES ('$id', '$file');";

        if ($GLOBALS["connection"]->query($query) === true) {

            return $this->createJSONResponse("success", null);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    public function getSwimmersPB($swimmerId)
    {
        $query = "SELECT personal_best_individual.Time, swimming_events.Stroke_Name, swimming_events.Distance
        FROM personal_best_individual, swimming_events
        WHERE personal_best_individual.Swimmer_ID=" . $swimmerId . " AND personal_best_individual.StrokePB_ID=swimming_events.Stroke_ID;";
        $result = $GLOBALS["connection"]->query($query);
        if ($result->num_rows > 0) {
            $returnArr = [];
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $returnArr[$counter]["Time"] = $row["Time"];
                $returnArr[$counter]["Stroke_Name"] = $row["Stroke_Name"];
                $returnArr[$counter]["Distance"] = $row["Distance"];
                $counter++;
            }
            return $this->createJSONResponse("success", $returnArr);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    public function getSwimmerEvents($swimmerId)
    {

        $query = "SELECT individual_stroke_event_stats.Time, swimming_events.Stroke_Name , tournament.Name, tournament_event_phases.Classification, swimming_events.Distance
        FROM swimming_events,tournament, individual_stroke_event_stats INNER JOIN tournament_event_phases ON individual_stroke_event_stats.Event_Phase_ID =tournament_event_phases.Tourn_Event_Phase_ID
        WHERE tournament.Tournament_ID= tournament_event_phases.Tournament_ID AND individual_stroke_event_stats.Swimmer_ID=" . $swimmerId . " AND tournament_event_phases.Stroke_Event_ID=swimming_events.Stroke_ID;";
        $result = $GLOBALS["connection"]->query($query);
        if ($result->num_rows > 0) {
            $returnArr = [];
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                $returnArr[$counter]["Classification"] = $row["Classification"];
                $returnArr[$counter]["Name"] = $row["Name"];
                $returnArr[$counter]["Time"] = $row["Time"];
                $returnArr[$counter]["Stroke_Name"] = $row["Stroke_Name"];
                $returnArr[$counter]["Distance"] = $row["Distance"];
                $counter++;
            }
            return $this->createJSONResponse("success", $returnArr);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    public function getTournamentEvents($tournamentId)
    {

        $query = "SELECT swimming_events.Stroke_Name, swimming_events.Distance,  tournament_event_phases.Date, tournament_event_phases.Classification , swimmers.first_Name,swimmers.middle_Name,swimmers.last_Name,MIN(individual_stroke_event_stats.Time) AS Time
        FROM swimming_events,individual_stroke_event_stats, swimmers, tournament INNER JOIN tournament_event_phases ON tournament.Tournament_ID =tournament_event_phases.Tournament_ID
        WHERE tournament.Tournament_ID=" . $tournamentId . " AND individual_stroke_event_stats.Event_Phase_ID=tournament_event_phases.Tourn_Event_Phase_ID AND swimming_events.Stroke_ID=tournament_event_phases.Stroke_Event_ID AND individual_stroke_event_stats.Swimmer_ID=swimmers.Swimmer_ID
        GROUP BY individual_stroke_event_stats.Event_Phase_ID
        ORDER BY individual_stroke_event_stats.Time";
        $result = $GLOBALS["connection"]->query($query);
        if ($result->num_rows > 0) {
            $returnArr = [];
            $counter = 0;
            while ($row = $result->fetch_assoc()) {
                if (isset($row["middle_Name"])) {
                    $returnArr[$counter]["Name"] = $row["first_Name"] . " " . $row["middle_Name"] . " " . $row["last_Name"];
                } else {
                    $returnArr[$counter]["Name"] = $row["first_Name"] . " " . $row["last_Name"];
                }
                $returnArr[$counter]["Date"] = $row["Date"];
                $returnArr[$counter]["Classification"] = $row["Classification"];
                $returnArr[$counter]["Distance"] = $row["Distance"];
                $returnArr[$counter]["Time"] = $row["Time"];
                $returnArr[$counter]["Stroke_Name"] = $row["Stroke_Name"];
                $counter++;
            }
            return $this->createJSONResponse("success", $returnArr);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    // Returns tournament details for a specific id
    public function getTournamentDetails($id)
    {
        $query = "SELECT Name, Start_Date, End_Date
                  FROM tournament
                  WHERE Tournament_ID = $id;";

        $result = $GLOBALS["connection"]->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $returnArr = [];
            $returnArr[0]["name"] = $row["Name"];
            $returnArr[0]["start"] = $row["Start_Date"];
            $returnArr[0]["end"] = $row["End_Date"];

            return $this->createJSONResponse("success", $returnArr);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    //Updates a given tournament
    public function updateTournament($id, $name, $start, $end)
    {
        $query = "UPDATE tournament
                  SET Name = '$name', Start_Date = '$start', End_Date = '$end'
                  WHERE Tournament_ID = $id;";

        if ($GLOBALS["connection"]->query($query) === true) {
            return $this->createJSONResponse("success", null);
        } else {
            return $this->createJSONResponse("failure", null);
        }
    }

    public function addTournament($name, $start, $end)
    {
        $query = "INSERT into tournament
                  (Name, Start_Date, End_Date)
                  VALUES('$name', '$start', '$end')";

        if ($GLOBALS["connection"]->query($query) === true) {
            return $this->createJSONResponse("success", null);
        } else {
            return $this->createJSONResponse("failure", null);
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
        } else if ($status == "success") {
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
        } else if ($function == "getEvents") {
            $temp = $this->getEvents();
            echo $temp;
        } else if ($function == "getTopForEvent") {
            $temp = $this->getTopPerEvent($params["eventId"]);
            echo $temp;
        } else if ($function == "getAllSwimmers") {
            $temp = $this->getAllSwimmers();
            echo $temp;
        } else if ($function == "getSwimmerDetails") {
            $temp = $this->getSwimmerDetails($params["swimmerId"]);
            echo $temp;
        } else if ($function == "deleteSwimmer") {
            $temp = $this->deleteSwimmer($params["swimmerId"]);
            echo $temp;
        } else if ($function == "addSwimmer") {
            $temp = $this->addSwimmer($params["first"], $params["mid"], $params["last"], $params["id"], $params["dob"]);
            echo $temp;
        } else if ($function == "updateSwimmer") {
            $temp = $this->updateSwimmer($params["first"], $params["mid"], $params["last"], $params["id"], $params["swimmerId"], $params["dob"]);
            echo $temp;
        } else if ($function == "getAllTournaments") {
            $temp = $this->getAllTournaments();
            echo $temp;
        } else if ($function == "addLocation") {
            $temp = $this->addLocation($params["timezone"], $params["latitude"], $params["longitude"], $params["country_code"], $params["location_name"]);
            echo $temp;
        } else if ($function == "updateLocation") {
            $temp = $this->updateLocation($params["timezone"], $params["latitude"], $params["longitude"], $params["country_code"], $params["location_name"], $params["id"]);
            echo $temp;
        } else if ($function == "getAllLocations") {
            $temp = $this->getAllLocations();
            echo $temp;
        } else if ($function == "getLocationDetails") {
            $temp = $this->getLocationDetails($params["locationId"]);
            echo $temp;
        } else if ($function == "uploadMedia") {
            $temp = $this->uploadMedia($params["id"], $params["image"]);
            echo $temp;
        } else if ($function == "getSwimmerPB") {
            $temp = $this->getSwimmersPB($params["swimmerId"]);
            echo $temp;
        } else if ($function == "getSwimmerEvents") {
            $temp = $this->getSwimmerEvents($params["swimmerId"]);
            echo $temp;
        } else if ($function == "getTournamentEvents") {
            $temp = $this->getTournamentEvents($params["tournamentId"]);
            echo $temp;
        } else if ($function == "getTournamentDetails") {
            $temp = $this->getTournamentDetails($params["tournamentId"]);
            echo $temp;
        } else if ($function == "updateTournament") {
            $temp = $this->updateTournament($params["tournamentId"], $params["name"], $params["start"], $params["end"]);
            echo $temp;
        } else if ($function == "addTournament") {
            $temp = $this->addTournament($params["name"], $params["start"], $params["end"]);
            echo $temp;
        } else {
            echo json_encode(["status" => "invalid function", "timestamp" => time(), "data" => null]);
        }
    }
}

DBConnection::instance()->processRequest();
