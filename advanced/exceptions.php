<?php
/* 
 * Start Date: 12:06 PM, 26 April 2022 
 * End Date: 1:15 PM, 26 April 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Exceptions in PHP
 */

function greet($name)
{
    if ((is_numeric($name) or is_countable($name) or is_bool($name)) == true) {
        throw new Exception("Please give your name!");
    }
    return "Hello, $name!";
}
try {
    echo greet("Al Nahian");
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

echo "<br>";

function getAge($birthYear)
{
    if ($birthYear > date("Y")) {
        throw new Exception("Birth Year can't be ahead of the current year");
    }
    return date("Y") - $birthYear;
}


try {
    echo getAge(2003);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
