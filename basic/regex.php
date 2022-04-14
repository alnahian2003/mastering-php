<?php
/* 
 * Date: 15 April, 2022
 * Time: Midnight, 1:49 AM
 * Author: Al Nahian (alnahian2003)
 * Topic: RegEx - Regular Expressions
 */

// Basic Getting Started With RegEx in PHP
$str = "Hello, My Name is alnahian2003";
$exp = "/nahian/i";

// Match the string 'nahian' in $str case-insensitively using regEx.
function matchString($expression, $string)
{
    if (preg_match($expression, $string)) {
        // Return 'Found' if the matched string found
        return "Found :D";
    } else {
        // Return 'Sorry, Not Found' if can't match the string
        return "Sorry, Not Found :(";
    }
}

// Let's test this simple case
echo matchString($exp, $str);
