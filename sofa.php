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

        <form action="result.php" method="POST">
            <h2>Enter SOFA Score Components</h2>

            <label for="respitory_numeric">Respitory Numeric (<span class="bold">PaO2/FiO2 [mmHg (kPa)]</span>):</label>
            <input type="number" id="respiratory_numeric" name="respiratory_numeric" required><br><br>

            <label>Mechanical Ventilation:</label>
            <input type="radio" id="mechanical_ventilation_yes" name="mechanical_ventilation" value="1" required>
            <label for="mechanical_ventilation_yes">Yes</label>
            <input type="radio" id="mechanical_ventilation_no" name="mechanical_ventilation" value="0" required>
            <label for="mechanical_ventilation_no">No</label><br><br>

            <label for="nervous_system">Central Nervous System (<span class="bold">Glasgow Coma Scale</span>):</label>
            <input type="number" id="nervous_system" name="nervous_system" required><br><br>

            <label for="cardio_system">Cardiovascular System (<span class="bold">Mean arterial pressure OR administration of vasopressors required</span>):</label><br><br>
            <input type="radio" id="cardio_zero" name="cardio_system" value="0" required>
            <label for="cardio_zero">MAP ≥ 70 mmHg</label><br><br>
            <input type="radio" id="cardio_one" name="cardio_system" value="1" required>
            <label for="cardio_one">MAP < 70 mmHg</label><br><br>
            <input type="radio" id="cardio_two" name="cardio_system" value="2" required>
            <label for="cardio_two">dopamine ≤ 5 μg/kg/min OR dobutamine (any dose)</label><br><br>
            <input type="radio" id="cardio_three" name="cardio_system" value="3" required>
            <label for="cardio_three">dopamine > 5 μg/kg/min OR epinephrine ≤ 0.1 μg/kg/min OR norepinephrine ≤ 0.1 μg/kg/min</label><br><br>
            <input type="radio" id="cardio_four" name="cardio_system" value="4" required>
            <label for="cardio_four">dopamine > 15 μg/kg/min OR epinephrine > 0.1 μg/kg/min OR norepinephrine > 0.1 μg/kg/min</label><br><br>
            

            <label for="liver_system">Liver Value (<span class="bold">Bilirubin (mg/dl) [μmol/L]</span>):</label>
            <input type="number" step="0.1" id="liver_system" name="liver_system" required><br><br>

            <label for="coagulation_system">Coagulation Value (<span class="bold">Platelets (×10^3/μl)</span>):</label>
            <input type="number" id="coagulation_system" name="coagulation_numeric" required><br><br>

            <label for="kidneys_system">Kidney Values (<span class="bold">Creatinine (mg/dl) [μmol/L]</span>):</label>
            <input type="number" step="0.1" id="kidneys_system" name="kidneys_system" required><br><br>

            <input type="submit" value="Calculate SOFA Score">
        </form>

    </body>
</html>