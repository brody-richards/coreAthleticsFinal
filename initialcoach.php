<?php 
    $server = 'localhost';
    $username = 'brichards_coreAthleticsAdmin';
    $password = 'farri1-Myxduv-xepwoq';
    $database = 'brichards_coreAthletics';

    $connection = mysqli_connect($server,$username,$password,$database);
    if(!$connection){
        die(mysqli_connect_error());
    }

    $bookingType = 1;
    setcookie('bookingType', $bookingType, strtotime("+1 year"), "/");
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
<nav class="navbar navbar-expand border-bottom border-body" style="background-color: #07402B;" data-bs-theme="dark">

        <div class="container">
            <img src="img/logoText.svg" alt="main logo in navbar" lass="navbar-brand" width="200" height="50">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link" aria-current="dashboard page">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Coaching</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="coachoverview.php">Overview</a>
                        <a class="dropdown-item" href="bookcoach.php">Book a Coach</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="goals.php">Goals</a>
                        <a class="dropdown-item" href="settings.php">Settings</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nutrition</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="nutritionoverview.php">Overview</a>
                        <a class="dropdown-item" href="nutrition.php">Add a Meal</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fitness</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="fitnessoverview.php">Overview</a>
                        <a class="dropdown-item" href="fitness.php">Add a Workout</a>
                    </div>
                </li>
            </ul>
            <div class="buttons">
                <a href="logout.php" class="btn btn-light">Logout</a>
        </div>
    </nav>
</header>

<main>
<!-- 
<section>
    <div class="coachingBox">
        <div class="coachingBoxLeft">
            <h1>Initial Consultation</h1>
            <h2>Who is it for?</h2>
            <p>For athletes who want to work with a nutritionist to create personalized meal plans tailored to their specific fitness goals.</p>

            <h2>What's Included?</h2>
            <h3>Tailored Meal Planning</h3>
            <p>Work with a nutritionist to develop a meal plan that aligns with your training and fitness goals.</p>

            <h3>Guidance on Dietary Restrictions</h3>
            <p>Receive expert guidance on how to work around hurtles like food allergies, intolerance, and dietary preferences without compromising athletic performance.</p>

            <h3>Nutrition Education & Athletic Performance</h3>
            <p>Learn how essential nutrition principles, such as caloric deficits, surpluses, intermittent fasting, and others, can enhance athletic performance.</p>
        </div>

        <div class="coachingBoxRight">
            <div class="coachingBoxRightBorder">
                <h3>Book a Fitness Coach:</h3>

                <div class="coachForm container">
                    <form action="checkcoach.php" method="POST">
                        <label for="date">Select a Date:</label>
                        <input type="date" id="date" name="date">

                        <input type="submit" label="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> -->

<div class="container min-vh-100 d-flex align-items-center">
        <div class="coachBox">
                <div class="left">
                    <div class="title">
                        <img src="img/nutrition.png" alt="nutrition coaching symbol" width="60" height="60">
                        <h1>Initial Consultation</h1>
                    </div>

                        <div class="intro my-5">
                            <h2>Who is it for?</h2>
                            <p>For new clients who want to learn about all the benefits that Core Athletics has to offer, and why they are the right choice for their nutrition and fitness journey.</p>
                        </div>

                        <div class="goalTitle my-4">
                            <h2>What's Included?</h2>
                        </div>

                        <div class="goalOne">
                            <h3>Coaching Process</h3>
                            <p>Our coaches will break down the process that has built this company.</p>
                        </div>

                        <div class="goalTwo my-4">
                            <h3>Benefit Analysis</h3>
                            <p>Receive a complete breakdown of the benefits you will receive by joining Core Athletics.</p>
                        </div>

                        <div class="goalThree my-4">
                            <h3>Plan Draft</h3>
                            <p>Our coaches will draft a plan to get you started on your fitness journey.</p>
                        </div>
                </div>

                <div class="d-flex align-items-center justify-content-center flex-column">
                    <div class="right">
                        <h3>Book an Initial Consultation:</h3>

                        <div class="coachForm container">
                            <form action="checkcoach.php" method="POST">
                                <label for="date">Select a Date:</label>
                                <input type="date" id="date" name="date">

                                <input type="submit" label="Submit">
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


<footer class="text-white text-center py-3 mt-auto" style="background-color: #07402B;">
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