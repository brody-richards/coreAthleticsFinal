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

<!-- <header>
<nav class="navbar navbar-expand bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <a href="#" class="navbar-brand">Core Athletics</a>
            <ul class="navbar-nav">
        </div>
    </nav>
</header> -->

<!-- <div class="container">
    <div class="loginContainer">
        <img src="img/mainLogoGreen.svg" alt="main logo">
        <h1>Login</h1>
        <p>Add your account information.</p>

        <form action="loginresult.php" method="POST">

        <label for="email" class="form-label">Email:</label>
        <div class="input-group">
            <input type="text" id="email" name="email" class="form-control">
        </div>

        <label for="password" class="form-label">Password:</label>
        <div class="input-group">
            <input type="text" id="password" name="password" class="form-control">
        </div>

        <input type="submit" label="Login">
    </form>

        <a href="signup.php">Sign Up</a>
    </div>
</div> -->

<!-- <div class="container-fluid loginBox d-flex justify-content-center align-items-center">
    <div class="card">
        <div class="mainLogo d-flex justify-content-center">
            <img class="card-img-top" src="img/mainLogoGreen.svg" alt="Card image cap">
        </div>
        <div class="card-body">
            <h1 class="card-title">Login</h1>

            <form action="loginresult.php" method="POST">

                <label for="email" class="form-label">Email:</label>
                <div class="input-group">
                    <input type="text" id="email" name="email" class="form-control">
                </div>

                <label for="password" class="form-label">Password:</label>
                <div class="input-group">
                    <input type="text" id="password" name="password" class="form-control">
                </div>

                <input type="submit" value="Login" class="btn btn-light btn-lg mt-4">
            </form>

            <div class="signUpOption">
                <p>No account? <a href="signup.php" class="btn btn-outline-light pr-2">Sign Up</a></p>
            </div>
        </div>
    </div>
</div> -->


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
                <input type="text" id="email" name="email" class="form-control">
            </div>
        </div>

        <div>
            <label for="password" class="form-label">Password:</label>
            <div class="input-group">
                <input type="password" id="password" name="password" class="form-control">
            </div>
        </div>

            <input type="submit" value="Login" class="btn btn-light btn-lg mt-4">
        </form>

        <div class="loginSignupOption">
            <p>No account? <a href="signup.php" class="btn btn-outline-light pr-2">Sign Up</a></p>
        </div>
    </div>
</div>

<!-- <footer class="bg-dark text-white text-center py-3 mt-auto">
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
        </footer> -->
    

</body>
</html>