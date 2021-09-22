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
    <title>SOFA</title>
</head>

<body>

</body>

</html>