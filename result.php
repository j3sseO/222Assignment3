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
        ?>
    </body>
</html>