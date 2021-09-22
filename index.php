<?php
ini_set("error_reporting",E_ALL);
ini_set("log_errors","1");
ini_set("error_log","php_errors.txt");

?>


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
    $NHI_valid = "";
    // $NHI_empty = FALSE;

    $fname_valid = "";
    // $fname_empty = FALSE;

    $lname_valid = "";
    // $lname_empty = FALSE;

    // Check to see if name is valid (has more then 1 char) - Set error message if invalid
    if (isset($_POST["fname"])) {

        $fname_valid = strlen($_POST["fname"]) > 1 ? "": "Name must be atleast 1 character";
        // $NHI_empty = strlen($_POST["NHI"]) > 0 ? FALSE : TRUE;
    }
    
    // // Check to see if age is invalid (is a non-integer or is not positive)
    // if (isset($_POST["fname"])) {
    //   if (strlen($_POST["fname"]) == 0) {
    //       $fname_valid = FALSE;
    //   }
      
    // }
        // If all inputs are present and valid, proceed
        if (count($_POST) == 3) {

            if (empty($NHI_valid) && empty($fname_valid) && empty($lname_valid)) {
                header("Location:./php/sofa.php");
                exit();
            }
        }
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
                    // Validation loop and cookies handlers

                    // if something is posted then replace previous cookie and set varaible
                    // else grab cooking
                    // if first time display empty
                    if (isset($_POST["NHI"])) { 
                        $NHI_value = $_POST["NHI"];
                        // setcookie("NHI", $NHI_value, time() + 3600, "/");
                    } else if (isset($_COOKIE["NHI"])) {
                        $NHI_value = $_COOKIE["NHI"];
                    } else $NHI_value = "";

                    // if something is posted then replace previous cookie and set varaible
                    // else grab cookingsf
                    // if first time display empty
                    if (isset($_POST["fname"])) { 
                        $fname_value = $_POST["fname"];
                        // setcookie("fname", $fname_value, time() + 3600, "/");
                    } else if (isset($_COOKIE["fname"])) {
                        
                        $fname_value = $_COOKIE["fname"];

                    } else $fname_value = "";

                    // if something is posted then replace previous cookie and set varaible
                    // else grab cooking
                    // if first time display empty
                    if (isset($_POST["lname"])) { 
                        $lname_value = $_POST["lname"];
                        // setcookie("lname", $lname_value, time() + 3600, "/");
                    } else if (isset($_COOKIE["lname"])) {
                        
                        $lname_value = $_COOKIE["lname"];
                        error_log($lname_value, 0);

                    } else $lname_value = "";
                ?>
                <input type="text" name="NHI" id="NHI-input" required value=<?php echo $NHI_value; ?>>
                <label for="NHI-input" class="form-label">NHI</label>


            </div>
            <div class="input-wrap">
                <input type="text" name="fname" id="fname-input" required value=<?php echo $fname_value; ?>>
                <label for="fname-input" class="form-label">First Name</label>
                <?php 
                // Add error message if error exists
                    if (!empty($fname_valid)) {
                        echo '<div data-type="validator-error">'.$fname_valid.'</div>';
                    }
                ?>
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