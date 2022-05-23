<?php
/* 
 * Start Date: 11:30 PM, 23 May 2022 
 * End Date: 1:00 AM, 24 May 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Namespace in PHP OOP
 */

use function Teacher\generateId as ID;

require "namespace1.php"; // Class of Students
require "namespace2.php"; // Class of Teachers

// Basic Use of Namespace
{
    $teacher = new Teacher\Profile();

    $teacher->setName("Al Nahian"); //  set a name for the teacher

    echo "Welcome, dear teacher " . $teacher->getName(); // get the teacher name

    // Let's get the birthyear of the teacher
    $teacher->setAge(19); // set teacher age first to get the birth year

    echo "<br>";

    // Generate a random userId
    $randomId = ID($teacher->getAge(), \Student\birthYear($teacher->getAge()));

    echo "{$teacher->getName()}'s unique ID is: {$randomId}";
}

echo "<br>"; {
    $student = new Student\Profile();

    $student->setName("Abdullah"); //  set a name for the teacher

    echo "Hello, " . $student->getName() . " have you prepared your lesson today?"; // get the student name
    echo "<br>";

    // Let's get the birthyear of the student
    $student->setAge(19); // set student age first to get the birth year
    echo "Birth Year of {$student->getName()} is " . Student\birthYear($student->getAge());
}
