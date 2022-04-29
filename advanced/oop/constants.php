<?php
/* 
* Start Date: 1:30 AM, 30 April 2022
* End Date: 1:41 AM, 30 April 2022
* Author: Al Nahian (alnahian2003)
* Topic: Working with Constants in OOP PHP
*/

class greet
{

    const USER = "Al Nahian";

    public function goodMorning()
    {
        echo "Good Morning, " . self::USER;
    }
}

$greeting = new greet();

$greeting->goodMorning();
echo nl2br("\n");
echo "This is from outside of the class: Hello " . greet::USER;
