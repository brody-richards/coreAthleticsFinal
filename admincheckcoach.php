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

    $bookingDate = mysqli_real_escape_string($connection, $_POST['date']);

    setcookie('bookingDate', $bookingDate, strtotime("+1 year"), "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Coach Check | Core Athletics
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
            <div class="buttons">
                <a href="logout.php" class="btn btn-light">Logout</a>
            </div>
        </div>
    </nav>
</header>

<main>

<section class="appointmentDetails">

<div class="container">
    <div class="coachCheckBox">
        <h1>Booking Information</h1>
        <p>Add and verify the following details.</p>

        <h2>Appointment Details</h2>

        <div class="coachCheckDate">
            <p><strong class="bold">Date: </strong><?php echo date('F j, Y', strtotime($_POST['date'])); ?> </p>
            <form action="admincoachresult.php" method="POST">

            <div class="my-3">
                <label for="time">Select a Time:</label>
                <select name="time" id="time" class="form-select" required>
                <option value="" disabled selected>Select a Time:</option>

                    <?php 

                    $bookingDate = $_POST['date'];
                    
                    $query14 = "SELECT appointmentTimes.id,appointmentTimes.name FROM appointmentTimes LEFT JOIN appointment ON appointmentTimes.id = appointment.bookingTime AND appointment.bookingDate = '$bookingDate' WHERE appointment.bookingTime IS NULL";

                    $sql14 = mysqli_query($connection,$query14);

                    while ($row14 = mysqli_fetch_array($sql14)) {
                        echo "<option value='" . $row14['id'] . "'>" . $row14['name'] . "</option>"; 
                    }

                    ?>
                </select>
            </div>

            <div class="my-3">
                <label for="client">Select a Client:</label>
                <select name="client" id="client" class="form-select" required>
                <option value="" disabled selected>Select a Client:</option>

                    <?php 
                    
                    $query15 = "SELECT * FROM athleteProfile";

                    $sql15 = mysqli_query($connection,$query15);

                    while ($row15 = mysqli_fetch_array($sql15)) {
                        echo "<option value='" . $row15['id'] . "'>"  . $row15['firstName'] . " " . $row15['lastName'] . " | " . $row15['email']. "</option>"; 
                    }

                    ?>
                </select>
            </div>

            <div class="my-3">
                <label for="type">Select an Appointment Type:</label>
                <select name="type" id="type" class="form-select" required>
                <option value="" disabled selected>Select a Service:</option>

                    <?php 
                    
                    $query16 = "SELECT * FROM services";

                    $sql16 = mysqli_query($connection,$query16);

                    while ($row16 = mysqli_fetch_array($sql16)) {
                        echo "<option value='" . $row16['id'] . "'>"  . $row16['name']. "</option>"; 
                    }

                    ?>
                </select>
            </div>

            <div class="coachCheckNotes">
                <label for="notes" class="form-label">Add notes for coach: (optional)</label>
                <input type="text" name="notes" id="notes" class="form-control" maxlength="100">
            </div>

            <input type="submit" value="Continue" class="btn btn-dark btn-lg btn-block" style="background-color: #0d7a52">
        </form>
    </div>
</div>
</div>

</section>

</main>

</body>
</html>