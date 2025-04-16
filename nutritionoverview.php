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
    <title>Nutrition | Core Athletics
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
                    <a href="#" class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nutrition</a>
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

<div class="introBox">
    <?php 
    $query = "SELECT * FROM athleteProfile WHERE id = '" . $_COOKIE['id'] . "'";

    $sql = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($sql)) {

        $firstName = $row['firstName'];
    }
                
    echo "<p><strong class'bold'>Nutrition Overview</strong></p>";
    echo "<p><strong class'bold'>Today's Date: </strong>" . date('F j, Y', strtotime($currentDate)) . "</p>";
    ?>
</div>


<div class="nutritionBox">
    <h1>Nutrition Overview.</h1>
    <p>Information on nutrition.</p>


    <div class="barChart">
        <canvas id="nutritionChart"></canvas>

        <div class="stats my-3">

            <div class="statOne">
                <?php 
                    $query = "SELECT * FROM athleteProfile WHERE id = '" . $_COOKIE['id'] . "'";

                    $sql = mysqli_query($connection, $query);
                
                    while($row = mysqli_fetch_array($sql)) {
                
                        $calorieGoal = $row['calorieGoal'];
                
                    }
                    
                    // echo '<p><span class="bold">Daily Calorie Goal:</span> ' . $calorieGoal . '</p>';


                    echo '<div class="statCard">';
                        echo '<h3 class="bold">Daily Calorie Goal</h3>';
                        echo '<p>' . $calorieGoal . '</p>';
                    echo '</div>';

                    ?>
            </div>

            <div class="statTwo">
                    <?php 
                    
                    $query7 = "SELECT SUM(calories) FROM meal WHERE date='$currentDate' AND userID = '" . $_COOKIE['id'] . "'";

                    $sql7 = mysqli_query($connection, $query7);

                    while ($row7 =mysqli_fetch_array($sql7)) {
                        $caloriesLogged = $row7[0];

                        $remainingCalories = $calorieGoal - $caloriesLogged;
                    }

                    if ($remainingCalories > 0) {
                        // echo '<p><span class="bold">Remaining Calories: </span>' . $remainingCalories . '</p>';

                        echo '<div class="statCard">';
                            echo '<h3 class="bold">Remaining Calories</h3>';
                            echo '<p>' . $remainingCalories . '</p>';
                        echo '</div>';
                    } else {
                        // echo '<p><span class="bold">Remaining Calories:</span> 0 (over by: ' . ($remainingCalories * -1) . ' calories)</p>';

                        echo '<div class="statCard">';
                            echo '<h3 class="bold">Remaining Calories</h3>';
                            echo '<p>0</p>';
                            echo '<p class="overText">(over by ' . ($remainingCalories * -1) . ' calories)</p>';
                        echo '</div>';
                    }
                    
                    ?>
            </div>

            <div class="statThree">
                    <?php 
                    
                    $query8 = "SELECT COUNT(mealID),userID FROM meal WHERE date = '$currentDate' AND userID = '" . $_COOKIE['id'] . "'";

                    $sql8 = mysqli_query($connection,$query8);

                    while ($row8 = mysqli_fetch_array($sql8)) {
                        $totalMeals = $row8[0];
                    }

                    echo '<div class="statCard">';
                        echo '<h3 class="bold">Daily Meal Count</h3>';
                        echo '<p>' . $totalMeals . '</p>';
                    echo '</div>';

                    
                    ?>
            </div>

            <div class="statFour">
                    <?php
                        $query9 = "SELECT SUM(protein),SUM(fat),SUM(carbs),SUM(calories) FROM meal WHERE date='$currentDate' AND userID = '" . $_COOKIE['id'] . "'";

                        $sql9 = mysqli_query($connection, $query9);

                        $row9 = mysqli_fetch_array($sql9);

                        echo '<div class="statCard">';
                            echo '<h3 class="bold">Calories Logged</h3>';
                            echo '<p>' . $row9[3] . '</p>';
                        echo '</div>';
                    ?>
            </div>
        </div>
    </div>

</div>
    
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


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('nutritionChart');

    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Daily Calorie Goal','Current Daily Logged Calories'],
        datasets: [{
        label: 'Total Daily Calories',
        data: [<?php echo $calorieGoal ?>,<?php echo $row9[3] ?>],
        borderWidth: 1,
        backgroundColor: '#0d7a52',
        }]
    },
    options: {
        responsive: true,
        scales: {
        y: {
            beginAtZero: true
        }
        }
    }
    });
</script>
        
</body>
</html>