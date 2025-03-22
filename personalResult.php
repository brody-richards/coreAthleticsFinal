<?php 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $calorieGoal = $_POST['calorieGoal'];
        $currentWeight = $_POST['currentWeight'];
        $goalWeight = $_POST['goalWeight'];
    }
    setcookie('calorieGoal',$calorieGoal,strtotime("+1 year"));
    setcookie('currentWeight',$currentWeight,strtotime("+1 year"));
    setcookie('goalWeight',$goalWeight,strtotime("+1 year"));
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
    <nav>
        <a href="index.php">Home</a>
        <a href="personal.php">Personal</a>
        <a href="nutrition.php">Nutrition</a>
        <a href="fitness.php">Fitness</a>
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

</div>

</body>
</html>