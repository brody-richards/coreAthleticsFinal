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

    $userID = $_COOKIE['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Overview | Core Athletics
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

<div class="introBox">
    <?php 
    $query = "SELECT * FROM athleteProfile WHERE id = '" . $_COOKIE['id'] . "'";

    $sql = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($sql)) {

        $firstName = $row['firstName'];
    }
                
    echo "<p><strong class='bold'>Admin Overview</strong></p>";
    echo "<p><strong class='bold'>Today's Date: </strong>" . date('F j, Y', strtotime($currentDate)) . "</p>";
    ?>
</div>

<div>
    <h1>Admin Dashboard</h1>
    <p>All your upcoming coaching appointment details.</p>
</div>

<div class="tableBox">
    <table>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Appointment Type</th>
                <th>Client</th>
                <th>Notes</th>
            </tr>

            <?php 
            
            $query = "SELECT appointment.bookingDate,appointment.bookingTime,appointment.bookingType,appointment.userID,appointment.bookingNotes,athleteProfile.id,athleteProfile.firstName,athleteProfile.lastName FROM appointment INNER JOIN athleteProfile ON appointment.userID = athleteProfile.id ORDER BY appointment.bookingDate asc";

            $sql = mysqli_query($connection, $query);

            while($row = mysqli_fetch_array($sql)) {

                $bookingDate = strtotime($row['bookingDate']);
                $bookingDate = date('l F j, Y', $bookingDate);

                $bookingTime = $row['bookingTime'];

                $bookingType = $row['bookingType'];

                $userID = $row['id'];

                $firstName = $row['firstName'];

                $lastName = $row['lastName'];

                $bookingNotes = $row['bookingNotes'];

                echo "<tr>";
                    echo "<td>" . $bookingDate . "</td>"; 

                    echo "<td>";
                        if ($bookingTime == 1) {
                            echo "9AM - 9:45AM";
                        } else if ($bookingTime == 2) {
                            echo "10AM - 10:45AM";
                        } else if ($bookingTime == 3) {
                            echo "11AM - 11:45AM";
                        } else if ($bookingTime == 4) {
                            echo "12PM - 12:45PM";
                        } else if ($bookingTime == 5) {
                            echo "1PM - 1:45PM";
                        } else if ($bookingTime == 6) {
                            echo "2PM - 2:45PM";
                        } else if ($bookingTime == 7) {
                            echo "3PM - 3:45PM";
                        } else {
                            echo "4PM - 4:45PM";
                        }
                    echo "</td>"; 

                    echo "<td>";
                        if ($bookingType == 1) {
                            echo "Initial Consultation";
                        } else if ($bookingType == 2) {
                            echo "Nutrition Coaching";
                        } else if ($bookingType == 3) {
                            echo "Fitness Coaching";
                        } else {
                            echo "Recovery Coaching";
                        }
                    echo "</td>"; 

                    echo "<td>" . ucfirst($firstName) . " " . ucfirst($lastName) . "</td>";

                    echo "<td>" . $bookingNotes . "</td>";

                echo "</tr>";

            }
            
            ?>

        </table>
    </div>

<section class="delete my-5">
    <h2>Delete an Appointment.</h2>

    <form action="admindeleteresult.php" method="POST">
        
        <div class="deleteBox">
            <label for="delete" class="form-label">Please choose the appointment you would like to delete.</label>
                <select name="delete" id="delete" class="form-select delete" required onchange="enableSubmit()">
                <option value="" disabled selected>Select appointment:</option>

                <?php 
                
                $query1 = "SELECT * FROM appointment INNER JOIN athleteProfile ON appointment.userID = athleteProfile.id ORDER BY appointment.bookingDate asc";

                $sql1 = mysqli_query($connection,$query1);



                while ($row1 = mysqli_fetch_array($sql1)) {

                    $bookingDate = strtotime($row1['bookingDate']);
                    $bookingDate = date('l F j, Y', $bookingDate);

                    $bookingTime = $row1['bookingTime'];

                    if ($bookingTime == 1) {
                        $bookingTimeText = "9AM - 9:45AM";
                    } else if ($bookingTime == 2) {
                        $bookingTimeText = "10AM - 10:45AM";
                    } else if ($bookingTime == 3) {
                        $bookingTimeText = "11AM - 11:45AM";
                    } else if ($bookingTime == 4) {
                        $bookingTimeText = "12PM - 12:45PM";
                    } else if ($bookingTime == 5) {
                        $bookingTimeText = "1PM - 1:45PM";
                    } else if ($bookingTime == 6) {
                        $bookingTimeText = "2PM - 2:45PM";
                    } else if ($bookingTime == 7) {
                        $bookingTimeText = "3PM - 3:45PM";
                    } else {
                        $bookingTimeText = "4PM - 4:45PM";
                    }

                    $bookingType = $row1['bookingType'];

                    if ($bookingType == 1) {
                        $bookingTypeText = "Initial Consultation";
                    } else if ($bookingType == 2) {
                        $bookingTypeText = "Nutrition Coaching";
                    } else if ($bookingType == 3) {
                        $bookingTypeText = "Fitness Coaching";
                    } else {
                        $bookingTypeText = "Recovery Coaching";
                    }

                    $appointmentID = $row1['appointmentID'];

                    $firstName = $row1['firstName'];

                    $lastName = $row1['lastName'];

                    echo "<option value='" . $appointmentID . "'>" . $bookingDate . " | " . $bookingTimeText . " | " . $bookingTypeText . " | " . ucfirst($firstName) . " " . ucfirst($lastName) . "</option>";
                }

                ?>
            </select>

            <input type="submit" value="Delete this appointment" class="btn btn-danger btn-lg btn-block my-4" id="deleteButton" disabled>

        </form>

        </div>

</section>

<section class="add">

    <h2>Add an Appointment.</h2>

    <form action="admincheckcoach.php" method="POST">
        <div class="coachFormDate">
            <label for="date" class="form-label my-2">Please choose the date for the appointment you would like to add.</label>
            <input type="date" class="form-control" id="date" name="date" min="<?php echo $currentDate ?>" required onchange="enableSubmit()">
        </div>

        <div class="coachFormButton">
            <input type="submit" label="Book Time" id="addButton" class="btn btn-dark btn-lg btn-block my-3" style="background-color: #0d7a52" disabled>
        </div>
    </form>


</section>

</main>

<script>

    function enableSubmit() {
        let selected = document.getElementById('delete');
        let button = document.getElementById('deleteButton');
        let dateSelected = document.getElementById('date');
        let addButton = document.getElementById('addButton');

        if (selected && selected.value !== ""){
            button.disabled = false;
        } else {
            button.disabled = true;
        }

        if (dateSelected && dateSelected.value !== ""){
            addButton.disabled = false;
        } else {
            addButton.disabled = true;
        }
    }

</script>

</body>
</html>