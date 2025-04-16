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

    // add signup information to db
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $firstName = mysqli_real_escape_string($connection, $_POST['firstName']);
    
    $lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
    
    $birthday = mysqli_real_escape_string($connection, $_POST['birthday']);

    $gender = mysqli_real_escape_string($connection, $_POST['gender']);
    
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    
    $query10 = "INSERT INTO athleteProfile (email,firstName,lastName,birthday,gender,password) VALUES ('$email','$firstName','$lastName','$birthday','$gender','$password')";
    
    $sql10 = mysqli_query($connection, $query10);


    // get id based on email from form
    $query13 = "SELECT * FROM athleteProfile WHERE email='$email'";

    $sql13 = mysqli_query($connection,$query13);

    $row13 = mysqli_fetch_array($sql13);

    $id = $row13['id'];

    setcookie('id', $id, strtotime("+1 year"), "/");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Goal Information | Core Athletics
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
        </div>
    </nav>
</header>

<main>

    <div class="signUpBox my-5">
        <h1>Goal Settings</h1>
        <form action="detailsresult.php" method="POST">

        <label for="calorieGoal" class="form-label">Daily Calorie Goal:</label>
        <div class="input-group">
            <div class="input-group-text">Calories</div>
            <input type="number" id="calorieGoal" name="calorieGoal" step="1" min="0" class="form-control" required>
        </div>


        <label for="currentWeight" class="form-label">Current Weight:</label>
        <div class="input-group">
            <div class="input-group-text">lbs</div>
            <input type="number" id="currentWeight" name="currentWeight" step="1" min="0" class="form-control" required>
        </div>

        <label for="currentWeight" class="form-label">Goal Weight:</label>
        <div class="input-group">
            <div class="input-group-text">lbs</div>
            <input type="number" id="goalWeight" name="goalWeight" step="1" min="0" class="form-control" required>
        </div>

        <div class="personalButton">
            <input type="submit" value="Save Personal Information" class="btn btn-dark btn-lg btn-block my-3" style="background-color: #0d7a52">
        </div>

        </form>
    </div>

</main>

</body>
</html>