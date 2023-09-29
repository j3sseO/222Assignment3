<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>SOFA Score Calculator</title>
    </head>
    <body>
        
        <div class="container">
            <div class="top">
                <h1>SOFA Score Calculator</h1>
                <p>The sequential organ failure assessment score (SCORE score) is used
                    to track a person's status during their stay in an intensive care 
                    unit (ICU) to determine the extent of a person's organ function or
                    rate of failure.
                </p>
            </div>
            <form id="patient_info" action="sofa.php" method="POST">
                <label for="nhi">NHI Number (AAANNNN)</label>
                <input type="text" id="nhi" name="nhi" pattern="[A-Z]{3}[0-9]{4}" required placeholder="e.g. ABC1234"><br><br>
            
                <label for="surname">Patient Surname</label>
                <input type="text" id="surname" name="surname"><br><br>

                <label for="firstname">Patient First Name</label>
                <input type="text" id="firstname" name="firstname"><br><br>

                <input type="submit" value="Next">
            </form>
        </div>
        <script>
            // Check if cookies exist and populate form fields
            if (document.cookie) {
                const cookies = document.cookie.split(';');
                for (const cookie of cookies) {
                    const [name, value] = cookie.trim().split('=');
                    if (name === 'patient-nhi') {
                        document.getElementById('nhi').value = value;
                    } else if (name === 'patient-surname') {
                        document.getElementById('surname').value = value;
                    } else if (name === 'patient-firstname') {
                        document.getElementById('firstname').value = value;
                    }
                }
            }
        </script>
    </body>
</html>