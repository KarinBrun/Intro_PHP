<?php

    //  Assignment 7-2 Select one event from the table. Uses the WHERE filter in SQL

    //To connect to the database the following steps:

    //1. connect to the database
    //2. create your sql query
    //3. prepare your PDO statement
    //4. bind variables to the PDO statement, if any
    //5. execute the PDO statement - run your sql against the database
    //6. process the results from the query

    try{
        require 'dbConnect.php';    //access to the database

        $sql = "SELECT events_name, events_description FROM wdv341_events WHERE events_id = 1";

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
<body>
    <h1>wdv341 Intro PHP</h1>
    <h2>Assignment 7-2 selectOneEvent.php</h2>
    <table>
        <tr>
            <th>Event Name</th>
            <th>Event Description</th>
        </tr>
        <?php
            //put the loop that processes the database result and outputs the content as an HTML table
            while($eventRow = $stmt->fetch()){
                echo "<tr>";
                echo "<td>" . $eventRow["events_name"] . "</td>";
                echo "<p>" . $eventRow["events_description"] . "</p>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>