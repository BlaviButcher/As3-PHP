<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div id="card">
        <h1>SOFA</h1>
        <p>The sequential organ failure assessment score (SOFA score), previously known as the sepsis-related organ
            failure assessment score,
            is used to track a person's status during the stay in an intensive care unit (ICU) to determine the extent
            of a person's organ function
            or rate of failure. The score is based on six different scores, one each for the respiratory,
            cardiovascular, hepatic,
            coagulation, renal and neurological systems.</p>
        <h2>Enter Credentials</h2>
        <form action="php/sofa.php" method="post">
            <div class="input-wrap">
                <label for="NHI-input">NHI</label>
                <input type="text" name="NHI" id="NHI-input">
            </div>
            <div class="input-wrap">
                <label for="fname-input">First Name</label>
                <input type="text" name="fname" id="fname-input">
            </div>
            <div class="input-wrap">
                <label for="lname-input">Last Name</label>
                <input type="text" name="lname" id="lname-input">
            </div>
            <div id="submit-wrap">
                <button type="submit">Submit</button>
            </div>
        </form>

    </div>
</body>

</html>