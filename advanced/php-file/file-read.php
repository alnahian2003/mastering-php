<?php
/* 
 * Start Date: 18 April, 2022
 * End Date: 1:25 PM, 19 April, 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Reading File Data in PHP
 */

//  use fopen() to open a file

$filename = "countries.txt";

// echo $read = readfile($filename, filesize($filename));
$file = fopen($filename, "r") or die("!!Unable to open the file!!");

// echo fread($file, filesize($filename));
while (!feof($file)) {
    echo fgets($file) . " from " . basename($filename) . "</br>";
}

date_default_timezone_set("Asia/Dhaka");

$lastAccess = date("h:i:s A d, M Y", fileatime($filename)); // Last Access Time
$lastMod = date("h:i:s A d, M Y", filemtime($filename)); // Last Modify Time

//echo "Last accessed '{$filename}' on: " . date("h:i:s A d, M Y", fileatime($filename)); // Returns the last accessed time
//echo "</br>";
//echo "Last modified '{$filename}' on: " . date("h:i:s A d, M Y", filemtime($filename)); // Returns the last accessed time

$file_data = array(
    "file_name" => $filename,
    "file_size" => ceil(round((filesize($filename) / 1024), 1)) . "kb",
    "file_type" => filetype($filename),
    "is_readable" =>
    json_encode(is_readable($filename)),
    "is_writeable" => json_encode(is_writeable($filename)),
    "last_access_time" => $lastAccess,
    "last_modify_time" => $lastMod,
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read/Open File Data</title>
</head>

<body>
    <h1>All Information About a File</h1>
    <h4>'<?php echo basename($filename); ?>' at a glance:</h4>

    <ul>
        <?php foreach ($file_data as $key => $value) : ?>
            <li>
                <b><?php echo ucwords(str_replace("_", " ", $key)); ?></b> : <?php echo $value; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>

<?php
// Always use fclose() to close the file after finished working with it
fclose($file);
?>