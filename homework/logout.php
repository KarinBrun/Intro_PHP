<?php

    //destroy the session
    session_unset();
    session_destroy();

    //disconnect from the database
    $conn = null;
    $stmt = null;

    //redirect to the home page/login page
    header("Location:login.php");

?>