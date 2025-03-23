<?php 
    $server = 'localhost';
    $username = 'brichards_coreAthleticsAdmin';
    $password = 'farri1-Myxduv-xepwoq';
    $database = 'brichards_coreAthletics';

    $connection = mysqli_connect($server,$username,$password,$database);
    if(!$connection){
        die(mysqli_connect_error());
    }
    $currentDate = date('Y-m-d');
    echo $currentDate;
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
</head>
<body>

<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="personal.php">Personal</a>
        <a href="nutrition.php">Nutrition</a>
        <a href="fitness.php">Fitness</a>
    </nav>
</header>


    <div class="dashboardGrid">
        <div class="cardOne">
            <h2>Personal Information</h2>
            <?php 
            echo "<p>Current Set Weight: " . $_COOKIE['currentWeight'] ."lbs</p>";
            echo "<p>Current Goal Weight: " . $_COOKIE['goalWeight'] ."lbs</p>";
            ?>
        </div>



        <div class="cardTwo">
            <h2>Nutrition</h2>
            <?php 
            echo "<p>Daily Calorie Goal: " . $_COOKIE['calorieGoal'] ." cal/day</p>";

            $query7 = "SELECT SUM(calories) FROM meal WHERE date='$currentDate'";

            $sql7 = mysqli_query($connection, $query7);

            while ($row7 =mysqli_fetch_array($sql7)) {
                $caloriesLogged = $row7[0];
            }

            echo "<p>Daily Calories Logged: " . $caloriesLogged . "</p>";
            ?>

            <?php 
            
            $remainingCalories = $_COOKIE['calorieGoal'] - $caloriesLogged;

            if ($remainingCalories > 0) {
                echo "<p>Remaining Calories: " . $remainingCalories . "</p>";
            } else if ($remainingCalories == 0) {
                echo "<p>" . $remainingCalories . " remaining for the day.</p>";
            } else {
                echo "<p>Remaining Calories: You have eaten: " . ($remainingCalories*(-1)) . " over your daily goal" . "</p>";
            }
            
            ?>

            <?php 
            
            $query8 = "SELECT COUNT(mealID) FROM meal WHERE date= '$currentDate'";

            $sql8 = mysqli_query($connection,$query8);

            while ($row8 = mysqli_fetch_array($sql8)) {
                $totalMeals = $row8[0];
            }

            echo "<p>Daily Meal Count: " . $totalMeals . "</p>";

            
            ?>

            <?php
                $query9 = "SELECT SUM(protein),SUM(fat),SUM(carbs),SUM(calories) FROM meal WHERE date='$currentDate'";

                $sql9 = mysqli_query($connection, $query9);

                $row9 = mysqli_fetch_array($sql9);

                echo "<p>Total Calories " . $row9[3] . "</p>";

            ?>

            <div class="pieChart">
                <canvas id="myChart"></canvas>
            </div>
        
        </div>

        <div class="cardThree">
            <h2>Upcoming Bookings</h2>
        </div>
        <div class="cardFour">
            <h2>Fitness</h2>
            <?php 
                $query4 = "SELECT 
                workouts.strengthType, 
                workouts.strengthTime, 
                workoutType.id, 
                workoutType.name 
                FROM workouts 
                INNER JOIN workoutType ON workouts.strengthType = workoutType.id";

                $sql4 = mysqli_query($connection, $query4);

                while($row4 = mysqli_fetch_array($sql4)) {

                    $strengthType = $row4['name'];

                    $strengthTime = $row4['strengthTime'];


                }

                echo "<p>Recent Strength Workout: " . $strengthType . " (" . $strengthTime . " minutes)</p>";                


                $query5 = "SELECT
                workouts.cardioType, 
                workouts.cardioTime,
                workoutType.id, 
                workoutType.name
                FROM workouts
                INNER JOIN workoutType ON workouts.cardioType = workoutType.id";

                $sql5 = mysqli_query($connection, $query5);

                while ($row5 = mysqli_fetch_array($sql5)) {
                    
                    $cardioType = $row5['name'];

                    $cardioTime = $row5['cardioTime'];
                    
                }

                echo "<p>Recent Cardio Workout: " . $cardioType . " (" . $cardioTime . " minutes)</p>";

            ?>

            <?php 

                $totalMinutes = $strengthTime + $cardioTime;

                $totalHours = floor($totalMinutes / 60);
                $remainingMinutes = $totalMinutes % 60;

                if ($totalMinutes < 59) {
                    echo "<p>Total Workout Time: " . $totalMinutes . " minutes.</p>";
                } else if ($totalMinutes % 60 == 0) {
                    echo "<p>Total Workout Time: " . $totalHours . " hour</p>";
                }
                else {
                    echo "<p>Total Workout Time: " . $totalHours . " hours " . $remainingMinutes." minutes</p>";
                }


                $gender = 'man'; // make in cookie

                // ----------------------- strength calculations

                // 125 and BELOW
                if ($_COOKIE['currentWeight'] <= 125 && $gender == 'man') {
                    echo "<p>Estimated Calories Burned from Strength Training: " . ($totalCaloriesBurnedStrength = 3.5*$totalMinutes) ." calories</p>";
                } 
                else if ($_COOKIE['currentWeight'] <= 125 && $gender == 'woman') {
                    echo "<p>Estimated Calories Burned from Strength Training: " . ($totalCaloriesBurnedStrength = 2.7*$totalMinutes) ." calories</p>";
                }

                // 126 - 155
                else if ($_COOKIE['currentWeight'] >= 126 && $_COOKIE['currentWeight'] <= 155 && $gender == 'man') {
                    echo "<p>Estimated Calories Burned from Strength Training: " . ($totalCaloriesBurnedStrength = 4.1*$totalMinutes) ." calories</p>";
                }
                else if ($_COOKIE['currentWeight'] >= 126 && $_COOKIE['currentWeight'] <= 155 && $gender == 'woman') {
                    echo "<p>Estimated Calories Burned from Strength Training: " . ($totalCaloriesBurnedStrength = 3.3*$totalMinutes) ." calories</p>";
                }

                // 156 - 185
                else if ($_COOKIE['currentWeight'] >= 156 && $_COOKIE['currentWeight'] <= 185 && $gender == 'man') {
                    echo "<p>Estimated Calories Burned from Strength Training: " . ($totalCaloriesBurnedStrength = 5.2*$totalMinutes) ." calories</p>";
                }
                else if ($_COOKIE['currentWeight'] >= 156 && $_COOKIE['currentWeight'] <= 185 && $gender == 'woman') {
                    echo "<p>Estimated Calories Burned from Strength Training: " . ($totalCaloriesBurnedStrength = 4.5*$totalMinutes) ." calories</p>";
                }

                // 186 - 215
                else if ($_COOKIE['currentWeight'] >= 186 && $_COOKIE['currentWeight'] <= 215 && $gender == 'man') {
                    echo "<p>Estimated Calories Burned from Strength Training: " . ($totalCaloriesBurnedStrength = 6.5*$totalMinutes) ." calories</p>";
                }
                else if ($_COOKIE['currentWeight'] >= 186 && $_COOKIE['currentWeight'] <= 215 && $gender == 'woman') {
                    echo "<p>Estimated Calories Burned from Strength Training: " . ($totalCaloriesBurnedStrength = 5.8*$totalMinutes) ." calories</p>";
                }

                // 216 and UP
                else if ($_COOKIE['currentWeight'] >= 216 && $gender == 'man') {
                    echo "<p>Estimated Calories Burned from Strength Training: " . ($totalCaloriesBurnedStrength = 7.8*$totalMinutes) ." calories</p>";
                }
                else if ($_COOKIE['currentWeight'] >= 216 && $gender == 'woman') {
                    echo "<p>Estimated Calories Burned from Strength Training: " . ($totalCaloriesBurnedStrength = 7.0*$totalMinutes) ." calories</p>";
                }



                // cardio calculations

                // 125 and BELOW
                if ($_COOKIE['currentWeight'] <= 125 && $gender == 'man') {
                    echo "<p>Estimated Calories Burned from Cardio Training: " . ($totalCaloriesBurnedCardio = 6.0*$totalMinutes) ." calories</p>";
                } 
                else if ($_COOKIE['currentWeight'] <= 125 && $gender == 'woman') {
                    echo "<p>Estimated Calories Burned from Cardio Training: " . ($totalCaloriesBurnedCardio = 4.5*$totalMinutes) ." calories</p>";
                }

                // 126 - 155
                else if ($_COOKIE['currentWeight'] >= 126 && $_COOKIE['currentWeight'] <= 155 && $gender == 'man') {
                    echo "<p>Estimated Calories Burned from Cardio Training: " . ($totalCaloriesBurnedCardio = 7.1*$totalMinutes) ." calories</p>";
                }
                else if ($_COOKIE['currentWeight'] >= 126 && $_COOKIE['currentWeight'] <= 155 && $gender == 'woman') {
                    echo "<p>Estimated Calories Burned from Cardio Training: " . ($totalCaloriesBurnedCardio = 5.3*$totalMinutes) ." calories</p>";
                }

                // 156 - 185
                else if ($_COOKIE['currentWeight'] >= 156 && $_COOKIE['currentWeight'] <= 185 && $gender == 'man') {
                    echo "<p>Estimated Calories Burned from Cardio Training: " . ($totalCaloriesBurnedCardio = 9.0*$totalMinutes) ." calories</p>";
                }
                else if ($_COOKIE['currentWeight'] >= 156 && $_COOKIE['currentWeight'] <= 185 && $gender == 'woman') {
                    echo "<p>Estimated Calories Burned from Cardio Training: " . ($totalCaloriesBurnedCardio = 7.0*$totalMinutes) ." calories</p>";
                }

                // 186 - 215
                else if ($_COOKIE['currentWeight'] >= 186 && $_COOKIE['currentWeight'] <= 215 && $gender == 'man') {
                    echo "<p>Estimated Calories Burned from Cardio Training: " . ($totalCaloriesBurnedCardio = 11.0*$totalMinutes) ." calories</p>";
                }
                else if ($_COOKIE['currentWeight'] >= 186 && $_COOKIE['currentWeight'] <= 215 && $gender == 'woman') {
                    echo "<p>Estimated Calories Burned from Cardio Training: " . ($totalCaloriesBurnedCardio = 8.6*$totalMinutes) ." calories</p>";
                }

                // 216 and UP
                else if ($_COOKIE['currentWeight'] >= 216 && $gender == 'man') {
                    echo "<p>Estimated Calories Burned from Cardio Training: " . ($totalCaloriesBurnedCardio = 13.0*$totalMinutes) ." calories</p>";
                }
                else if ($_COOKIE['currentWeight'] >= 216 && $gender == 'woman') {
                    echo "<p>Estimated Calories Burned from Cardio Training: " . ($totalCaloriesBurnedCardio = 10.3*$totalMinutes) ." calories</p>";
                }

                echo "<p>Estimated Total Calories Burned: " . $totalCaloriesBurnedStrength + $totalCaloriesBurnedCardio . " calories</p>";

            ?>
        </div>
    </div>

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