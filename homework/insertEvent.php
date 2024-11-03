<?php

    //a. get the form data from the $_POST into variables
    //1. connect to the database
    //2. create your sql query
    //3. prepare your PDO statement
    //4. bind variables to the PDO statement, if any
    //5. execute the PDO statement - run your sql against the database
    //6. process the response back to the client

    $eventsName = $_POST['events_name'];    //gets the data from the form into a variable
    $eventsDescription = $_POST['events_description'];
    $eventsPresenter = $_POST['events_presenter'];
    $eventsDate = $_POST['events_date'];
    $eventsTime = $_POST['events_time'];

    $today = date_format(date_create(), "Y-m-d");   //creating a formatted date "YYYY-MM-DD"

    $eventsDateInserted = "";       //needs a format like YYYY-MM-DD current date
    $eventsDateUpdated = "";

    try{
        require 'dbConnect.php';    //access to the database

        $sql = "INSERT INTO wdv341_events (events_name, events_description, events_presenter, events_date, events_time, events_date_inserted, events_date_updated) VALUES (:eventsName, :eventsDescription, :eventsPresenter, :eventsDate, :eventsTime, :eventsDateInserted, :eventsDateUpdated)";     //named parameter

        $stmt = $conn->prepare($sql);   //prepared statement PDO - returns statement object

        //bind parameters
        $stmt->bindParam(":eventsName", $eventsName);
        $stmt->bindParam(":eventsDescription", $eventsDescription);
        $stmt->bindParam(":eventsPresenter", $eventsPresenter);
        $stmt->bindParam(":eventsDate", $eventsDate);
        $stmt->bindParam(":eventsTime", $eventsTime);
        $stmt->bindParam(":eventsDateInserted", $today);
        $stmt->bindParam(":eventsDateUpdated", $today);


        $stmt->execute();   //execute the PDO prepared statment, save results in $stmt object

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    //return values as an ASSOC array
    }
    catch(PDOException $e){
        echo "Database Failed" . $e->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Thank you for the data!</h2>
</body>
</html>