<?php

    //#1
    function americanDate(){
        $formatDate = date("m" . "/" . "d" . "/" . "Y");
        echo $formatDate;
    }

    //#2
    function internationDate(){
        $formatDate = date("d" . "/" . "m" . "/" . "Y");
        echo $formatDate;
    }

    //#3
    function stringFormat($inStringFunction){
        echo strlen($inStringFunction);
        echo trim($inStringFunction);
        echo strtolower($inStringFunction);
        echo strpos($inStringFunction, "DMACC");
        echo strpos($inStringFunction, "dmacc");
    }

    //#4
    function formattedPhoneNumber($inPhoneNumber){
        $formatted = substr($inPhoneNumber, -10, -7) . "-" . substr($inPhoneNumber, -7, -4) . "-" . substr($inPhoneNumber, -4); 
        echo $formatted;
    }

    //#5
    function formatCurrency($inCurrency){
        $inCurrency = "$" . number_format($inCurrency, 2);
        echo $inCurrency;
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
    <h2>3-1 PHP Functions</h2>
    <p>#1 mm/dd/yyyy: <?php americanDate(); ?></p>
    <p>#2 dd/mm/yyyy: <?php internationDate(); ?></p>
    <p>#3 String Format: <?php stringFormat(" I go to DMACC.") ?></p>
    <p>#4 Phone Number: <?php formattedPhoneNumber(1234567890); ?></p>
    <p>#5 Currency: <?php formatCurrency(123456); ?></p>
</body>
</html>