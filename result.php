<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">    
        <title>SOFA Score Result</title>
    </head>

    <body>
        <h1>SOFA Score Result</h1>

        <?php 
        // Retrieve patient details from cookies
        $patientNHI = isset($_COOKIE["patient-nhi"]) ? $_COOKIE["patient-nhi"] : "";
        $patientSurname = isset($_COOKIE["patient-surname"]) ? $_COOKIE["patient-surname"] : "";
        $patientFirstname = isset($_COOKIE["patient-firstname"]) ? $_COOKIE["patient-firstname"] : "";

        // Check if patient details exist in cookies
        if (!empty($patientNHI) && !empty($patientSurname) && !empty($patientFirstname)) {
            echo "<p>Patient Details:</p>";
            echo "<p>NHI Number: $patientNHI</p>";
            echo "<p>Surname: $patientSurname</p>";
            echo "<p>First Name: $patientFirstname</p>";
        } else {
            echo "<p>Patient details not found.</p>";
        }

        $respiratory_numeric = $_POST["respiratory_numeric"];
        $mechanical_ventilation = $_POST["mechanical_ventilation"];
        $cardiovascular_numeric = $_POST["cardio_system"];
        $nervoussystem_numeric = $_POST["nervous_system"];
        $liver_numeric = $_POST["liver_system"];
        $coagulation_numeric = $_POST["coagulation_numeric"];
        $kidneys_numeric = $_POST["kidneys_system"];

        $totalSOFA = 0;
        
        // Determine respitory score to add to total
        if ($respiratory_numeric >= 400) {
            $totalSOFA = $totalSOFA;
        } else if ($respiratory_numeric >= 300) {
            $totalSOFA = $totalSOFA + 1;
        } else if ($respiratory_numeric >= 200) {
            $totalSOFA = $totalSOFA + 2;
        } else if ($respiratory_numeric >= 100 && $mechanical_ventilation == 1) {
            $totalSOFA = $totalSOFA + 3;
        } else if ($respiratory_numeric >= 0 && $mechanical_ventilation == 1) {
            $totalSOFA = $totalSOFA + 4;
        }

        // Add selected cardiovascular system numeric to total
        $totalSOFA = $totalSOFA + $cardiovascular_numeric;

        // Determine central nervous system score to add to total
        if ($nervoussystem_numeric == 15) {
            $totalSOFA = $totalSOFA;
        } else if ($nervoussystem_numeric >= 13) {
            $totalSOFA = $totalSOFA + 1;
        } else if ($nervoussystem_numeric >= 10) {
            $totalSOFA = $totalSOFA + 2;
        } else if ($nervoussystem_numeric >= 6) {
            $totalSOFA = $totalSOFA + 3;
        } else if ($nervoussystem_numeric < 6) {
            $totalSOFA = $totalSOFA + 4;
        }

        // Determine liver score to add to total
        if ($liver_numeric < 1.2) {
            $totalSOFA = $totalSOFA;
        } else if ($liver_numeric <= 1.9) {
            $totalSOFA = $totalSOFA + 1;
        } else if ($liver_numeric <= 5.9) {
            $totalSOFA = $totalSOFA + 2;
        } else if ($liver_numeric <= 11.9) {
            $totalSOFA = $totalSOFA + 3;
        } else if ($liver_numeric >= 12) {
            $totalSOFA = $totalSOFA + 4;
        }

        // Determine coagulation score to add to total
        if ($coagulation_numeric >= 150) {
            $totalSOFA = $totalSOFA;
        } else if ($coagulation_numeric > 100) {
            $totalSOFA = $totalSOFA + 1;
        } else if ($coagulation_numeric > 50) {
            $totalSOFA = $totalSOFA + 2;
        } else if ($coagulation_numeric > 20) {
            $totalSOFA = $totalSOFA + 3;
        } else if ($coagulation_numeric > 0) {
            $totalSOFA = $totalSOFA + 4;
        }

        // Determine kidneys score to add to total
        if ($kidneys_numeric < 1.2) {
            $totalSOFA = $totalSOFA;
        } else if ($kidneys_numeric <= 1.9) {
            $totalSOFA = $totalSOFA + 1;
        } else if ($kidneys_numeric <= 3.4) {
            $totalSOFA = $totalSOFA + 2;
        } else if ($kidneys_numeric <= 4.9) {
            $totalSOFA = $totalSOFA + 3;
        } else if ($kidneys_numeric >= 5) {
            $totalSOFA = $totalSOFA + 4;
        }

        echo "<h2>SOFA Score Components:</h2>";
        echo "<tr><th>Total SOFA Score: </th><th>$totalSOFA</th></tr>";

        // echo "<table>";
        // echo "<tr><th>Component</th><th>Value</th></tr>";
        // echo "<tr><td>Respiratory Numeric</td><td>$respiratory_numeric</td></tr>";
        // echo "<tr><td>Mechanical Ventilation</td><td>$mechanical_ventilation</td></tr>";
        // echo "<tr><td>Cardiovascular Numeric</td><td>$cardiovascular_numeric</td></tr>";
        // echo "<tr><td>Liver Numeric</td><td>$liver_numeric</td></tr>";
        // echo "<tr><td>Coagulation Numeric</td><td>$coagulation_numeric</td></tr>";
        // echo "<tr><td>Kidneys Numeric</td><td>$kidneys_numeric</td></tr>";
        // echo "<tr><th>Total SOFA Score</th><th>$totalSOFA</th></tr>";
        // echo "</table>";
        ?>
    </body>
</html>