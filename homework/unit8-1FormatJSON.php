<?php
    //this application will access the WDV341 database to get the events data
    //it will create an Event object using the Event class
    //it will load the events data into that object
    //format the Event object into a JSON format
    //echo the object back to the client

    //1. connect to the database
    //2. create your sql query
    //3. prepare your PDO statement
    //4. bind variables to the PDO statement, if any
    //5. execute the PDO statement - run your sql against the database
    //6. process the results from the query

    try{
        require 'dbConnect.php';    //access to the database

        $sql = "SELECT events_id, events_name, events_description, events_presenter, events_date, events_time, events_date_inserted, events_date_updated FROM wdv341_events";

        //prepared statement PDO
        $stmt = $conn->prepare($sql);   //prepared statement PDO - returns statement object

        //bind parameters - n/a

        $stmt->execute();   //execute the PDO prepared statment, save results in $stmt object

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    //return values as an ASSOC array
    }
    catch(PDOException $e){
        echo "Database Failed" . $e->getMessage();
    }

    require "Event.php";        //gets access to Event class

    $eventArray = [];       //array to store event objects

    while($eventRow = $stmt->fetch()){
        $eventObject = new Event();

        $eventObject->setEventsID($eventRow["events_id"]);
        $eventObject->setEventsName($eventRow["events_name"]);
        $eventObject->setEventsDescription($eventRow["events_description"]);
        $eventObject->setEventsPresenter($eventRow["events_presenter"]);
        $eventObject->setEventsDate($eventRow["events_date"]);
        $eventObject->setEventsTime($eventRow["events_time"]);
        $eventObject->setEventsDateInserted($eventRow["events_date_inserted"]);
        $eventObject->setEventsDateUpdated($eventRow["events_date_updated"]);

        //add the object to an array
        array_push($eventArray, $eventObject);
    }

    //$eventObject = new Event(); //create an Event object
    //fetch an event from the result
    //get each column of data and set it into the eventObject

    //fetch one event from the result
    //$eventRow = $stmt->fetch();     //this will pull one row from the result set

    //$eventObject->setEventsID($eventRow["events_id"]);
    //$eventObject->setEventsName($eventRow["events_name"]);
    //$eventObject->setEventsDescription($eventRow["events_description"]);
    //$eventObject->setEventsPresenter($eventRow["events_presenter"]);

    //echo "<p>Events ID: " . $eventObject->getEventsID();
    //echo "<p>Events Name: " . $eventObject->getEventsName();
    //echo "<p>Events Description: " . $eventObject->getEventsDescription();
    //echo "<p>Events Presenter: " . $eventObject->getEventsPresenter();

    //convert $eventObject into a JSON object $eventObjectJSON

    echo json_encode($eventArray);

    //echo json_encode($eventObject);     //send the JSON object to the response
    //echo "<br>";
    //echo $eventObject;    //cannot read a PHP object, so errors

?>