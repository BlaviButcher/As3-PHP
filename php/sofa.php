<?php
    var_dump(($_POST));
    if (isset($_POST["NHI"])) { 
        setcookie("NHI", $_POST["NHI"], time() + 3600, "/");
    }

    if (isset($_POST["fname"])) { 
        setcookie("fname", $_POST["fname"], time() + 3600, "/");
    }

    if (isset($_POST["lname"])) { 
        setcookie("lname", $_POST["lname"], time() + 3600, "/");
    }

    setcookie("hui", "hi", time() + 3600, "/");    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOFA</title>
</head>

<body>

</body>

</html>