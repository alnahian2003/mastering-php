<?php
/* 
 * Start Date: 1:55 AM, 25 April, 2022
 * End Date: 3:04 AM, 25 April 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Callback Function in PHP
 */

// Define a callback function
$names = array("Al Nahian", "Jim Halpert", "Michael Scott", "Dwight K Schrute", "Andy Bernard", "Ryan Howard");
function myCallback($array)
{
    return strlen($array);
}

// User defined callback
function sayHi($name)
{
    return "Hi there, $name!";
}
function sayBye($name)
{
    return "Goodbye, $name. See you!";
}

function greet($name, $callback)
{
    echo $callback($name);
}

greet("Al Nahian", "sayHi");
echo "</br>";
greet("Al Nahian", "sayBye");
echo "</br>";

// Another example
function sum($x, $y)
{
    return "Result of Summition: " . $x + $y;
}

function sub($x, $y)
{
    return "Result of Substraction: " . $x - $y;
}

function calculate($x, $y, $math)
{
    echo $math($x, $y);
}

calculate(110, 233, "sum");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Callback Functions in PHP</title>
    <style>
        /* Styles for the <pre> tag */
        pre {
            font-family: Consolas, "Andale Mono WT", "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", "DejaVu Sans Mono", "Bitstream Vera Sans Mono", "Liberation Mono", "Nimbus Mono L", Monaco, "Courier New", Courier, monospace;
            font-size: 2em;
            white-space: pre-wrap;
        }
    </style>
</head>

<body>
    <pre><?php print_r(array_map("myCallback", $names)); ?></pre>
</body>

</html>