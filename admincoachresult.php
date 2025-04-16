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

    $client = mysqli_real_escape_string($connection, $_POST['client']);
    $bookingTime = mysqli_real_escape_string($connection, $_POST['time']);
    $bookingType = mysqli_real_escape_string($connection, $_POST['type']);
    $bookingNotes = mysqli_real_escape_string($connection, $_POST['notes']);
    setcookie('client', $client, strtotime("+1 year"), "/");
    setcookie('bookingTime', $bookingTime, strtotime("+1 year"), "/");
    setcookie('bookingNotes', $bookingNotes, strtotime("+1 year"), "/");
    setcookie('bookingType', $bookingType, strtotime("+1 year"), "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Check Booking Information | Core Athletics
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
            <div class="buttons">
                <a href="logout.php" class="btn btn-light">Logout</a>
            </div>
        </div>
    </nav>
</header>

<main>

<section class="appointmentDetails">

<div class="container">
    <h1>Booking Information | Check Information</h1>
    <p>Add and verify the following details.</p>


    <h2>Client Personal Details</h2>

    <?php 

    $userID = $_COOKIE['id'];

    $query15 = "SELECT * FROM athleteProfile WHERE id='$client'";

    $sql15 = mysqli_query($connection,$query15);

    while($row15 = mysqli_fetch_array($sql15)) {

        $firstName = $row15['firstName'];

        $lastName = $row15['lastName'];

        $email = $row15['email'];

        $birthday = $row15['birthday'];

        echo "<p><strong class='bold'>Full Name: </strong>" . $firstName . " " . $lastName . ".</p>";
        echo "<p><strong class='bold'>Email: </strong>" . $email . ".</p>";
        echo "<p><strong class='bold'>Birthday: </strong>" . date('F j, Y', strtotime($birthday)) . ".</p>";
    }

    ?>

    <h2>Appointment Details</h2>
    
    <p>Date: <?php echo date('F j, Y', strtotime($_COOKIE['bookingDate'])); ?> </p>


    <?php 

        if($bookingTime==1) {
            echo "<p><strong class='bold'>Time: </strong>9AM - 9:45AM</p>";
        }
        else if($bookingTime==2) {
            echo "<p><strong class='bold'>Time: </strong>10AM - 10:45AM</p>";
        }
        else if($bookingTime==3) {
            echo "<p><strong class='bold'>Time: </strong>11AM - 11:45AM</p>";
        }
        else if($bookingTime==4) {
            echo "<p><strong class='bold'>Time: </strong>12PM - 12:45PM</p>";
        }
        else if($bookingTime==5) {
            echo "<p><strong class='bold'>Time: </strong>1PM - 1:45PM</p>";
        }
        else if($bookingTime==6) {
            echo "<p><strong class='bold'>Time: </strong>2PM - 2:45PM</p>";
        }
        else if($bookingTime==7) {
            echo "<p><strong class='bold'>Time: </strong>3PM - 3:45PM</p>";
        } else {
            echo "<p><strong class='bold'>Time: </strong>4PM - 4:45PM</p>";
        }

    ?>

    <?php 

$query17 = "SELECT * FROM services WHERE id='$bookingType'";

    $sql17 = mysqli_query($connection,$query17);

    $row17 = mysqli_fetch_array($sql17);

    $name = $row17['name'];

    echo "<p><strong class='bold'>Type: </strong>" . $name . "</p>";

    ?>

    <p><strong class="bold">Notes: </strong><?php echo $_POST['notes']; ?> </p>

    <a href="admincoachconfirmation.php" class="btn btn-dark btn-lg btn-block" style="background-color: #0d7a52">Book Now</a>


    
</div>

</section>

</main>


<footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <div class="name">
                <p>Core Athletics</p>
            </div>

            <div class="footerlinks">
                <a href="index.php">Dashboard</a>
                <a href="coachoverview.php">Coaching</a>
                <a href="settings.php">Profile</a>
                <a href="nutritionoverview.php">Nutrition</a>
                <a href="fitnessoverview.php">Fitness</a>
            </div>
            </div>
        </footer>
    

</body>
</html>