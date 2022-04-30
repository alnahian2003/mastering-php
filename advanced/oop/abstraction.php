<?php
/* 
* Start Date: 1:30 PM, 30 April 2022
* End Date: 1:50 PM, 30 April 2022
* Author: Al Nahian (alnahian2003)
* Topic: Working with Abstraction in OOP PHP
*/


abstract class prefixedName
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    abstract protected function prefixName($gender);
}

class prefName extends prefixedName
{

    public function prefixName($gender)
    {
        $male = array("Male", "male", "MALE");
        $female = array("Female", "female", "FEMALE");
        if ($gender == in_array($gender, $male)) {
            $prefix = "Mr.";
        } elseif ($gender == in_array($gender, $female)) {
            $prefix = "Mrs.";
        } else {
            $prefix = "";
        }

        return "Hello {$prefix} {$this->name}";
    }
}

$person = new prefName("Al Nahian");

echo $person->prefixName("male"); // Prints Hello Mr. Al Nahian
