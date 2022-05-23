<?php
/* 
 * Start Date: 11:30 PM, 23 May 2022 
 * End Date: 1:00 AM, 24 May 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Namespace in PHP OOP
 */

//  Let's create a 'namespace' called 'Teacher' first
namespace Teacher;

class Profile
{
    private $name, $age, $id;

    // Setters 
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setId(int $id)
    {
        $this->id = $id;
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

    public function getId()
    {
        return $this->id;
    }
}

// Generate random ID for the teacher
function generateId($age, $callback)
{
    // Generate some random number

    //$random = rand(1, 100); // Number between 1-100 

    $random = time(); // Current timestamp, better than random()

    return $callback . $age . $random;  // We'll embade the teacher's age and birthyear with the timestamp in order to generate a random ID
}
