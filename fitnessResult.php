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


<?php 

    $userID = 1;
    $date = date('Y-m-d H:i:s');

    // $userID - get from cookie
    $userID = mysqli_real_escape_string($connection, $userID);

    $date = mysqli_real_escape_string($connection, $date);

    $strengthType = mysqli_real_escape_string($connection, $_POST['strengthType']);

    $strengthTime = mysqli_real_escape_string($connection, $_POST['strengthTime']);

    $cardioType = mysqli_real_escape_string($connection, $_POST['cardioType']);

    $cardioTime = mysqli_real_escape_string($connection, $_POST['cardioTime']);

    $query3 = "INSERT INTO workouts (userID,date,strengthType,strengthTime,cardioType,cardioTime) VALUES ('$userID','$date','$strengthType','$strengthTime','$cardioType','$cardioTime')";

    $sql3 = mysqli_query($connection,$query3);

    
    if ($sql3) {
        echo "<p>Workout Successfully Logged</p>";
    } else {
        echo "<p>Workout Not Logged, Please Try Again.</p>";
        echo mysqli_error($connection);
    }
?>

    <a href="fitness.php">View My Dashboard</a>


    

</body>
</html>