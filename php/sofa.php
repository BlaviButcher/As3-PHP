<?php
    session_start();
    setcookie("patient-nhi", $_SESSION["NHI"], time() + 3600, "/");
    setcookie("patient-firstname", $_SESSION["fname"], time() + 3600, "/");
    setcookie("patient-surname", $_SESSION["lname"], time() + 3600, "/");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style.css">
    <link rel="stylesheet" href="./../css/sofa.css">

    <title>SOFA</title>
</head>

<body>
    <div id="card">
        <h1>SOFA Calculator</h1>
        <div id="patient-details">
            <h3>Paitent</h3>
            <span>NHI: <?php echo $_SESSION["NHI"]?></span>
            <span>First Name: <?php echo $_SESSION["fname"]?></span>
            <span>Last Name: <?php echo $_SESSION["lname"]?></span>
        </div>
        <form method="POST" action="./results.php">
            
            <h2>Respiratory</h2>        
            <div id="respiratory-input">
                <label for="respiratory-figures">P<sub>a</sub>O<sub>2</sub>/FiO<sub>2</sub> [mmHg (kPa)] </label>
                <select name="respiratory-figures" id="respiratory-figures">
                <option value="0">&#8805 400 (53.3)</option>
                <option value="1">&lt 400 (53.3)</option>
                <option value="2">&lt 300 (40)</option>
                <option value="3">&lt 200 (26.7)</option>
                <option value="4">&lt 100 (13.3)</option>
                </select>
                <select name="ventilation-input" id="ventilation-input">
                    <option value="true">ventilated</option>
                    <option value="false">un-ventalted</option>
                </select>
            </div>
            
            <br>
            <h2>Glasgow Coma</h2>   
            <label for="glasgow-coma">Glasgow Coma Scale:</label>
            <select name="glasgow-coma" id="glasgow-coma">
                <option value="0">15</option>
                <option value="1">13-14</option>
                <option value="2">10-12</option>
                <option value="3">6-9</option>
                <option value="4">&lt6</option>
            </select>
            <br>
            <h2>Cardiovascular</h2>   
            <label for="cardiovascular-score">Mean arterial pressure OR administration of vasopressors
                required:</label>
            <select name="cardiovascular-score" id="cardiovascular-score">
                <option value="0">MAP ≥ 70 mmHg</option>
                <option value="1">MAP < 70 mmHg</option>
                <option value="2">dopamine ≤ 5 μg/kg/min or dobutamine
                    (any dose)</option>
                <option value="3">dopamine > 5 μg/kg/min OR epinephrine ≤ 0.1 μg/kg/min OR norepinephrine ≤ 0.1
                    μg/kg/min</option>
                <option value="4">dopamine > 15 μg/kg/min OR epinephrine > 0.1 μg/kg/min OR norepinephrine > 0.1
                    μg/kg/min</option>
            </select>
            <br>
            <h2>Liver</h2>   
            <label for="liver-score">
                Bilirubin :</label>
            <select name="liver-score" id="liver-score">
                <option value="0">&lt 1.2 [< 20.53]</option>
                <option value="1">1.2–1.9 [20-32]</option>
                <option value="2">2.0–5.9 [33-101]</option>
                <option value="3">6.0–11.9 [102-204]</option>
                <option value="4">&gt 12.0 [> 204]</option>
            </select>
            <br>
                <h2>Coagulation</h2>
                <label for="platelets-score">
                    Platelets×103/μl:</label>
                <select name="platelets-score" id="platelets-score">
                    <option value="0">&#8805 150</option>
                    <option value="1">&lt 150</option>
                    <option value="2">&lt 100</option>
                    <option value="3">&lt 50</option>
                    <option value="4">&lt 20</option>
                </select>
            <br>
            <h2>Kidneys</h2>
            <label for="creatinine-score">
                Creatinine (mg/dl) [μmol/L] (or urine output):</label>
            <select name="creatinine-score" id="creatinine-score">
                <option value="0">&lt 1.2 [< 110]</option>
                <option value="1">1.2–1.9 [110-170]</option>
                <option value="2">2.0–3.4 [171-299]</option>
                <option value="3">3.5–4.9 [300-440] (or < 500 ml/d)</option>
                <option value="4">&gt 5.0 [> 440] (or < 200 ml/d)</option>
            </select>
            <div id="submit-wrap">
                <!-- TODO: Add enter key -->
                <button type="submit">Submit</button>
            </div>

        </form>

    </div>
</body>

</html>