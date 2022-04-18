<?php
/* 
 * Date: 18 April, 2022
 * Time: 3:25 AM, 18 April, 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Handling files to perform any CRUD operation on them
 */

//  Let's read a File data simply using readFile()

// $names = readfile("names.txt");
$fileName = "names.txt";
$names = file($fileName);
// var_dump($names);

// I made a File Size Calculator by my own
$fsize = ceil(round(filesize($fileName) / 1024, 1)); // Kilobytes
$fsizeFormKb = $fsize . "kb";
$fsize = ($fsize > $fsize / 1024 / 1024) ? (round(filesize($fileName) / 1024 / 1024, 1)) : $fsize;
$fsizeFormGb = $fsize . "gb";
// var_dump($fsize, $fsizeFormKb, $fsizeFormGb);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Handling in PHP</title>
</head>

<body>
    <h1>Names:</h1>
    <p>
        <?php foreach ($names as $key => $value) {
            echo "<li>{$value}</li>";
        } ?>
    </p>
</body>

</html>