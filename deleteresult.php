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

    $appointmentID = mysqli_real_escape_string($connection, $_POST['delete']);

    setcookie('appointmentID', $appointmentID, strtotime("+1 year"), "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete an Appointment | Core Athletics
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
<nav class="navbar navbar-expand border-bottom border-body" style="background-color: #07402B;" data-bs-theme="dark">

        <div class="container">
            <img src="img/logoText.svg" alt="main logo in navbar" lass="navbar-brand" width="200" height="50">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link" aria-current="dashboard page">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Coaching</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="coachoverview.php">Overview</a>
                        <a class="dropdown-item" href="bookcoach.php">Book a Coach</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="goals.php">Goals</a>
                        <a class="dropdown-item" href="settings.php">Settings</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nutrition</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="nutritionoverview.php">Overview</a>
                        <a class="dropdown-item" href="nutrition.php">Add a Meal</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fitness</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="fitnessoverview.php">Overview</a>
                        <a class="dropdown-item" href="fitness.php">Add a Workout</a>
                    </div>
                </li>
            </ul>
            <div class="buttons">
                <a href="logout.php" class="btn btn-light">Logout</a>
        </div>
    </nav>
</header>

<main>

<section class="appointmentDetails">

<div class="container">
    <h1 class="mb-5">Confirm Appointment Deletion</h1>

    <?php

        $appointmentID = $_POST['delete'];

        $query1 = "SELECT * FROM appointment WHERE appointmentID = '$appointmentID'";

                $sql1 = mysqli_query($connection,$query1);

                while ($row1 = mysqli_fetch_array($sql1)) {

                    $bookingDate = strtotime($row1['bookingDate']);
                    $bookingDate = date('l F j, Y', $bookingDate);

                    $bookingTime = $row1['bookingTime'];

                    if ($bookingTime == 1) {
                        $bookingTimeText = "9AM - 9:45AM";
                    } else if ($bookingTime == 2) {
                        $bookingTimeText = "10AM - 10:45AM";
                    } else if ($bookingTime == 3) {
                        $bookingTimeText = "11AM - 11:45AM";
                    } else if ($bookingTime == 4) {
                        $bookingTimeText = "12PM - 12:45PM";
                    } else if ($bookingTime == 5) {
                        $bookingTimeText = "1PM - 1:45PM";
                    } else if ($bookingTime == 6) {
                        $bookingTimeText = "2PM - 2:45PM";
                    } else if ($bookingTime == 7) {
                        $bookingTimeText = "3PM - 3:45PM";
                    } else {
                        $bookingTimeText = "4PM - 4:45PM";
                    }

                    $bookingType = $row1['bookingType'];

                    if ($bookingType == 1) {
                        $bookingTypeText = "Initial Consultation";
                    } else if ($bookingType == 2) {
                        $bookingTypeText = "Nutrition Coaching";
                    } else if ($bookingType == 3) {
                        $bookingTypeText = "Fitness Coaching";
                    } else {
                        $bookingTypeText = "Recovery Coaching";
                    }

                    $appointmentID = $row1['appointmentID'];

                    echo "<p><span class='bold'>Date:</span> " . $bookingDate . "</p>";

                    echo "<p><span class='bold'>Time:</span> " . $bookingTimeText . "</p>";


                    echo "<p><span class='bold'>Appointment Type:</span> " . $bookingTypeText . "</p>";

                    echo "<p><span class='bold'>Coach:</span> Julie Baker</p>";

                }

                ?>

                <a href="deleteconfirm.php" class="btn btn-danger btn-lg btn-block my-4">Confirm Deletion</a>
</div>

</section>
</main>

<footer>
<div class="footerFlex">
    <div class="footerLeft">
        <img src="img/mail.png" alt="" width="50">
        <p>core@athletics.com</p>
    </div>

    <div class="footerMiddle">
        <img src="img/Facebook_Logo_Secondary.png" alt="" width="50">
        <img src="img/Instagram_Glyph_White.png" alt="" width="50">
        <img src="img/InBug-White.png" alt="" width="50">
    </div>

    <div class="footerRight">
        <p>Privacy Policy</p>
        <p>Terms & Conditions</p>
    </div>
</div>
</footer>
    

</body>
</html>