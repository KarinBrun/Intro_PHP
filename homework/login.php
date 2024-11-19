<?php

//$errorMsg = "";       //option 1 - define a global variable

session_start();
if(isset($_SESSION['validSession']) && $_SESSION['validSession'] === "yes"){
    //if you are a 'validSession' then you should see the Admin page
    //  you do not need to sign on again. we will keep you signed on
    $validUser = true;      //set flag for valid user to display the Admin page
}
else{
    //you need to sign on
    $validUser = false;
    //check if the form was submitted or needs displayed to the customer
    if(isset($_POST["submit"])){
        //the form was submitted continue processing the form data
        /*
            - get the data from the form
            connect to the database
            see if you have a matching record in the users table
            if (match = true){
                valid user
                display Admin page
            }
            else{
                invalid user
                display error message
                display form
            }
        */
        //get the data from the form
        $inUsername = $_POST['inUsername'];   //pull the username from the login form
        $inPassword = $_POST['inPassword'];   //pull the password from the login form

        //connect to the database
        try{
            require 'dbConnect.php';    //access to the database

            //does the input username and password match the username and password in the database?
            $sql = "SELECT COUNT(*) FROM wdv341_users WHERE user_username = :username AND user_password = :password";

            $stmt = $conn->prepare($sql);   //prepared statement PDO - returns statement object

            //bind parameters
            $stmt->bindParam(":username", $inUsername);
            $stmt->bindParam(":password", $inPassword);

            $stmt->execute();   //execute the PDO prepared statment, save results in $stmt object

            $rowCount = $stmt->fetchColumn();   //get number of rows in result set/statement

            //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);    //return values as an ASSOC array

            if ($rowCount > 0){
                //echo "<h3>Login successful</h3>";
                $validUser = true;              //switch aka flag
                $_SESSION['validSession'] = "yes";  //valid user with access to Admin pages
            }
            else{
                //echo "<h3>Invalid username or password</h3>";
                $validUser = false;
                $errorMsg = "Invalid username/password. Please try again";
                $_SESSION['validSession'] = "no";   //invalid user - do NOT allow access
            }
        }
        catch(PDOException $e){
            echo "Database Failed" . $e->getMessage();
        }
    }
    else{
        //the customer needs to see the form in order to fill it out and SUBMIT it for signon
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .errorMessage {
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>Login Example Page</h2>

    <?php 
        if(isset($_POST['submit'])&& $validUser === true){
            //display ADMIN
    ?>
            <section class="adminPage">
                <!-- this section will display to a VALID user once they login -->
                <h2>Admin Page</h2>
                <h3>Choose Your Option:</h3>
                <ol>
                    <li><a href="eventInputForm.html">Add new event</a></li>
                    <li><a href="selectEvents.php">Display events</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ol>
            </section>
    <?php
        }
        else{
            //display FORM
    ?>
        <section class="loginForm">
            <!-- this section will display when the user asks to login to the application -->
            <h2>Login Form</h2>
            <form method="post" action="login.php">
                
                <div class="errorMessage">
                <?php
                    //option 2 - check to see if you have defined this variable yet
                    if (isset($errorMsg)){
                        echo $errorMsg;     //display error message
                    }
                ?>
                </div>
                <p>
                    <label for="inUsername">Username:</label>
                    <input type="text" name="inUsername" id="inUsername">
                </p>
                <p>
                    <label for="inPassword">Password:</label>
                    <input type="password" name="inPassword" id="inPassword">
                </p>
                <p>
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" value="Reset">
                </p>

            </form>
        </section>
    <?php
        }//end of else branch
    ?>
</body>
</html>