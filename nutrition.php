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
    <title>Nutrition | Core Athletics
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

<h1>Nutrition</h1>
<p>Add a meal for the day.</p>

<div class="container">
<form action="nutritionResult.php" method="POST">

    <label for="carbs" class="form-label">Total Carbs:</label>
    <div class="input-group">
        <div class="input-group-text">Grams</div>
        <input type="number" id="carbs" name="carbs" step="1" min="0" class="form-control">
    </div>

    <label for="fats" class="form-label">Total Fats:</label>
    <div class="input-group">
        <div class="input-group-text">Grams</div>
        <input type="number" id="fats" name="fats" step="1" min="0" class="form-control">
    </div>

    <label for="protein" class="form-label">Total Protein:</label>
    <div class="input-group">
        <div class="input-group-text">Grams</div>
        <input type="number" id="protein" name="protein" step="1" min="0" class="form-control">
    </div>

    <input type="submit" label="Submit Meal Entry">

</form>

</div>

    

</body>
</html>