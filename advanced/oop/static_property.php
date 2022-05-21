<?php
/* 
* Start Date: 12:59 AM, 21 May 2022
* End Date: 1:22 AM, 21 May 2022
* Author: Al Nahian (alnahian2003)
* Topic: Working with Static Property in OOP PHP
*/

// Line Break 
function lbr()
{
    return "</br>";
}

// Use almost the same way to use static property in a class like a static method 
class MyClass
{
    public static $name = "Al Nahian";
}

echo "Hello, My Name is " . MyClass::$name . lbr();



class AnotherClass extends MyClass
{
    public function setName($newName)
    {
        parent::$name = $newName;

        return $newName;
    }
}

$obj = new AnotherClass();
echo "My New Name is " . $obj->setName("Abdullah Al Nahian");
