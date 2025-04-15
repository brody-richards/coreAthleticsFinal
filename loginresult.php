<?php 
    $server = 'localhost';
    $username = 'brichards_coreAthleticsAdmin';
    $password = 'farri1-Myxduv-xepwoq';
    $database = 'brichards_coreAthletics';

    $connection = mysqli_connect($server,$username,$password,$database);
    if(!$connection){
        die(mysqli_connect_error());
    }


    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $password = mysqli_real_escape_string($connection, $_POST['password']);


    $query11 = "SELECT * FROM athleteProfile WHERE email = '$email' and password = '$password'";

    $sql11 = mysqli_query($connection, $query11);

    $row = mysqli_fetch_array($sql11);

    if ($row) {
    $id = $row['id'];
    setcookie('id', $id, strtotime("+1 year"), "/");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Core Athletics
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

    <div class="loginBox my-5">
        <?php
            if ($row >= 1) {
                echo "<h1>Login Successful</h1>"; 
                echo "<a href='index.php' class='btn btn-dark btn-lg btn-block my-3' style='background-color: #0d7a52'>Go to your dashboard</a>";
            } else {
                echo "<h1>Login Failed.</h1>";
                echo "<a href='login.php' class='btn btn-warning my-3'>Try again?</a>";
            }
        ?>

    </div>

</main>    

</body>
</html>