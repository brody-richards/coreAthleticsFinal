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

    $currentDate = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaching Overview | Core Athletics
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
<nav class="navbar navbar-expand border-bottom border-body" style="background-color: #07402B;" data-bs-theme="dark">
        <div class="container">
            <img src="img/logoText.svg" alt="main logo in navbar" class="navbar-brand" width="200" height="50">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link" aria-current="true">Dashboard</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" id="coachDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Coaching</a>
                    <div class="dropdown-menu" aria-labelledby="coachDropdown">
                    <a class="dropdown-item" href="coachoverview.php">Overview</a>
                        <a class="dropdown-item" href="bookcoach.php">Book a Coach</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                    <div class="dropdown-menu" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="goals.php">Goals</a>
                        <a class="dropdown-item" href="settings.php">Settings</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="nutritionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Nutrition</a>
                    <div class="dropdown-menu" aria-labelledby="nutritionDropdown">
                        <a class="dropdown-item" href="nutritionoverview.php">Overview</a>
                        <a class="dropdown-item" href="nutrition.php">Add a Meal</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="fitnessDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fitness</a>
                    <div class="dropdown-menu" aria-labelledby="fitnessDropdown">
                        <a class="dropdown-item" href="fitnessoverview.php">Overview</a>
                        <a class="dropdown-item" href="fitness.php">Add a Workout</a>
                    </div>
                </li>
            </ul>
            <div class="buttons">
                <a href="logout.php" class="btn btn-light">Logout</a>
            </div>
        </div>
    </nav>
</header>

<main>

<div class="introBox">
    <?php 
    $query = "SELECT * FROM athleteProfile WHERE id = '" . $_COOKIE['id'] . "'";

    $sql = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($sql)) {

        $firstName = $row['firstName'];
    }
                
    echo "<p><strong class='bold'>Coaching Overview</strong></p>";
    echo "<p><strong class='bold'>Today's Date: </strong>" . date('F j, Y', strtotime($currentDate)) . "</p>";
    ?>
</div>

<div class="bookCoachTitle">
    <h1>Book a Coach</h1>
    <p>Choose a specific session to book.</p>
</div>

<div class="bookCoach">

    <a href="initialcoach.php" class="coachTag">
        <div class="initialCoach">
        <h2>Initial Consultation</h2>
            <div class="coachIcon">
                <img src="img/talk.png" alt="nutrition coaching symbol" width="60" height="60">
            </div>
            <p>The perfect starting point for new clients who want to explore the benefits of Core Athletics. Our Coaches are trained to be professional, friendly, and supportive as our clients start their fitness journey.</p>
            <p>During this session, we will walk you through our coaching process, explain the benefits, and show you why we are the right choice for you.</p>
        </div>
    </a>

    <a href="nutritioncoach.php" class="coachTag">
        <div class="nutritionCoach">
            <h2>Nutrition Coaching</h2>
            <div class="coachIcon">
                <img src="img/nutrition.png" alt="nutrition coaching symbol" width="60" height="60">
            </div>

            <div class="coachText">
                <p>For athletes who want to work with a nutritionist to create personalized meal plans tailored to their specific fitness goals.</p>
                <p>During this session, our coaches will help provide guidance on any dietary restrictions, help teach good nutrition practices, as well as optimize athletic performance.</p>
            </div>
        </div>
    </a>

    <a href="fitnesscoach.php" class="coachTag">
        <div class="fitnessCoach">
        <h2>Fitness Coaching</h2>
            <div class="coachIcon">
                <img src="img/dumbbell.png" alt="fitness coaching symbol" width="60" height="60">
            </div>
            <p>For athletes who want to work with a trainer to create personalized workouts tailored to their specific fitness goals, with an emphasis on teaching proper technique to help avoid injuries.</p>
            <p>During this session, our coaches can help provide guidance by assessing fitness levels, understanding individual goals, and offer motivational support.</p>
        </div>
    </a>

    <a href="recoverycoach.php" class="coachTag">
        <div class="recoveryCoach">
        <h2>Recovery Coaching</h2>
            <div class="coachIcon">
                <img src="img/exercising.png" alt="nutrition coaching symbol" width="60" height="60">
            </div>
            <p>For athletes who suffer from injury, muscle strains, or anything else they might be dealing with.</p>
            <p>During this session, our coaches help by providing expert guidance through this stressful time. We offer our athletes alternative workouts and recovery techniques to support your healing journey, with a goal of getting you feeling both physically and mentally healthy.</p>
        </div>
    </a>
</div>

</main>


<footer>
<div class="footerFlex">
    <div class="footerLeft">
        <img src="img/mail.png" alt="" width="50">
        <p>core@athletics.com</p>
    </div>

    <div class="footerMiddle">
        <img src="img/Facebook_Logo_Secondary.png" alt="" width="50">
        <img src="img/Instagram_Glyph_White.png" alt="" width="50">
        <img src="img/InBug-White.png" alt="" width="50">
    </div>

    <div class="footerRight">
        <p>Privacy Policy</p>
        <p>Terms & Conditions</p>
    </div>
</div>
</footer>
    
</body>
</html>