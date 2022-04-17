<?php
/* 
 * Date: 18 April, 2022
 * Time: 
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Date & Time in PHP
 */

// Simply define date(format, timestamp)
// echo date("l, d M Y");

// Set default timezone
//echo date_default_timezone_get(); // Get current timezone
date_default_timezone_set("Asia/Dhaka");

// Today
$today = date("l, d M Y");

$year = date("Y");

// Time
$time = date("h:i:s");

// Let's create a custom timestamp
$birthdate = mktime(16, null, null, 9, 15, 2003);
$birthdate = date("D, d M Y", $birthdate);

// Get Tomorrow's Information
$tomorrow = strtotime("tomorrow");
$tomorrow = date("l, d M Y", $tomorrow);
$yesterday = strtotime("yesterday");
$yesterday = date("l, d M Y", $yesterday);

// Count days until next January 1 / Count how many days left in current year
$date = strtotime("01 January next year");
$totalDays = ceil(($date - time()) / 60 / 60 / 24);
$totalDays = "{$totalDays} days left in the year {$year}!";

// Daily Sunset Sunrise
// Location : Dhaka, Bangladesh
$lat = 23.8103;
$longt = 90.4125;

$sunInfo = date_sun_info(strtotime("-2 days"), $lat, $longt); // New function to get information about the Sun
$sunset = date("h:i A", $sunInfo["sunset"]); // Shows Sunset time with AM/PM format
$sunrise = date("h:i A", $sunInfo["sunrise"]); // Shows Sunrise time with AM/PM format

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date & Time in PHP</title>
</head>

<body>
    <h1>Today's date: <?php echo $today; ?></h1>
    <hr>

    <h2>Current Time is: <?php echo $time; ?></h2>
    <hr>
    <h3>I was born on <?php echo $birthdate; ?></h3>

    <p>Tomorrow is <?php echo $tomorrow; ?></p>
    <p>Yesterday was <?php echo $yesterday; ?></p>

    <b><?php echo $totalDays ?></b>

    <hr>

    <h1>Today's Sunrise: <?php echo $sunrise; ?></h1>
    <h1>Today's Sunset: <?php echo $sunset; ?></h1>

    <footer>
        <hr>
        Al Nahian &copy; <?php echo $year; ?>
        <hr>
    </footer>
</body>

</html>