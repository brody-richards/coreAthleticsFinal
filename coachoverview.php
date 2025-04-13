<?php 
    $server = 'localhost';
    $username = 'brichards_coreAthleticsAdmin';
    $password = 'farri1-Myxduv-xepwoq';
    $database = 'brichards_coreAthletics';

    $connection = mysqli_connect($server,$username,$password,$database);
    if(!$connection){
        die(mysqli_connect_error());
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Overview | Core Athletics
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

<section class="appointmentTable">

<div class="container">
    <h1>Your Appointments</h1>
    <p>All your upcoming appointment details.</p>
</div>

    <table>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Appointment Type</th>
                <th>Coach</th>
                <th>Notes</th>
            </tr>

            <?php 

            $userID = $_COOKIE['id'];
            
            $query = "SELECT bookingDate,bookingTime,bookingType,trainerID,bookingNotes FROM appointment WHERE userID='$userID' ORDER BY bookingDate asc";

            $sql = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($sql)) {

                $bookingDate = strtotime($row['bookingDate']);
                $bookingDate = date('l F j, Y', $bookingDate);

                $bookingTime = $row['bookingTime'];

                $bookingType = $row['bookingType'];

                $trainerID = $row['trainerID'];

                $bookingNotes = $row['bookingNotes'];

                echo "<tr>";
                    echo "<td>" . $bookingDate . "</td>"; 

                    echo "<td>";
                        if ($bookingTime == 1) {
                            echo "9AM - 9:45AM";
                        } else if ($bookingTime == 2) {
                            echo "10AM - 10:45AM";
                        } else if ($bookingTime == 3) {
                            echo "11AM - 11:45AM";
                        } else if ($bookingTime == 4) {
                            echo "12PM - 12:45PM";
                        } else if ($bookingTime == 5) {
                            echo "1PM - 1:45PM";
                        } else if ($bookingTime == 6) {
                            echo "2PM - 2:45PM";
                        } else if ($bookingTime == 7) {
                            echo "3PM - 3:45PM";
                        } else {
                            echo "4PM - 4:45PM";
                        }
                    echo "</td>"; 

                    echo "<td>";
                        if ($bookingType == 1) {
                            echo "Initial Consultation";
                        } else if ($bookingType == 2) {
                            echo "Nutrition Coaching";
                        } else if ($bookingType == 3) {
                            echo "Fitness Coaching";
                        } else {
                            echo "Recovery Coaching";
                        }
                    echo "</td>"; 

                    echo "<td>Julie Baker</td>";

                    echo "<td>" . $bookingNotes . "</td>";

                echo "</tr>";

            }
            
            ?>

        </table>

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