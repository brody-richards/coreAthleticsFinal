<?php 
    $server = 'localhost';
    $username = 'brichards_coreAthleticsAdmin';
    $password = 'farri1-Myxduv-xepwoq';
    $database = 'brichards_coreAthletics';

    $connection = mysqli_connect($server,$username,$password,$database);
    if(!$connection){
        die(mysqli_connect_error());
    }

        // add
        
        $calorieGoal = mysqli_real_escape_string($connection, $_POST['calorieGoal']);
    
        $currentWeight = mysqli_real_escape_string($connection, $_POST['currentWeight']);
        
        $goalWeight = mysqli_real_escape_string($connection, $_POST['goalWeight']);

        $id = $_COOKIE['id'];
        
        $query10 = "UPDATE athleteProfile SET calorieGoal='$calorieGoal', currentWeight='$currentWeight', goalWeight='$goalWeight' WHERE id='$id'";
        
        $sql10 = mysqli_query($connection, $query10);

        // setcookie('calorieGoal',$calorieGoal,strtotime("+1 year"),"/");
        // setcookie('currentWeight',$currentWeight,strtotime("+1 year"),"/");
        // setcookie('goalWeight',$goalWeight,strtotime("+1 year"),"/");

        // header("Location: detailsresult.php");
        // exit();
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
<nav class="navbar navbar-expand bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <a href="#" class="navbar-brand">Core Athletics</a>
            <ul class="navbar-nav">
        </div>
    </nav>
</header>

<div class="container">
<h1>All Information.</h1>
<p>Verify the following information.</p>

<?php 

    $query12 = "SELECT * FROM athleteProfile WHERE id = '" . $_COOKIE['id'] . "'";

    $sql12 = mysqli_query($connection, $query12);

    while($row5 = mysqli_fetch_array($sql12)) {
        
        $email = $row5['email'];

        $firstName = $row5['firstName'];

        $lastName = $row5['lastName'];

        $birthday = $row5['birthday'];

        $gender = $row5['gender'];

        $password = $row5['password'];
    }

    echo "<p>Email: " . $email . "</p>";
    echo "<p>First Name: " . $firstName . "</p>";
    echo "<p>Last Name: " . $lastName . "</p>";
    echo "<p>Birthday: " . $birthday . "</p>";
    echo "<p>Gender: " . $gender . "</p>";
    echo "<p>Password: " . $password . "</p>";

    echo "<p>Daily Calorie Goal: " . $calorieGoal . "</p>";
    echo "<p>Current Weight: " . $currentWeight . "</p>";
    echo "<p>Goal Weight: " . $goalWeight . "</p>";


    // if (isset($_COOKIE['calorieGoal'])) {
    //     echo "<p>Your new calorie goal is " . $_COOKIE['calorieGoal']."</p>";
    // } else {
    //     echo "<p>Your calorie goal remains the same.</p>";
    // }

    // if (isset($_COOKIE['currentWeight'])) {
    //     echo "<p>Your new current weight is " . $_COOKIE['currentWeight']."</p>";
    // } else {
    //     echo "<p>Your weight remains the same.</p>";
    // }

    // if (isset($_COOKIE['goalWeight'])) {
    //     echo "<p>Your new goal weight is " . $_COOKIE['goalWeight']."</p>";
    // } else {
    //     echo "<p>Your goal weight remains the same.</p>";
    // }



?>

<a href="index.php">View My Dashboard</a>
</div>
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