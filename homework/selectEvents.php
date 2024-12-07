<?php

    //To connect to the database the following steps:

    //1. connect to the database
    //2. create your sql query
    //3. prepare your PDO statement
    //4. bind variables to the PDO statement, if any
    //5. execute the PDO statement - run your sql against the database
    //6. process the results from the query

    try{
        require 'dbConnect.php';    //access to the database

        $sql = "SELECT events_id, events_name, events_description FROM wdv341_events";

        //prepared statement PDO
        $stmt = $conn->prepare($sql);   //prepared statement PDO - returns statement object

        //bind parameters - n/a

        $stmt->execute();   //execute the PDO prepared statment, save results in $stmt object

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    //return values as an ASSOC array
    }
    catch(PDOException $e){
        echo "Database Failed" . $e->getMessage();
    }

    //$user = $stmt->fetch();     //return the first row of the result - ASSOC array

    //echo "<p>" . $user["events_name"] . "</p>";
    //echo "<p>" . $user["events_description"] . "</p>";
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table,td{
        border: thin solid black;
    }
</style>
<script>
    function confirmDelete(inEventsID){
        //alert("inside confirmDelete() need to know the events_id" + inEventsID);
        //display a modal asking Delete this Record Y or N
        let confirmCode = confirm("To 'DELETE' this event, click 'OK'. If you delete this event you cannot recover it.")
        //if the response is Y send the eventsID to the deleteEvents.php page to be deleted
        //if N nothing
        if(confirmCode){
            //True - delete record
            //alert("Delete record");
            //?
            window.location.href="deleteEvents.php?eventsID=" + inEventsID;
        }
        else{
            //false - do not delete
            //alert("Save record");
        }
    }
</script>
<body>
    <h1>wdv341 Intro PHP</h1>
    <h2>Assignment 7-1 selectEvents.php</h2>
    <table>
        <tr>
            <th>Event Name</th>
            <th>Event Description</th>
        </tr>
        <?php
            //put the loop that processes the database result and outputs the content as an HTML table

            //we need to pass the events_id for each row to the deleteEvents.php process

            while($eventRow = $stmt->fetch()){
                echo "<tr>";
                echo "<td>" . $eventRow["events_name"] . "</td>";
                echo "<td>" . $eventRow["events_description"] . "</td>";
                //echo "<td><a href='deleteEvents.php?eventsID=" . $eventRow['events_id'] . "'><button>Delete</button></a></td>";
                echo "<td><a href='updateEvents.php?eventsID=" . $eventRow['events_id'] . "'><button>Update</button></a></td>";
                echo "<td><button onclick='confirmDelete(" . $eventRow['events_id'] . ")'>Delete</button></td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>