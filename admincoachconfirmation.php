<?php 
    $server = 'localhost';
    $username = 'brichards_coreAthleticsAdmin';
    $password = 'farri1-Myxduv-xepwoq';
    $database = 'brichards_coreAthletics';

    $connection = mysqli_connect($server,$username,$password,$database);
    if(!$connection){
        die(mysqli_connect_error());
    }
    date_default_timezone_set('America/Edmonton');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Booking Confirmation | Core Athletics
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
<nav class="navbar navbar-expand border-bottom border-body" style="background-color: #07402B;" data-bs-theme="dark">

        <div class="container">
            <img src="img/logoText.svg" alt="main logo in navbar" class="navbar-brand" width="200" height="50">

            <div class="buttons">
                <a href="logout.php" class="btn btn-light">Logout</a>
            </div>
        </div>
    </nav>
</header>

<main>

<section class="appointmentDetails">

<div class="container">
    <h1 class="mb-5">Client Booking Confirmed.</h1>

    <?php

        $userID = $_COOKIE['client'];

        $trainerID = 1;

        $bookingDate = $_COOKIE['bookingDate'];

        $bookingType = $_COOKIE['bookingType'];

        $bookingTime = $_COOKIE['bookingTime'];

        $bookingNotes = $_COOKIE['bookingNotes'] ?? '';

        $status = 'booked';

        $query19 = "INSERT INTO appointment (userID,trainerID,bookingDate,bookingType,bookingTime,bookingNotes,status) VALUES ('$userID','$trainerID','$bookingDate','$bookingType','$bookingTime','$bookingNotes','$status')";

        $sql19 = mysqli_query($connection,$query19);

        if ($sql19) {
            echo '<a href="adminpage.php" class="btn btn-dark btn-lg btn-block" style="background-color: #0d7a52">Back to dashboard</a>';
        } else {
            echo "<p>Booking Error. Please Try Again.</p>";
            echo mysqli_error($connection);
        }

    ?>
</div>

</section>
</main>

</body>
</html>