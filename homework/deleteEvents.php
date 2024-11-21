<?php 

session_start();    //gives us access to a session, or starts a new one if needed
if($_SESSION['validSession'] !== "yes"){
    //you are NOT a valid user and CANNOT access this page
    header('Location: login.php');
}

//this page will delete a single event from the events table using the events_id value
//no confirmation is required
//it will return to selectEvents.php to display the updated events list

//how to get the GET parameter into this page

$eventsID = $_GET["eventsID"];      //get the value of the GET parameter into this page



//To connect to the database the following steps:

//1. connect to the database
//2. create your sql query
//3. prepare your PDO statement
//4. bind variables to the PDO statement, if any
//5. execute the PDO statement - run your sql against the database
//6. process the results from the query

try{
    require 'dbConnect.php';    //access to the database

    $sql = "DELETE FROM wdv341_events WHERE events_id = :eventsID";

    //prepared statement PDO
    $stmt = $conn->prepare($sql);   //prepared statement PDO - returns statement object

    //bind parameters
    $stmt->bindParam(":eventsID", $eventsID);

    $stmt->execute();   //execute the PDO prepared statment, save results in $stmt object

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    //return values as an ASSOC array
}
catch(PDOException $e){
    echo "Database Failed" . $e->getMessage();
}

//return to selectEvents.php to display the update list of events
header('Location: selectEvents.php');

?>