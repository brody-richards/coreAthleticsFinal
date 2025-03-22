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
    <title>Personal | Core Athletics</title>
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

<h1>Personal</h1>
<p>Update Your Personal Information</p>

<div class="peronalForm">
    <form action="personalResult.php" method="POST">

    <div class="calorieGoal">
        <label for="calorieGoal">Change Daily Calorie Goal:</label>
        <input type="number" id="calorieGoal" name="calorieGoal" step="1" min="0">
        <?php echo "<p>Current Calorie Goal: " . $_COOKIE['calorieGoal'] ." cal/day</p>"?>
        </div>
    </div>

    <div class="currentWeight">
        <label for="currentWeight">Set Your Current Weight:</label>
        <input type="number" id="currentWeight" name="currentWeight" step="1" min="0">
        <?php echo "<p>Current Set Weight: " . $_COOKIE['currentWeight'] ."lbs</p>"?>
    </div>

    <div class="goalWeight">
        <label for="goalWeight">Set Your Goal Weight:</label>
        <input type="number" id="goalWeight" name="goalWeight" step="1" min="0">
        <?php echo "<p>Current Goal Weight: " . $_COOKIE['goalWeight'] ."lbs</p>"?>
        </div>
    </div>

    <input type="submit" value="Save Personal Information">


    </form>
</div>

</body>
</html>