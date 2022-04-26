<?php
/* 
 * Start Date: 10:36 PM, 26 April 2022 
 * End Date: 
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Constructor in PHP OOP
 */

class Person
{
    public $name;
    public $age;
    public $gender;

    function __construct($name, int $age, $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    function getName()
    {
        return $this->name;
    }
}

$person1 = new Person("Al Nahian", 19, "Male");

$name = $person1->getName();
$age = $person1->age;
$gender = $person1->gender;
echo "$name is a $age years old $gender";
