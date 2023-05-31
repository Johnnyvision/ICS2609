<?php
    $yourName = $_POST['yourName'];
    $yourEmail = $_POST['yourEmail'];
    $subject = $_POST['subject'];
    $carlist = $_POST['carlist'];
    $message = $_POST['messageA'];

    $conn = new mysqli('localhost', 'root', '', 'carlist');
    if ($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else {
        $stmt = $conn->prepare("Insert into listing(yourName, yourEmail, subject, carlist, message) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $yourName, $yourEmail, $subject, $carlist, $message);
        $stmt->execute();
        echo "Message Sent!";
        $stmt->close();
        $conn->close();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Message Sent!</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <a href="booking.php">Go Back</a>
</body>
</html>