<?php
/* 
 * Start Date: 11:30 PM, 23 May 2022 
 * End Date: 
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Namespace in PHP OOP
 */

//  Let's create a 'namespace' called 'Student' first
namespace Student;

use Date;


class Profile
{
    private $name, $age, $roll;

    // Setters 
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setRoll(int $roll)
    {
        $this->roll = $roll;
    }

    // Getters
    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getRoll()
    {
        return $this->roll;
    }
}

// Also a function to test how it works in namespace mode
function birthYear($age)
{
    // set the default timezone to use.
    date_default_timezone_set("Asia/Dhaka");
    $year = date("Y"); // current year
    return $year - $age;
}
