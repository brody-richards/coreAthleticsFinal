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
    <nav>
        <a href="index.php">Home</a>
        <a href="personal.php">Personal</a>
        <a href="nutrition.php">Nutrition</a>
        <a href="fitness.php">Fitness</a>
    </nav>
</header>

<h1>Fitness</h1>
<p>Add Your Daily Workout</p>

<div class="container">
    <form action="fitnessResult.php" method="POST">
        
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
    

</body>
</html>