<?php
/* 
* Start Date: 1:59 PM, 30 April 2022
* End Date: 
* Author: Al Nahian (alnahian2003)
* Topic: Working with __get() & __set() Magic Methods in OOP PHP
*/

class Human
{
    public $name;
    private $age;
    private $gender;

    public function __construct($name, $age, $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    // For getting property value
    public function __get($prop)
    {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    // For setting property value
    public function __set($prop, $value)
    {
        if (property_exists($this, $prop)) {
            $this->$prop = $value;
        }
        return $this;
    }
}


$person = new Human("Jennifer", 35, "Female");

$person->__set("name", "Al Nahian");
$person->__set("gender", "Male");
$person->__set("age", 18);

echo $person->__get("name");
echo $person->__get("age");
