<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Portal</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="css/forms.css" rel="stylesheet">

    <!-- font-family: "Noto Sans", sans-serif; -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

    <script src="js/script.js" defer></script>
    <script src="js/js-form-validator.min.js"></script>
</head>

<body>

    <!-- PHP code to validate URL variables on the server -->
    <?php
    // Assume that both name and age are valid
    $NHI_valid = FALSE;
    $NHI_empty = TRUE;

    $fname_valid = FALSE;
    $fname_empty = TRUE;

    $lname_valid = FALSE;
    $lname_empty = TRUE;

    // Check to see if name is invalid (has less than 3 characters)
    if (isset($_POST["NHI"])) {
        $NHI_valid = strlen($_POST["NHI"]) > 0 ? TRUE : FALSE;
        $NHI_empty = strlen($_POST["NHI"]) > 0 ? FALSE : TRUE;
    }
    
    // // Check to see if age is invalid (is a non-integer or is not positive)
    // if (isset($_POST["fname"])) {
    //   if (strlen($_POST["fname"]) == 0) {
    //       $fname_valid = FALSE;
    //   }
      
    // }
    // // If both inputs are present and valid, proceed
    // if (count($_GET)>0)
    //   if ($name_valid && $age_valid) {
	//   header("Location:proceed.php");
	//   exit();
    //   }
    ?>


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
        <form id="user-credential-form" action="index.php" method="post" novalidate>
            <div class="input-wrap">
                <?php 
                    // Hold onto values from validation loop
                    if (!isset($_POST["NHI"])) $NHI_value = "";
                    else $NHI_value = $_POST["NHI"];
                    if (!isset($_POST["fname"])) $fname_value = "";
                    else $fname_value = $_POST["fname"];
                    if (!isset($_POST["lname"])) $lname_value = "";
                    else $lname_value = $_POST["lname"];
                ?>
                <input type="text" name="NHI" id="NHI-input" required value=<?php echo $NHI_value; ?>>
                <label for="NHI-input" class="form-label">NHI</label>

            </div>
            <div class="input-wrap">
                <input type="text" name="fname" id="fname-input" required value=<?php echo $fname_value; ?>>
                <label for="fname-input" class="form-label">First Name</label>
            </div>
            <div class="input-wrap">
                <input type="text" name="lname" id="lname-input" required value=<?php echo $lname_value; ?>>
                <label for="lname-input" class="form-label">Last Name</label>
            </div>
            <div id="submit-wrap">
                <button type="submit">Submit</button>
            </div>
        </form>

    </div>
</body>

</html>