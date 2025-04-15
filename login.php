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
    <title>Login | Core Athletics
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="loginSignupGrid">
    <div class="loginSignupLeft">
        <img class="card-img-top" src="img/mainLogoGreen.svg" alt="Card image cap">
    </div>

    <div class="loginSignupRight">
        <h1 class="card-title">Login</h1>

        <form action="loginresult.php" method="POST">

        <div class="formElement">
            <label for="email" class="form-label">Email:</label>
            <div class="input-group">
                <input type="text" id="email" name="email" class="form-control" required>
            </div>
        </div>

        <div>
            <label for="password" class="form-label">Password:</label>
            <div class="input-group">
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
        </div>

            <input type="submit" value="Login" class="btn btn-light btn-lg mt-4">
        </form>

        <div class="loginSignupOption">
            <p>No account? <a href="signup.php" class="btn btn-outline-light pr-2">Sign Up</a></p>
        </div>
    </div>
</div>

</body>
</html>