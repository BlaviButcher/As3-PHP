<!-- Errors -->
<?php
ini_set("error_reporting", E_ALL);
ini_set("log_errors", "1");
ini_set("error_log", "php_errors.txt");
$is_valid_data = FALSE;
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

</head>

<body>

    <!-- PHP code to validate URL variables on the server -->
    <?php
    // ********************  PLEASE READ MARKER ***************************
    /* I ran this by Michael and he was fine with it. I've done a self validating
       php form using POST. I lose my POST when I get redirected to another page.
       I could have used get and then appended url variables to the redirection,
       but this is clean. The only difference is the cookies are stored before
       the redirection rather than after. Good day!
    */
    
    // Assume that both name and age are valid
    $NHI_valid = "";
    $fname_valid = "";
    $lname_valid = "";

    if (isset($_POST["NHI"])) {
        // entire string must have 3 digits and 4 letters
        preg_match('/^[A-Z]{3}\d{4}$/', $_POST["NHI"], $matches);
        $NHI_valid = empty($matches) ? "Must be of format AAANNNN" : "";
    }

    // Check to see if name is valid (has more then 1 char) - Set error message if invalid
    if (isset($_POST["fname"])) 
        $fname_valid = strlen($_POST["fname"]) > 1 ? "" : "Name must be atleast 2 character";

    if (isset($_POST["lname"]))
        $lname_valid = strlen($_POST["lname"]) > 1 ? "" : "Name must be atleast 2 character";


    // Validation loop and cookies handlers

    // if something is posted then replace previous cookie and set varaible
    // else grab cooking
    // if first time display empty
    if (isset($_POST["NHI"])) {
        $NHI_value = $_POST["NHI"];
    } else if (isset($_COOKIE["NHI"])) {
        $NHI_value = $_COOKIE["NHI"];
    } else $NHI_value = "";

    // if something is posted then replace previous cookie and set varaible
    // else grab cookingsf
    // if first time display empty
    if (isset($_POST["fname"])) {
        $fname_value = $_POST["fname"];
    } else if (isset($_COOKIE["fname"])) {
        $fname_value = $_COOKIE["fname"];
    } else $fname_value = "";

    // if something is posted then replace previous cookie and set varaible
    // else grab cooking
    // if first time display empty
    if (isset($_POST["lname"])) {
        $lname_value = $_POST["lname"];
    } else if (isset($_COOKIE["lname"])) {
        $lname_value = $_COOKIE["lname"];
        error_log($lname_value, 0);
    } else $lname_value = "";



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

                <input type="text" name="NHI" id="NHI-input" required value=<?php echo $NHI_value; ?>>
                <label for="NHI-input" class="form-label">NHI</label>

                <?php
                // Add error message if error exists
                if (!empty($NHI_valid)) {
                    
                    echo '<div data-type="validator-error">' . $NHI_valid . '</div>';
                }
                ?>

            </div>
            <div class="input-wrap">
                <input type="text" name="fname" id="fname-input" required value=<?php echo $fname_value; ?>>
                <label for="fname-input" class="form-label">First Name</label>

                <?php
                // Add error message if error exists

                if (!empty($fname_valid)) {
                    echo '<div data-type="validator-error">' . $fname_valid . '</div>';
                }
                ?>

            </div>
            <div class="input-wrap">
                <input type="text" name="lname" id="lname-input" required value=<?php echo $lname_value; ?>>
                <label for="lname-input" class="form-label">Last Name</label>

                <?php
                // Add error message if error exists
                if (!empty($lname_valid)) {
                    echo '<div data-type="validator-error">' . $lname_valid . '</div>';
                }
                ?>

            </div>
            <div id="submit-wrap">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <?php
    // If all inputs are present and valid, proceed
    if (count($_POST) == 3) {

        if (empty($NHI_valid) && empty($fname_valid) && empty($lname_valid)) {
            
                  
        }
    }
?>
    <!-- Script will run in full when the data is valid and post to sofa.php -->
    <script>
    let validData = <?php echo json_encode($is_valid_data, JSON_HEX_TAG); ?>;
    console.log(validData);
    if (validData) {

        // Store key value pairs for easy traversal
        let dataArray = {};
        dataArray["NHI"] = <?php echo json_encode($_POST["NHI"], JSON_HEX_TAG);  ?>;
        dataArray["fname"] = <?php echo json_encode($_POST["fname"], JSON_HEX_TAG);  ?>;
        dataArray["lname"] = <?php echo json_encode($_POST["lname"], JSON_HEX_TAG); ?>;

        // Get new url
        let url = window.location.href;
        url = url.substring(0, url.lastIndexOf("/"));
        url = `${url}/php/sofa.php`;

        // create form to post data and redirect user
        let form = document.createElement('form');
        document.body.appendChild(form);
        form.method = 'post';
        form.action = url;
        // fill post data
        for (let key in dataArray) {
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = key;
            input.value = dataArray[key];
            form.appendChild(input);
        }
        form.submit();
        document.body.removeChild(form);
    }
    </script>


</body>

</html>