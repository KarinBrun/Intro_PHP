<?php

    $hostImageFolder = "uploadedImages/";

    echo basename($_FILES["inFile"]["name"]);

    $hostImagePath = $hostImageFolder . basename($_FILES["inFile"]["name"]);

    echo "<h3>$hostImagePath</h3>";

    move_uploaded_file($_FILES["inFile"]["tmp_name"], $hostImagePath);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>