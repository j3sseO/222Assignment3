<?php 
        $respiratory_numeric = $_POST["respiratory_numeric"];
        $mechanical_ventilation = $_POST["mechanical_ventilation"];
        $cardiovascular_numeric = $_POST["cardio_system"];
        $nervoussystem_numeric = $_POST["nervous_system"];
        $liver_numeric = $_POST["liver_system"];
        $coagulation_numeric = $_POST["coagulation_numeric"];
        $kidneys_numeric = $_POST["kidneys_system"];

        // Value that is added to total, used for displaying how results
        // were calculated
        $respiratoryAddition = 0;
        $nervousAddition = 0;
        $liverAddition = 0;
        $coagulationAddition = 0;
        $kidneysAddition = 0;

        // Variable to hold score
        $totalSOFA = 0;
        
        // Determine respitory score to add to total
        if ($respiratory_numeric >= 400) {
            $totalSOFA = $totalSOFA;
            $respiratoryAddition = 0;
        } else if ($respiratory_numeric >= 300) {
            $totalSOFA = $totalSOFA + 1;
            $respiratoryAddition = 1;
        } else if ($respiratory_numeric >= 200) {
            $totalSOFA = $totalSOFA + 2;
            $respiratoryAddition = 2;
        } else if ($respiratory_numeric >= 100 && $mechanical_ventilation == 1) {
            $totalSOFA = $totalSOFA + 3;
            $respiratoryAddition = 3;
        } else if ($respiratory_numeric >= 0 && $mechanical_ventilation == 1) {
            $totalSOFA = $totalSOFA + 4;
            $respiratoryAddition = 4;
        }

        // Add selected cardiovascular system numeric to total
        $totalSOFA = $totalSOFA + $cardiovascular_numeric;

        // Determine central nervous system score to add to total
        if ($nervoussystem_numeric == 15) {
            $totalSOFA = $totalSOFA;
            $nervousAddition = 0;
        } else if ($nervoussystem_numeric >= 13) {
            $totalSOFA = $totalSOFA + 1;
            $nervousAddition = 1;
        } else if ($nervoussystem_numeric >= 10) {
            $totalSOFA = $totalSOFA + 2;
            $nervousAddition = 2;
        } else if ($nervoussystem_numeric >= 6) {
            $totalSOFA = $totalSOFA + 3;
            $nervousAddition = 3;
        } else if ($nervoussystem_numeric < 6) {
            $totalSOFA = $totalSOFA + 4;
            $nervousAddition = 4;
        }

        // Determine liver score to add to total
        if ($liver_numeric < 1.2) {
            $totalSOFA = $totalSOFA;
            $liverAddition = 0;
        } else if ($liver_numeric <= 1.9) {
            $totalSOFA = $totalSOFA + 1;
            $liverAddition = 1;
        } else if ($liver_numeric <= 5.9) {
            $totalSOFA = $totalSOFA + 2;
            $liverAddition = 2;
        } else if ($liver_numeric <= 11.9) {
            $totalSOFA = $totalSOFA + 3;
            $liverAddition = 3;
        } else if ($liver_numeric >= 12) {
            $totalSOFA = $totalSOFA + 4;
            $liverAddition = 4;
        }

        // Determine coagulation score to add to total
        if ($coagulation_numeric >= 150) {
            $totalSOFA = $totalSOFA;
            $coagulationAddition = 0;
        } else if ($coagulation_numeric > 100) {
            $totalSOFA = $totalSOFA + 1;
            $coagulationAddition = 1;
        } else if ($coagulation_numeric > 50) {
            $totalSOFA = $totalSOFA + 2;
            $coagulationAddition = 2;
        } else if ($coagulation_numeric > 20) {
            $totalSOFA = $totalSOFA + 3;
            $coagulationAddition = 3;
        } else if ($coagulation_numeric > 0) {
            $totalSOFA = $totalSOFA + 4;
            $coagulationAddition = 4;
        }

        // Determine kidneys score to add to total
        if ($kidneys_numeric < 1.2) {
            $totalSOFA = $totalSOFA;
            $kidneysAddition = 0;
        } else if ($kidneys_numeric <= 1.9) {
            $totalSOFA = $totalSOFA + 1;
            $kidneysAddition = 1;
        } else if ($kidneys_numeric <= 3.4) {
            $totalSOFA = $totalSOFA + 2;
            $kidneysAddition = 2;
        } else if ($kidneys_numeric <= 4.9) {
            $totalSOFA = $totalSOFA + 3;
            $kidneysAddition = 3;
        } else if ($kidneys_numeric >= 5) {
            $totalSOFA = $totalSOFA + 4;
            $kidneysAddition = 4;
        }
        ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">    
        <title>SOFA Score Result</title>
    </head>

    <body>
        <div class="container">
            <div class="top">
                <h1>SOFA Score Result</h1>
                <?php 
                    // Retrieve patient details from cookies
                    $patientNHI = isset($_COOKIE["patient-nhi"]) ? $_COOKIE["patient-nhi"] : "";
                    $patientSurname = isset($_COOKIE["patient-surname"]) ? $_COOKIE["patient-surname"] : "";
                    $patientFirstname = isset($_COOKIE["patient-firstname"]) ? $_COOKIE["patient-firstname"] : "";
                ?>
                <p><?php echo $patientFirstname; ?> <?php echo $patientSurname; ?></p>
                <p><?php echo $patientNHI; ?></p> 
            </div>

            <div class="results">
                <h2>SOFA Score Components:</h2>
                <table>
                    <tr><th>Tested</th><th>Value</th></tr>
                    <tr><td>Central Nervous System</td><td><?php echo "+$nervousAddition" ?></td></tr>
                    <tr><td>Cardiovascular System</td><td><?php echo "+$cardiovascular_numeric" ?></td></tr>
                    <tr><td>Respiratory System</td><td><?php echo "+$respiratoryAddition" ?></td></tr>
                    <tr><td>Coagulation</td><td><?php echo "+$coagulationAddition" ?></td></tr>
                    <tr><td>Liver</td><td><?php echo "+$liverAddition" ?></td></tr>
                    <tr><td>Kidney Function</td><td><?php echo "+$kidneysAddition" ?></td></tr>
                </table>

                <h3>Total SOFA Score: <?php echo $totalSOFA?></h3>
            </div>
        </div>
    </body>
</html>