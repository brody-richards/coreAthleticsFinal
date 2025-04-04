<?php 
    $server = 'localhost';
    $username = 'brichards_coreAthleticsAdmin';
    $password = 'farri1-Myxduv-xepwoq';
    $database = 'brichards_coreAthletics';

    $connection = mysqli_connect($server,$username,$password,$database);
    if(!$connection){
        die(mysqli_connect_error());
    }

    $bookingTime = mysqli_real_escape_string($connection, $_POST['time']);
    $bookingNotes = mysqli_real_escape_string($connection, $_POST['notes']);
    setcookie('bookingTime', $bookingTime, strtotime("+1 year"), "/");
    setcookie('bookingNotes', $bookingNotes, strtotime("+1 year"), "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrition | Core Athletics
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
<nav class="navbar navbar-expand bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <a href="#" class="navbar-brand">Core Athletics</a>
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
                <a href="login.php" class="btn btn-light">Login</a>
                <a href="signup.php" class="btn btn-outline-light">Sign Up</a>
            </div>
        </div>
    </nav>
</header>


<div class="container">
    <h1>Booking Information | RESULT</h1>
    <p>Add and verify the following details.</p>


    <h2>Personal Details</h2>

    <?php 

    $userID = $_COOKIE['id'];

    $query15 = "SELECT * FROM athleteProfile WHERE id='$userID'";

    $sql15 = mysqli_query($connection,$query15);

    while($row15 = mysqli_fetch_array($sql15)) {

        $firstName = $row15['firstName'];

        $lastName = $row15['lastName'];

        $email = $row15['email'];

        $birthday = $row15['birthday'];

        echo "<p>Full Name: " . $firstName . " " . $lastName . ".</p>";
        echo "<p>Email: " . $email . ".</p>";
        echo "<p>Birthday: " . date('F j, Y', strtotime($birthday)) . ".</p>";
    }

    ?>

    <h2>Appointment Details</h2>
    
    <p>Date: <?php echo date('F j, Y', strtotime($_COOKIE['bookingDate'])); ?> </p>


    <?php 

        if($bookingTime==1) {
            echo "<p>Time: 9AM - 9:45AM</p>";
        }
        else if($bookingTime==2) {
            echo "<p>Time: 10AM - 10:45AM</p>";
        }
        else if($bookingTime==3) {
            echo "<p>Time: 11AM - 11:45AM</p>";
        }
        else if($bookingTime==4) {
            echo "<p>Time: 12PM - 12:45PM</p>";
        }
        else if($bookingTime==5) {
            echo "<p>Time: 1PM - 1:45PM</p>";
        }
        else if($bookingTime==6) {
            echo "<p>Time: 2PM - 2:45PM</p>";
        }
        else if($bookingTime==7) {
            echo "<p>Time: 3PM - 3:45PM</p>";
        } else {
            echo "<p>Time: 4PM - 4:45PM</p>";
        }

    ?>

    <?php 

    $query17 = "SELECT * FROM services WHERE id=2";

    $sql17 = mysqli_query($connection,$query17);

    $row17 = mysqli_fetch_array($sql17);

    $name = $row17['name'];

    echo "<p>Type: " . $name . "</p>";

    ?>

    <p>Notes: <?php echo $_POST['notes']; ?> </p>

    <a href="coachconfirmation.php">Book Now</a>


    
</div>


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