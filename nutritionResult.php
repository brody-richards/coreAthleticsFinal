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

<?php 

    $userID = 1;
    $date = date('Y-m-d H:i:s');

    $userID = mysqli_real_escape_string($connection, $userID);

    $date = mysqli_real_escape_string($connection, $date);

    $protein = mysqli_real_escape_string($connection, $_POST['protein']);

    $fats = mysqli_real_escape_string($connection, $_POST['fats']);

    $carbs = mysqli_real_escape_string($connection, $_POST['carbs']);

    $calories = ($protein * 4) + ($carbs * 4) + ($fats * 9);


    $query6 = "INSERT INTO meal (userID,date,calories,protein,fat,carbs) VALUES ('$userID','$date','$calories','$protein','$fats','$carbs')";

    $sql6 = mysqli_query($connection,$query6);

    if ($sql6) {
        echo "<p>Meal successfully logged.</p>";
        echo "<p>Total meal calories: " . $calories . "calories.</p>";
        echo "<p>This meal will be added to your dashboard.</p>";
    } else {
        echo "<p>Meal not logged, please try again.</p>";
        echo mysqli_error($connection);
    }
?>

<a href="nutrition.php">View Dashboard.</a>

    

</body>
</html>