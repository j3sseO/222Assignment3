<?php
// Proccess POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receive patient details
    $patientNHI = $_POST["nhi"];
    $patientSurname = $_POST["surname"];
    $patientFirstname = $_POST["firstname"];

    // Set cookies to remember patient details
    setcookie("patient-nhi", $patientNHI, time() + (30 * 24 * 60 * 60)); // 30 days
    setcookie("patient-surname", $patientSurname, time() + (30 * 24 * 60 * 60)); // 30 days
    setcookie("patient-firstname", $patientFirstname, time() + (30 * 24 * 60 * 60)); // 30 days
} else {
    // If there is no POST data, redirect pack to index.php
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>SOFA Score Calculator</title>
    </head>

    <body>
        <h1>SOFA Score Calculator</h1>
        <p>Patient Details:</p>
        <p>NHI Number: <?php echo $patientNHI; ?></p>
        <p>Surname: <?php echo $patientSurname; ?></p>
        <p>First Name: <?php echo $patientFirstname; ?></p>

        <form action="results.php" method="POST">
            <h2>Enter SOFA Score Components</h2>

            <label for="respitory_system">Respitory System:</label>
            <input type="number" id="respitory_system" name="respitory_system" required><br><br>

            <label for="nervous_system">Central Nervous System:</label>
            <input type="number" id="nervous_system" name="nervous_system" required><br><br>

            <label for="cardio_system">Cardiovascular System:</label>
            <input type="number" id="cardio_system" name="cardio_system" required><br><br>

            <label for="liver_system">Liver Value:</label>
            <input type="number" id="liver_system" name="liver_system" required><br><br>

            <label for="coagulation_system">Coagulation Value:</label>
            <input type="number" id="respitory_system" name="respitory_system" required><br><br>

            <label for="kidneys_system">Kidney Values:</label>
            <input type="number" id="kidneys_system" name="kidneys_system" required><br><br>

            <input type="submit" value="Calculate SOFA Score">
        </form>

    </body>
</html>