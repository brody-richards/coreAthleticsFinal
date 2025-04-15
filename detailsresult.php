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
<nav class="navbar navbar-expand border-bottom border-body" style="background-color: #07402B;" data-bs-theme="dark">

        <div class="container">
            <img src="img/logoText.svg" alt="main logo in navbar" lass="navbar-brand" width="200" height="50">
        </div>
    </nav>
</header>

<main>
    <div class="signUpBox my-5">
        <h1>All Personal Information.</h1>
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

            echo "<p><strong class='bold'>Email: </strong>" . $email . "</p>";
            echo "<p><strong class='bold'>First Name: </strong>" . $firstName . "</p>";
            echo "<p><strong class='bold'>Last Name: </strong>" . $lastName . "</p>";
            echo "<p><strong class='bold'>Birthday: </strong>" . $birthday . "</p>";
            echo "<p><strong class='bold'>Gender: </strong>" . $gender . "</p>";
            echo "<p><strong class='bold'>Password: </strong>" . $password . "</p>";

            echo "<p><strong class='bold'>Daily Calorie Goal: </strong>" . $calorieGoal . "</p>";
            echo "<p><strong class='bold'>Current Weight: </strong>" . $currentWeight . "</p>";
            echo "<p><strong class='bold'>Goal Weight: </strong>" . $goalWeight . "</p>";

        ?>

        <a href="index.php" class="btn btn-dark btn-lg btn-block my-3" style="background-color: #0d7a52">View My Dashboard</a>
        </div>
    </div>
</main>

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