<?php

session_start();    //gives us access to a session, or starts a new one if needed
if($_SESSION['validSession'] !== "yes"){
    //you are NOT a valid user and CANNOT access this page
    header('Location: login.php');
}

    /*
        this page is called by the updateEvent.php page
        passing form data to this page
        this page will take the form data and UPDATE the record on the database

        need SQL UPDATE command

        confirmation page or this being the confirmation page after the UPDATE has processed
    */

$eventsName = $_POST['events_name'];    //gets the data from the form into a variable
$eventsDescription = $_POST['events_description'];
$eventsPresenter = $_POST['events_presenter'];
$eventsDate = $_POST['events_date'];
$eventsTime = $_POST['events_time'];

$eventsID = $_GET["eventsID"];

$today = date_format(date_create(), "Y-m-d");   //creating a formatted date "YYYY-MM-DD"

$eventsDateUpdated = "";

try{
    require 'dbConnect.php';    //access to the database

    $sql = "UPDATE wdv341_events SET events_name = :eventsName, events_description = :eventsDescription, events_presenter = :eventsPresenter, events_date = :eventsDate, events_time = :eventsTime, events_date_updated = :eventsDateUpdated WHERE events_id = :eventsID";

    $stmt = $conn->prepare($sql);   //prepared statement PDO - returns statement object

    //bind parameters
    $stmt->bindParam(":eventsName", $eventsName);
    $stmt->bindParam(":eventsDescription", $eventsDescription);
    $stmt->bindParam(":eventsPresenter", $eventsPresenter);
    $stmt->bindParam(":eventsDate", $eventsDate);
    $stmt->bindParam(":eventsTime", $eventsTime);
    $stmt->bindParam(":eventsDateUpdated", $today);
    $stmt->bindParam(":eventsID", $eventsID);


    $stmt->execute();   //execute the PDO prepared statment, save results in $stmt object

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    //return values as an ASSOC array
}
catch(PDOException $e){
    echo "Database Failed" . $e->getMessage();
}

header('Location: selectEvents.php');

?>