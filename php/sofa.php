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
        <form method="POST" action="./results.php">
            <fieldset>
                <legend>Respiratory</legend>
                <div id="respiratory-input">
                    <label for="respiratory-figures">P<sub>a</sub>O<sub>2</sub></label>
                    <input type="text" name="respiratory-figures" id="respiratory-figures">
                    <select name="respiratory-units" id="respiratory-units">
                        <option value="mmHg">mm Hg</option>
                        <option value="kPa">kPa</option>
                    </select>
                    <hr>
                    <label for="ventilated-input">Ventilated?</label>
                    <div>
                        <input type="radio" id="yes" name="ventilation-input" value="true" checked>
                        <label for="yes">Yes</label>
                    </div>
                    <div>
                        <input type="radio" id="no" name="ventilation-input" value="false" checked>
                        <label for="no">No</label>
                    </div>
                </div>
            </fieldset>
            <br>
            <fieldset>
                <legend>Nervous System</legend>
                <label for="glasgow-coma">Glasgow Coma Scale:</label>
                <select name="glasgow-coma" id="glasgow-coma">
                    <option value="0">15</option>
                    <option value="1">13-14</option>
                    <option value="2">10-12</option>
                    <option value="3">6-9</option>
                    <option value="4">&lt6</option>
                </select>
            </fieldset>
            <br>
            <fieldset>
                <legend>Cardiovascular system</legend>
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
            </fieldset>
            <br>
            <fieldset>
                <legend>Liver</legend>
                <label for="liver-score">
                    Bilirubin :</label>
                <select name="liver-score" id="liver-score">
                    <option value="0">&lt 1.2 [< 20.53]</option>
                    <option value="1">1.2–1.9 [20-32]</option>
                    <option value="2">2.0–5.9 [33-101]</option>
                    <option value="3">6.0–11.9 [102-204]</option>
                    <option value="4">&gt 12.0 [> 204]</option>
                </select>
            </fieldset>
            <br>
            <fieldset>
                <legend>Coagulation</legend>
                <label for="platelets-score">
                    Platelets×103/μl:</label>
                <select name="platelets-score" id="platelets-score">
                    <option value="0">&#8805 150</option>
                    <option value="1">&lt 150</option>
                    <option value="2">&lt 100</option>
                    <option value="3">&lt 50</option>
                    <option value="4">&lt 20</option>
                </select>
            </fieldset>
            <br>
            <fieldset>
                <legend>Kidneys</legend>
                <label for="creatinine-score">
                    Creatinine (mg/dl) [μmol/L] (or urine output):</label>
                <select name="creatinine-score" id="creatinine-score">
                    <option value="0">&lt 1.2 [< 110]</option>
                    <option value="1">1.2–1.9 [110-170]</option>
                    <option value="2">2.0–3.4 [171-299]</option>
                    <option value="3">3.5–4.9 [300-440] (or < 500 ml/d)</option>
                    <option value="4">&gt 5.0 [> 440] (or < 200 ml/d)</option>
                </select>
            </fieldset>
            <button type="submit">Submit</button>

        </form>

    </div>
</body>

</html>