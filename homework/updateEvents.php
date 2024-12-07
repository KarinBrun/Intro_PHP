<?php 
session_start();    //gives us access to a session, or starts a new one if needed
if($_SESSION['validSession'] !== "yes"){
    //you are NOT a valid user and CANNOT access this page
    header('Location: login.php');
}

$eventsID = $_GET["eventsID"];

$today = date_format(date_create(), "Y-m-d");

$eventsDateUpdated = "";

try{
    require 'dbConnect.php';    //access to the database

    //$sql = "SELECT events_name, events_description FROM wdv341_events WHERE events_id = 1";

    //pass the desired record id as a parameter
    $sql = "SELECT * FROM wdv341_events WHERE events_id = :eventsID";     //named parameter

    //prepared statement PDO
    $stmt = $conn->prepare($sql);   //prepared statement PDO - returns statement object

    //bind parameters
    $stmt->bindParam(":eventsID", $eventsID);


    $stmt->execute();   //execute the PDO prepared statment, save results in $stmt object

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    //return values as an ASSOC array

    //get the record form the result set/$stmt object
    $eventRecord = $stmt->fetch();

    $eventName = $eventRecord['events_name'];
    $eventDescription = $eventRecord['events_description'];
    $eventPresenter = $eventRecord['events_presenter'];
    $eventDate = $eventRecord['events_date'];
    $eventTime = $eventRecord['events_time'];
}
catch(PDOException $e){
    echo "Database Failed" . $e->getMessage();
}

/*
    -show a form that has the data for every single entry
    -make a copy of a form - eventInputForm
    -get the recID that was passed in the URL
    -pull the record from the database
    -use the database data to populate the fields of the form
    when the form is submitted do an UPDATE on the database record - done on the processEventUpdate.php page
*/

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
    <h2>UPDATE Event Form</h2>
    <form method="post" action="processEventUpdate.php?eventsID=<?php echo $eventsID; ?>">
        
        <p>
            <label for="inEventName">Event Name:</label>
            <input type="text" name="events_name" id="events_name" placeholder="Event Name" value="<?php echo $eventName; ?>">
        </p>

        <p>
            <label for="inEventDesc">Event Description</label>
            <input type="text" name="events_description" id="events_description" value="<?php echo $eventDescription; ?>">
        </p>

        <p>
            <label for="inEventPresenter">Event Presenter:</label>
            <input type="text" name="events_presenter" id="events_presenter" placeholder="Event Presenter" value="<?php echo $eventPresenter; ?>">
        </p>

        <p>
            <label for="inEventDate">Event Date:</label>
            <input type="date" name="events_date" id="events_date" placeholder="Event Date" value="<?php echo $eventDate; ?>">
        </p>

        <p>
            <label for="inEventTime">Event Time:</label>
            <input type="time" name="events_time" id="events_time" placeholder="Event Time" value="<?php echo $eventTime; ?>">
        </p>
        <p>
            <input type="submit" value="Update">
            <input type="reset">
        </p>

    </form>
</body>
</html>