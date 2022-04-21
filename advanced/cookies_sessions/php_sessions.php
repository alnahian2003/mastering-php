<?php
/* 
 * Start Date: 1:47 AM, 22 April, 2022
 * End Date: 2:14 AM, 22 April, 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Sessions in PHP
 */

ob_start(); // This helps to turn on Output buffering
session_start();

$_SESSION["username"] = "alnahian2003";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions in PHP</title>
</head>

<body>
    <h1>Working With Sessions in PHP</h1>
    <h3>
        <?php
        if (count($_SESSION) > 0) {
            echo "Session Available";
        } else {
            echo "Session Unavailabe";
        }
        ?>
    </h3>
</body>

</html>