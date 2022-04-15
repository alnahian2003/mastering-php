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


echo "</br>"; // Line Break for a Better Visibility

/*
 * Let's see how many maches we can find in a string using PHP regEx function preg_match_all()
 */

$longString = "The quick brown fox jumps over the lazy dog"; // The String

//$pattern = null; 
// For now it's a null. But we will assign it dynamically through the totalMatch() function's parameter

function totalMatch($keyword, $string, $case = true)
{
    // global $pattern;
    /*
     * Assign the expression through the given keyword as parameter.
     * Check for the case sensitivity incase of given boolean cases.
     */
    $pattern = $case == (is_bool($case) && true) ?  "/$keyword/i" : "/$keyword/";

    // Display the result immediately if the matches are more than 0. Otherwise display error or something.
    if (preg_match_all($pattern, $string) > 0) {
        echo "'{$keyword}' found " . preg_match_all($pattern, $string) . " times.";
    } else {
        echo "Sorry, '{$keyword}' Not Found !";
    }
}

// Let's Give it a Try
totalMatch("he", $longString, false); // Expected Result: 'he' found 2 times

echo "</br>";

/*
 * Replacing a string with another made easy using preg_replace() function.
 */

$str1 = "I Love JavaScript";

echo $str1 . "<br>";

function replaceString($pattern, $keyword, $string, $case = true)
{
    $pattern = $case == (is_bool($case) && true) ?  "/$pattern/i" : "/$pattern/";

    // Replace the string if it only matches
    if (preg_match($pattern, $string)) {
        echo preg_replace($pattern, $keyword, $string);
    } else {
        echo "Unable to replace. No matches found";
    }
}

// Let's Test
replaceString("JavaScript", "PHP", $str1); // Expected Result: I Love PHP
// (HAHA, I just made stuffs hard to understand :P LOL);


/* 
 Finally I've completed learning the basic uses of Regular Expressions in PHP. 16 APR 22, 12:42 AM
*/