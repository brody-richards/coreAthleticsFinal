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
    <title>Fitness Overview | Core Athletics
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
                    <a href="#" class="nav-link dropdown-toggle" id="coachDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Coaching</a>
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
                    <a href="#" class="nav-link dropdown-toggle active" id="fitnessDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fitness</a>
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
                
    echo "<p><strong class='bold'>Fitness Overview</strong></p>";
    echo "<p><strong class='bold'>Today's Date: </strong>" . date('F j, Y', strtotime($currentDate)) . "</p>";
    ?>
</div>

<div class="fitnessBox">
    <h1>Fitness Overview.</h1>
    <p>Information on fitness progress.</p>


    <div class="barChart">
        <canvas id="fitnessChart"></canvas>

        <div class="statsFitness my-3">

            <div class="fStatOne">

                <?php 
                $query4 = "SELECT 
                workouts.strengthType, 
                workouts.strengthTime,
                workouts.userID,
                workouts.date,
                workoutType.id, 
                workoutType.name 
                FROM workouts 
                INNER JOIN workoutType ON workouts.strengthType = workoutType.id 
                WHERE workouts.userID = '" . $_COOKIE['id'] . "' AND workouts.date = '$currentDate'";

                $sql4 = mysqli_query($connection, $query4);

                while($row4 = mysqli_fetch_array($sql4)) {

                    $strengthType = $row4['name'];

                    $strengthTime = $row4['strengthTime'];

                }

                if (isset($strengthType) && isset($strengthTime)) {
                    echo '<div class="statCard">';
                        echo '<h3 class="bold">Recent Strength Workout</h3>';
                        echo '<p>' . $strengthType . '</p>';
                    echo '</div>';
                } else {
                    echo '<h3 class="bold">Recent Strength Workout</h3>';
                    echo "<p>Today's Strength workout has not been logged.</p>";
                }
                ?>
            </div>

            <div class="fStatTwo">
                
                <?php 
                    
                    $query5 = "SELECT
                        workouts.cardioType, 
                        workouts.cardioTime,
                        workouts.userID,
                        workouts.date,
                        workoutType.id, 
                        workoutType.name
                        FROM workouts
                        INNER JOIN workoutType ON workouts.cardioType = workoutType.id WHERE workouts.userID = '" . $_COOKIE['id'] . "' AND workouts.date = '$currentDate'";

                        $sql5 = mysqli_query($connection, $query5);

                        while ($row5 = mysqli_fetch_array($sql5)) {
                            
                            $cardioType = $row5['name'];

                            $cardioTime = $row5['cardioTime'];
                            
                        }

                        if (isset($cardioType) && isset($cardioTime)) {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Recent Cardio Workout</h3>';
                                echo '<p>' . $cardioType . '</p>';
                            echo '</div>';
                        } else {
                            echo '<h3 class="bold">Recent Cardio Workout</h3>';
                            echo "<p>Today's Cardio workout has not been logged.</p>";
                        }
                    
                    ?>
            </div>

            <div class="fStatThree">
                    <?php 
                    
                    if (isset($cardioTime) && isset($strengthTime)) {

                        $totalMinutes = $strengthTime + $cardioTime;
        
                        $totalHours = floor($totalMinutes / 60);
                        $remainingMinutes = $totalMinutes % 60;
        
                        if ($totalMinutes < 59) {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Total Workout Time</h3>';
                                echo '<p>' . $totalMinutes . ' minutes</p>';
                            echo '</div>';
                        } else if ($totalMinutes % 60 == 0) {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Total Workout Time</h3>';
                                echo '<p>' . $totalHours . ' hour</p>';
                            echo '</div>';
                        }
                        else {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Total Workout Time</h3>';
                                echo '<p>' . $totalHours . ' hours ' . $remainingMinutes.' minutes</p>';
                            echo '</div>';
                        }
        
                } else {
                    echo "<h3 class='bold'>Total Workout Time</h3>";
                    echo "<p>Please log today's workout to see your breakdown.</p>";
                }
                    ?>
            </div>

            <div class="fStatFour">
                    <?php
                        $query = "SELECT * FROM athleteProfile WHERE id = '" . $_COOKIE['id'] . "'";
        
                        $sql = mysqli_query($connection, $query);
                    
                        while($row = mysqli_fetch_array($sql)) {
                    
                            $gender = $row['gender'];
        
                            $currentWeight = $row['currentWeight'];
                        }
    
                        if (isset($cardioTime) && isset($strengthTime)) {

                            $totalMinutes = $strengthTime + $cardioTime;
            
                         // ----------------------- strength calculations
        
                        // 125 and BELOW
                        if ($currentWeight <= 125 && $gender == 'man') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Strength Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedStrength = 3.5*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        } 
                        else if ($currentWeight <= 125 && $gender == 'woman') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Strength Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedStrength = 2.7*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
        
                        // 126 - 155
                        else if ($currentWeight >= 126 && $currentWeight <= 155 && $gender == 'man') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Strength Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedStrength = 4.1*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
                        else if ($currentWeight >= 126 && $currentWeight <= 155 && $gender == 'woman') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Strength Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedStrength = 3.3*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
        
                        // 156 - 185
                        else if ($currentWeight >= 156 && $currentWeight <= 185 && $gender == 'man') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Strength Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedStrength = 5.2*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
                        else if ($currentWeight >= 156 && $currentWeight <= 185 && $gender == 'woman') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Strength Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedStrength = 4.5*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
        
                        // 186 - 215
                        else if ($currentWeight >= 186 && $currentWeight <= 215 && $gender == 'man') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Strength Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedStrength = 6.5*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
                        else if ($currentWeight >= 186 && $currentWeight <= 215 && $gender == 'woman') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Strength Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedStrength = 5.8*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
        
                        // 216 and UP
                        else if ($currentWeight >= 216 && $gender == 'man') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Strength Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedStrength = 7.8*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
                        else if ($currentWeight >= 216 && $gender == 'woman') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Strength Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedStrength = 7.0*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
                    } else {
                        echo "<h3 class='bold'>Estimated Calories Burned from Strength Training</h3>";
                        echo "<p>Please log today's workout to see your breakdown.</p>";
                    }
                    ?>
            </div>

            <div class="fStatFive">
                    <?php 
                    
                    if (isset($cardioTime) && isset($strengthTime)) {

                        $totalMinutes = $strengthTime + $cardioTime;
        
                        // cardio calculations
        
                        // 125 and BELOW
                        if ($currentWeight <= 125 && $gender == 'man') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Cardio Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedCardio = 6.0*$totalMinutes) . ' calories</p>';
                            echo '</div>';
                        } 
                        else if ($currentWeight <= 125 && $gender == 'woman') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Cardio Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedCardio = 4.5*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
        
                        // 126 - 155
                        else if ($currentWeight >= 126 && $currentWeight <= 155 && $gender == 'man') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Cardio Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedCardio = 7.1*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
                        else if ($currentWeight >= 126 && $currentWeight <= 155 && $gender == 'woman') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Cardio Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedCardio = 5.3*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
        
                        // 156 - 185
                        else if ($currentWeight >= 156 && $currentWeight <= 185 && $gender == 'man') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Cardio Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedCardio = 9.0*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
                        else if ($currentWeight >= 156 && $currentWeight <= 185 && $gender == 'woman') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Cardio Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedCardio = 7.0*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
        
                        // 186 - 215
                        else if ($currentWeight >= 186 && $currentWeight <= 215 && $gender == 'man') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Cardio Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedCardio = 11.0*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
                        else if ($currentWeight >= 186 && $currentWeight <= 215 && $gender == 'woman') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Cardio Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedCardio = 8.6*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
        
                        // 216 and UP
                        else if ($currentWeight >= 216 && $gender == 'man') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Cardio Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedCardio = 13.0*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
                        else if ($currentWeight >= 216 && $gender == 'woman') {
                            echo '<div class="statCard">';
                                echo '<h3 class="bold">Estimated Calories Burned from Cardio Training</h3>';
                                echo '<p>' . ($totalCaloriesBurnedCardio = 10.3*$totalMinutes) .' calories</p>';
                            echo '</div>';
                        }
                    
                } else {
                    echo "<h3 class='bold'>Estimated Calories Burned from Strength Training</h3>";
                    echo "<p>Please log today's workout to see your breakdown.</p>";
                }
                    ?>
            </div>

            <div class="fStatSix">
                    <?php 

                    if (isset($totalCaloriesBurnedStrength) && isset($totalCaloriesBurnedCardio)) {
                    echo '<div class="statCard">';
                        echo '<h3 class="bold">Estimated Total Calories Burned</h3>';
                        echo '<p>' . ($totalCaloriesBurnedStrength + $totalCaloriesBurnedCardio) . ' calories</p>';
                    echo '</div>';
                    } else {
                        echo "<h3 class='bold'>Estimated Total Calories Burned</h3>";
                        echo "<p>Please log today's workout to see your breakdown.</p>";
                    }
                    ?>
            </div>

        </div>
    </div>

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


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('fitnessChart');

    new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Est Total Calories Burned','Est Calories Burned From Cardio Workout', 'Est Calories Burned From Strength Workout'],
        datasets: [{
        label: 'Calories Burned',
        data: [<?php echo ($totalCaloriesBurnedStrength + $totalCaloriesBurnedCardio) ?>,<?php echo $totalCaloriesBurnedCardio ?>,<?php echo $totalCaloriesBurnedStrength ?>],
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