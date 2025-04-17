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

    $bookingDate = mysqli_real_escape_string($connection, $_POST['date']);

    setcookie('bookingDate', $bookingDate, strtotime("+1 year"), "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Details | Core Athletics
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

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link" aria-current="true">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" id="coachDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Coaching</a>
                    <div class="dropdown-menu" aria-labelledby="coachDropdown">
                    <a class="dropdown-item" href="coachoverview.php">Overview</a>
                        <a class="dropdown-item" href="bookcoach.php">Book a Coach</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="goals.php">Goals</a>
                        <a class="dropdown-item" href="settings.php">Settings</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="nutritionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nutrition</a>
                    <div class="dropdown-menu" aria-labelledby="nutritionDropdown">
                        <a class="dropdown-item" href="nutritionoverview.php">Overview</a>
                        <a class="dropdown-item" href="nutrition.php">Add a Meal</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="fitnessDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fitness</a>
                    <div class="dropdown-menu" aria-labelledby="fitnessDropdown">
                        <a class="dropdown-item" href="fitnessoverview.php">Overview</a>
                        <a class="dropdown-item" href="fitness.php">Add a Workout</a>
                    </div>
                </li>
            </ul>
            <div class="buttons">
                <a href="logout.php" class="btn btn-light">Logout</a>
            </div>
        </div>
    </nav>
</header>

<main>

<section class="appointmentDetails">

<div class="container">
    <div class="coachCheckBox">
        <h1>Booking Information</h1>
        <p>Add and verify the following details.</p>

        <h2>Appointment Details</h2>

        <div class="coachCheckDate">
            <p><strong class="bold">Date: </strong><?php echo date('F j, Y', strtotime($_POST['date'])); ?> </p>
            <form action="coachresult.php" method="POST">
                <label for="time">Select a Time:</label>
                <select name="time" id="time" class="form-select" required>
                <option value="" disabled selected>Select a Time:</option>

                    <?php 
                    
                    // $query14 = 'SELECT * FROM appointmentTimes';

                    $bookingDate = $_POST['date'];
                    
                    $query14 = "SELECT appointmentTimes.id,appointmentTimes.name FROM appointmentTimes LEFT JOIN appointment ON appointmentTimes.id = appointment.bookingTime AND appointment.bookingDate = '$bookingDate' WHERE appointment.bookingTime IS NULL";

                    $sql14 = mysqli_query($connection,$query14);

                    while ($row14 = mysqli_fetch_array($sql14)) {
                        echo "<option value='" . $row14['id'] . "'>" . $row14['name'] . "</option>"; 
                    }

                    // if bookingDate and bookingTime exist, do not show 

                    ?>
                </select>
            </div>

            <div class="coachCheckNotes">
                <label for="notes" class="form-label">Add notes for coach: (optional)</label>
                <input type="text" name="notes" id="notes" class="form-control" max="100">
            </div>

            <input type="submit" value="Continue" class="btn btn-dark btn-lg btn-block" style="background-color: #0d7a52">
        </form>
    </div>
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