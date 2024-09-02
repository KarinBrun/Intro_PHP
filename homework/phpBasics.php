<?php
    //#1
    $yourName = "Karin Brun";

    //#4
    $number1 = 10;
    $number2 = 15;
    $total = $number1 + $number2;

    //#6
    $phpArray = array("PHP", " HTML", " JavaScript");
    ?>
    <script>
        let jsArray = [];
        <?php
            foreach ($phpArray as $x){
                ?>
                jsArray.push( <?php echo json_encode($x); ?> );
                <?php
            }
        ?>
        document.write(jsArray);
    </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WDV341 Intro PHP</h1>
    <h2>PHP Basics - Homework</h2>
    <?php
        //#2
        echo "<h1>PHP Basics</h1>";
    ?>

    <!-- #3 -->
    <h2><?php echo $yourName; ?></h2>

    <?php
        //#5
        echo "<p>Number 1: $number1</p>";
        echo "<p>Number 2: $number2</p>";
        echo "<p>Total: $total</p>"
    ?>
</body>
</html>