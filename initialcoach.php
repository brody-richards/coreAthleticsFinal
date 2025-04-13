<?php 
    $server = 'localhost';
    $username = 'brichards_coreAthleticsAdmin';
    $password = 'farri1-Myxduv-xepwoq';
    $database = 'brichards_coreAthletics';

    $connection = mysqli_connect($server,$username,$password,$database);
    if(!$connection){
        die(mysqli_connect_error());
    }
    $tomorrow = date('Y-m-d', strtotime('+1 day'));

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
<nav class="navbar navbar-expand bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <a href="#" class="navbar-brand">Core Athletics</a>
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a href="index.php" class="nav-link" aria-current="dashboard page">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Coaching</a>
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
                <a href="login.php" class="btn btn-light">Login</a>
                <a href="signup.php" class="btn btn-outline-light">Sign Up</a>
            </div>
        </div>
    </nav>
</header>

<main>

<div class="container min-vh-100 d-flex align-items-center">
        <div class="coachBox">
                <div class="left">
                    <div class="title">
                        <img src="img/talk.png" alt="Initial consultation symbol" width="60" height="60">
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
                                <div class="coachFormDate">
                                    <label for="date">Select a Date:</label>
                                    <input type="date" id="date" name="date" min="<?php echo $tomorrow ?>" required>
                                </div>

                                <div class="coachFormButton">
                                    <input type="submit" class="btn btn-light btn-lg btn-block" label="Book Time" id="submitButton">
                                </div>
                            </form>
                    </div>
                </div>
            </div>
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

<script>

const dateSelection = document.getElementById('date');
const submitButton = document.getElementById('submitButton');

dateSelection.addEventListener('input', () => {
    const selectedDate = new Date(dateSelection.value);
    const day = selectedDate.getUTCDay();
        
        if (dateSelection.value && day !== 0 && day !== 6) {
        submitButton.disabled = false;
        } else {
        submitButton.disabled = true;
        }
    });

</script>