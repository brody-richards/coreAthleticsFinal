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
    // echo $currentDate;

    foreach ($_COOKIE as $key => $value) {
        if ($key != 'id') {
            setcookie($key, '', time() - 3600, "/");
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Core Athletics
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<header>
<nav class="navbar navbar-expand border-bottom border-body" style="background-color: #07402B;" data-bs-theme="dark">

        <div class="container">
            <img src="img/logoText.svg" alt="main logo in navbar" lass="navbar-brand" width="200" height="50">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link active" aria-current="dashboard page">Dashboard</a>
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
                
    echo "<p><strong class'bold'>Welcome to your dashboard, </strong>" . ucfirst($firstName) . "</p>";
    echo "<p><strong class'bold'>Today's Date: </strong>" . date('F j, Y', strtotime($currentDate)) . "</p>";
    ?>
</div>


    <div class="dashboardGrid">
        <div class="cardOne">
            <div class="bentoTitle">
            <img src="img/userIcon.png" alt="user icon">
                <h2>Personal Information</h2>
            </div>
            <?php 
                $query = "SELECT * FROM athleteProfile WHERE id = '" . $_COOKIE['id'] . "'";

                $sql = mysqli_query($connection, $query);
            
                while($row = mysqli_fetch_array($sql)) {
            
                    $calorieGoal = $row['calorieGoal'];
            
                    $currentWeight = $row['currentWeight'];
            
                    $goalWeight = $row['goalWeight'];

                    $firstName = $row['firstName'];

                    $lastName = $row['lastName'];
                }
                
                echo '<p><span class="bold">Name:</span> ' . ucfirst($firstName) . ' ' . ucfirst($lastName) . '</p>';
                echo '<p><span class="bold">Current Weight:</span> ' . $currentWeight . ' lbs.</p>';
                echo '<p><span class="bold">Goal Weight:</span> ' . $goalWeight . ' lbs.</p>';

            ?>
        </div>



        <div class="cardTwo">
            <div class="bentoTitle">
                <img src="img/nutrition.png" alt="nutrition icon">
                <h2>Nutrition</h2>
            </div>
    <?php 
            $query = "SELECT * FROM athleteProfile WHERE id = '" . $_COOKIE['id'] . "'";

            $sql = mysqli_query($connection, $query);
        
            while($row = mysqli_fetch_array($sql)) {
        
                $calorieGoal = $row['calorieGoal'];
        
            }
            
            echo '<p><span class="bold">Daily Calorie Goal:</span> ' . $calorieGoal . '</p>';

            ?>

            <?php 
            
            $query7 = "SELECT SUM(calories) FROM meal WHERE date='$currentDate' AND userID = '" . $_COOKIE['id'] . "'";

            $sql7 = mysqli_query($connection, $query7);

            while ($row7 =mysqli_fetch_array($sql7)) {
                $caloriesLogged = $row7[0];

                $remainingCalories = $calorieGoal - $caloriesLogged;
            }

            if ($remainingCalories > 0) {
            echo '<p><span class="bold">Remaining Calories: </span>' . $remainingCalories . '</p>';
            } else {
                echo '<p><span class="bold">Remaining Calories:</span> 0 (over by: ' . ($remainingCalories * -1) . ' calories)</p>';
            }
            
            ?>

            <?php 
            
            $query8 = "SELECT COUNT(mealID),userID FROM meal WHERE date = '$currentDate' AND userID = '" . $_COOKIE['id'] . "'";

            $sql8 = mysqli_query($connection,$query8);

            while ($row8 = mysqli_fetch_array($sql8)) {
                $totalMeals = $row8[0];
            }

            echo '<p><span class="bold">Daily Meal Count: </span>' . $totalMeals . '</p>';

            
            ?>

            <?php
                $query9 = "SELECT SUM(protein),SUM(fat),SUM(carbs),SUM(calories) FROM meal WHERE date='$currentDate' AND userID = '" . $_COOKIE['id'] . "'";

                $sql9 = mysqli_query($connection, $query9);

                $row9 = mysqli_fetch_array($sql9);

                echo '<p><span class="bold">Total Calories Logged Today: </span>' . $row9[3] . '</p>';

            ?>

            <!-- <div class="pieChart">
                <canvas id="myChart"></canvas>
            </div> -->
        
        </div>

    <div class="cardThree">
        <div class="bentoTitle">
            <img src="img/calendar.png" alt="calendar icon">
                <h2>Upcoming Bookings</h2>
            </div>
            <?php 
            
            $userID = $_COOKIE['id'];

            $query20 = "SELECT * FROM appointment WHERE userID='$userID' ORDER BY bookingDate asc LIMIT 1";
        
            $sql20 = mysqli_query($connection,$query20);
        
            while($row20 = mysqli_fetch_array($sql20)) {
        
                $nextBookingDate = $row20['bookingDate'];
        
                $nextBookingTime = $row20['bookingTime'];
        
                $nextBookingCoach = $row20['trainerID'];
        
                $nextBookingType = $row20['bookingType'];


                echo "<p><span class='bold'>Next Booking:</span> " . date('F j, Y', strtotime($nextBookingDate)) . ".</p>";

                // next booking time
                if($nextBookingTime==1) {
                    echo "<p><span class='bold'>Time:</span> 9AM - 9:45AM</p>";
                }
                else if($nextBookingTime==2) {
                    echo "<p><span class='bold'>Time:</span> 10AM - 10:45AM</p>";
                }
                else if($nextBookingTime==3) {
                    echo "<p><span class='bold'>Time:</span> 11AM - 11:45AM</p>";
                }
                else if($nextBookingTime==4) {
                    echo "<p><span class='bold'>Time:</span> 12PM - 12:45PM</p>";
                }
                else if($nextBookingTime==5) {
                    echo "<p><span class='bold'>Time:</span> 1PM - 1:45PM</p>";
                }
                else if($nextBookingTime==6) {
                    echo "<p><span class='bold'>Time:</span> 2PM - 2:45PM</p>";
                }
                else if($nextBookingTime==7) {
                    echo "<p><span class='bold'>Time:</span> 3PM - 3:45PM</p>";
                } else {
                    echo "<p><span class='bold'>Time:</span> 4PM - 4:45PM</p>";
                }


                // next booking coach
                echo "<p><span class='bold'>Coach:</span> Julie Baker</p>";
                // echo "<p><span class='bold'>Coach:</span> " . $nextBookingCoach . ".</p>";


                // next booking type
                // echo "<p><span class='bold'>Appointment Type:</span> " . $nextBookingType . ".</p>";

                if($nextBookingType==1) {
                    echo "<p><span class='bold'>Appointment Type</span> Initial Consultation</p>";
                }
                else if($nextBookingType==2) {
                    echo "<p><span class='bold'>Appointment Type</span> Nutrition Coaching</p>";
                }
                else if($nextBookingType==3) {
                    echo "<p><span class='bold'>Appointment Type</span> Fitness Coaching</p>";
                } else {
                    echo "<p><span class='bold'>Appointment Type</span> Recovery Coaching</p>";
                }

            }
            
            ?>

        </div>
        <div class="cardFour">
        <div class="bentoTitle">
            <img src="img/dumbbell.png" alt="dumbbell icon">
                <h2>Fitness</h2>
            </div>
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
                    echo '<p><span class="bold">Recent Strength Workout: </span>' . $strengthType . ' (' . $strengthTime . ' minutes)</p>';
                } else {
                    echo "<p>Today's Strength workout has not been logged.</p>";
                }


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
                    echo '<p><span class="bold">Recent Cardio Workout: </span>' . $cardioType . ' (' . $cardioTime . ' minutes)</p>';
                } else {
                    echo "<p>Today's Cardio workout has not been logged.</p>";
                }

            ?>

            <?php 

            if (isset($cardioTime) && isset($strengthTime)) {

                $totalMinutes = $strengthTime + $cardioTime;

                $totalHours = floor($totalMinutes / 60);
                $remainingMinutes = $totalMinutes % 60;

                if ($totalMinutes < 59) {
                    echo '<p><span class="bold">Total Workout Time: </span>' . $totalMinutes . ' minutes.</p>';
                } else if ($totalMinutes % 60 == 0) {
                    echo '<p><span class="bold">Total Workout Time: ' . $totalHours . ' hour</p>';
                }
                else {
                    echo '<p><span class="bold">Total Workout Time: </span>' . $totalHours . ' hours ' . $remainingMinutes.' minutes</p>';
                }

                $query = "SELECT * FROM athleteProfile WHERE id = '" . $_COOKIE['id'] . "'";

                $sql = mysqli_query($connection, $query);
            
                while($row = mysqli_fetch_array($sql)) {
            
                    $gender = $row['gender'];

                    $currentWeight = $row['currentWeight'];
                }

            // if (isset($_COOKIE['currentWeight'])) {

            //     // ----------------------- strength calculations

                // 125 and BELOW
                if ($currentWeight <= 125 && $gender == 'man') {
                    echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>' . ($totalCaloriesBurnedStrength = 3.5*$totalMinutes) .' calories</p>';
                } 
                else if ($currentWeight <= 125 && $gender == 'woman') {
                    echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>' . ($totalCaloriesBurnedStrength = 2.7*$totalMinutes) .' calories</p>';
                }

                // 126 - 155
                else if ($currentWeight >= 126 && $currentWeight <= 155 && $gender == 'man') {
                    echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>' . ($totalCaloriesBurnedStrength = 4.1*$totalMinutes) .' calories</p>';
                }
                else if ($currentWeight >= 126 && $currentWeight <= 155 && $gender == 'woman') {
                    echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>' . ($totalCaloriesBurnedStrength = 3.3*$totalMinutes) .' calories</p>';
                }

                // 156 - 185
                else if ($currentWeight >= 156 && $currentWeight <= 185 && $gender == 'man') {
                    echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>' . ($totalCaloriesBurnedStrength = 5.2*$totalMinutes) .' calories</p>';
                }
                else if ($currentWeight >= 156 && $currentWeight <= 185 && $gender == 'woman') {
                    echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>' . ($totalCaloriesBurnedStrength = 4.5*$totalMinutes) .' calories</p>';
                }

                // 186 - 215
                else if ($currentWeight >= 186 && $currentWeight <= 215 && $gender == 'man') {
                    echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>' . ($totalCaloriesBurnedStrength = 6.5*$totalMinutes) .' calories</p>';
                }
                else if ($currentWeight >= 186 && $currentWeight <= 215 && $gender == 'woman') {
                    echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>' . ($totalCaloriesBurnedStrength = 5.8*$totalMinutes) .' calories</p>';
                }

                // 216 and UP
                else if ($currentWeight >= 216 && $gender == 'man') {
                    echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>' . ($totalCaloriesBurnedStrength = 7.8*$totalMinutes) .' calories</p>';
                }
                else if ($currentWeight >= 216 && $gender == 'woman') {
                    echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>' . ($totalCaloriesBurnedStrength = 7.0*$totalMinutes) .' calories</p>';
                }



                // cardio calculations

                // 125 and BELOW
                if ($currentWeight <= 125 && $gender == 'man') {
                    echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: </span>' . ($totalCaloriesBurnedCardio = 6.0*$totalMinutes) . ' calories</p>';
                } 
                else if ($currentWeight <= 125 && $gender == 'woman') {
                    echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: </span>' . ($totalCaloriesBurnedCardio = 4.5*$totalMinutes) .' calories</p>';
                }

                // 126 - 155
                else if ($currentWeight >= 126 && $currentWeight <= 155 && $gender == 'man') {
                    echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: </span>' . ($totalCaloriesBurnedCardio = 7.1*$totalMinutes) .' calories</p>';
                }
                else if ($currentWeight >= 126 && $currentWeight <= 155 && $gender == 'woman') {
                    echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: </span>' . ($totalCaloriesBurnedCardio = 5.3*$totalMinutes) .' calories</p>';
                }

                // 156 - 185
                else if ($currentWeight >= 156 && $currentWeight <= 185 && $gender == 'man') {
                    echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: </span>' . ($totalCaloriesBurnedCardio = 9.0*$totalMinutes) .' calories</p>';
                }
                else if ($currentWeight >= 156 && $currentWeight <= 185 && $gender == 'woman') {
                    echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: </span>' . ($totalCaloriesBurnedCardio = 7.0*$totalMinutes) .' calories</p>';
                }

                // 186 - 215
                else if ($currentWeight >= 186 && $currentWeight <= 215 && $gender == 'man') {
                    echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: </span>' . ($totalCaloriesBurnedCardio = 11.0*$totalMinutes) .' calories</p>';
                }
                else if ($currentWeight >= 186 && $currentWeight <= 215 && $gender == 'woman') {
                    echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: </span>' . ($totalCaloriesBurnedCardio = 8.6*$totalMinutes) .' calories</p>';
                }

                // 216 and UP
                else if ($currentWeight >= 216 && $gender == 'man') {
                    echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: </span>' . ($totalCaloriesBurnedCardio = 13.0*$totalMinutes) .' calories</p>';
                }
                else if ($currentWeight >= 216 && $gender == 'woman') {
                    echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: </span>' . ($totalCaloriesBurnedCardio = 10.3*$totalMinutes) .' calories</p>';
                }

                echo'<p><span class="bold">Estimated Total Calories Burned: </span>' . $totalCaloriesBurnedStrength + $totalCaloriesBurnedCardio . ' calories</p>';
            
            // } else {
            //     echo '<p><span class="bold">Estimated Calories Burned from Strength Training: </span>Personal Details Not Set.</p>';
            //     echo '<p><span class="bold">Estimated Calories Burned from Cardio Training: Personal Details Not Set.</p>';
            //     echo '<p><span class="bold">Estimated Total Calories Burned: Unavailable Until Goals Have Been Set.</p>';
            //     echo '<a href="goals.php">Set Your Goals</a>';
            // }

        } else {
            echo "<p>Please log today's workout to see your breakdown.</p>";
            echo "<a href='fitness.php'>Log Daily Workout</a>";
}

            ?>
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
const ctx = document.getElementById('myChart');

new Chart(ctx, {
type: 'pie',
data: {
    labels: ['Protein', 'Fats','Carbs'],
    datasets: [{
    label: 'grams (g)',
    data: [<?php echo $row9[0] ?>,<?php echo $row9[1] ?>,<?php echo $row9[2] ?>],
    borderWidth: 1
    }]
},
options: {
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