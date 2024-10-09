<?php

$name = $_POST["name"];
$email = $_POST["email"];
$reason = $_POST["reason"];
$comment = $_POST["message"];
$today = date('m/d/Y');


$to = "$email";
$subject = "Thank you for contacting us!";

$message = "
<html>
<head>
<title>Happy Tails - Rescue and Rehab</title>
</head>
<body style='font-family: Verdana, Geneva, Tahoma, sans-serif;
font-size: 18px;
color: #102542;
background-color: #FFFFFF;
text-align: center;'>
<h3>Dear $name,</h3>
        <p>
            Thank you for contacting us $reason.
            <br>
            <br>
            Your message is the following;<br>
                $comment
            <br>
            <br>
            We will contact you soon at $email
            <br>
            <br>
            -Thank you! Happy Tails
            <br>
            Date sent: $today
            <br>
        </p>
</body>
</html>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$headers .= 'From: contact@karinbrun.name' . "\r\n";
$headers .= 'Cc: kbrun86@gmail.com' . "\r\n";

if(mail($to,$subject,$message,$headers,'-fcontact@karinbrun.name')){
	echo "A confirmation email has been sent to $email.";
}
else {
	echo "There was an error sending the confirmation email to the customer.";
}


$to2 = "contact@karinbrun.name";
$subject2 = "Happy Tails - Contact Info";
$message2 = "
<html>
<p>Name: $name</p>
<p>Email: $email</p>
<p>Reason: $reason</p>
<p>Message: $message</p>
<p>Date: $today</p>
</html>
";
$headers2 = "From : contact@karinbrun.name" . "\r\n";

if(mail($to2, $subject2, $message2, $headers2)){
    echo "mail() processed correctly";
}
else {
    echo "ERROR - mail function had issues";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Tails - Rescue and Rehab</title>
    <link rel="icon" type="image/x-icon" href="images/icon.ico">
    <link rel="icon" href="images/icon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="images/logoWhiteText.png" class="logo">
            </a>
            <div class="navbar-nav">
                <a class="nav-link">Home</a>
                <a class="nav-link">About</a>
                <a class="nav-link">Adopt</a>
                <a class="nav-link">Donate</a>
                <a class="nav-link active">Contact</a>
            </div>
        </div>
    </nav>

    <br>
    <br>
    <div class="container-fluid">
        <h1 class="text-center">Contact</h1>
        <br>
        <br>
        <form method="post" action="formHandler.php" class="formBox" id="contactForm" onsubmit="return submitContact(event)">
            <br>
            <p class="text-center">Thank you for contacting us! Someone will get back to you soon!</p>
            <br>
        </form>
    </div>
    <br>
    <br>

</body>
    <footer>
        <br>
        <br>
        <p class="colorWhite text-center">&copy;<script>
            let today = new Date();
            document.write(today.getFullYear());
        </script> Happy Tails</p>
        <br>
        
    </footer>
</html>