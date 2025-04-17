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

    $currentDate = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness | Core Athletics</title>
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

<div class="introBox">
    <?php 
    $query = "SELECT * FROM athleteProfile WHERE id = '" . $_COOKIE['id'] . "'";

    $sql = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($sql)) {

        $firstName = $row['firstName'];
    }
                
    echo "<p><strong class'bold'>Add a Workout</strong></p>";
    echo "<p><strong class'bold'>Today's Date: </strong>" . date('F j, Y', strtotime($currentDate)) . "</p>";
    ?>
</div>

<div class="fitnessBox">
    <h1>Fitness</h1>
    <p>Add Your Daily Workout</p>
    <form action="fitnessresult.php" method="POST">
        
        <div class="strengthWorkout">
            <label for="stengthType" class="form-label my-2">Select a Strength workout:</label>
                <select name="strengthType" id="strengthType" class="form-select" required>
                <option value="" disabled selected>Select a workout:</option>

                <?php 
                
                $query1 = 'SELECT id,name FROM workoutType WHERE type = 1';

                $sql1 = mysqli_query($connection,$query1);

                while ($row1 = mysqli_fetch_array($sql1)) {
                    echo "<option value='" . $row1['id'] . "'>" . $row1['name'] . "</option>"; 
                }

                ?>
            </select>
        </div>

        <div class="strengthTime">
            <label for="strengthTime" class="form-label my-2">Add Estimated Strength Workout Time (minutes):</label>
            <input type="number" name="strengthTime" id="strengthTime" step="1" min="0" class="form-control"  required>
        </div>

        <div class="cardioWorkout">
            <label for="cardioType" class="form-label my-2">Select a Cardio workout:</label>
                <select name="cardioType" id="cardioType" class="form-select" required>
                <option value="" disabled selected>Select a workout:</option>

                <?php 
                
                $query2 = 'SELECT id,name FROM workoutType WHERE type = 2';

                $sql2 = mysqli_query($connection,$query2);

                while ($row2 = mysqli_fetch_array($sql2)) {
                    echo "<option value='" . $row2['id'] . "'>" . $row2['name'] . "</option>";            
                }

                ?>
            </select>
        </div>

        <div class="cardioTime">
            <label for="cardioTime" class="form-label my-2">Add Estimated Cardio Workout Time (minutes):</label>
            <input type="number" name="cardioTime" id="cardioTime" step="1" min="0" class="form-control" required>
        </div>

        <input type="submit" value="Submit Workout Entry" class="btn btn-dark btn-lg btn-block my-3" style="background-color: #0d7a52">

    </form>
</div>

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