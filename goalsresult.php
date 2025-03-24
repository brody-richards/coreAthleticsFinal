<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $calorieGoal = $_POST['calorieGoal'];
        $currentWeight = $_POST['currentWeight'];
        $goalWeight = $_POST['goalWeight'];

    setcookie('calorieGoal',$calorieGoal,strtotime("+1 year"),"/");
    setcookie('currentWeight',$currentWeight,strtotime("+1 year"),"/");
    setcookie('goalWeight',$goalWeight,strtotime("+1 year"),"/");

    header("Location: goalsresult.php");
    exit();
}
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
            <a href="#" class="navbar-brand">Brand</a>
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
        </div>
    </nav>
</header>

<h1>Personal</h1>
<p>Your changes.</p>

<?php 

if (isset($_COOKIE['calorieGoal'])) {
    echo "<p>Your new calorie goal is " . $_COOKIE['calorieGoal']."</p>";
} else {
    echo "<p>Your calorie goal remains the same.</p>";
}

if (isset($_COOKIE['currentWeight'])) {
    echo "<p>Your new current weight is " . $_COOKIE['currentWeight']."</p>";
} else {
    echo "<p>Your weight remains the same.</p>";
}

if (isset($_COOKIE['goalWeight'])) {
    echo "<p>Your new goal weight is " . $_COOKIE['goalWeight']."</p>";
} else {
    echo "<p>Your goal weight remains the same.</p>";
}

?>

<a href="index.php">View My Dashboard</a>

</div>

</body>
</html>