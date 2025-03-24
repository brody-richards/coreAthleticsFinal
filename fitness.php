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
    <title>Fitness | Core Athletics</title>
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
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Coaching</a>
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
                    <a href="#" class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fitness</a>
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

<h1>Fitness</h1>
<p>Add Your Daily Workout</p>

<div class="container">
    <form action="fitnessresult.php" method="POST">
        
        <div class="strengthWorkout">
            <label for="stengthType" class="form-label">Select a Stength workout:</label>
                <select name="strengthType" id="strengthType" class="form-select">
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
            <label for="strengthTime" class="form-label">Add Estimated Strength Workout Time:</label>
            <input type="number" name="strengthTime" id="strengthTime" step="1" min="0" class="form-control">
        </div>

        <div class="cardioWorkout">
            <label for="cardioType" class="form-label">Select a Cardio workout:</label>
                <select name="cardioType" id="cardioType" class="form-select">
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
            <label for="cardioTime" class="form-label">Add Estimated Cardio Workout Time:</label>
            <input type="number" name="cardioTime" id="cardioTime" step="1" min="0" class="form-control">
        </div>

        <input type="submit" value="Submit Workout Entry">

    </form>
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