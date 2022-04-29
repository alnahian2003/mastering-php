<?php
/* 
 * Start Date: 11:20 PM, 29 April 2022
 * End Date:
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Access Modifier in PHP OOP
 */

//  public | protected | private

class Human
{
    public $name;

    protected $organs = array("✋", "👀", "🦵", "👄", "👅", "👂", "👃");

    private $gender = array("👦", "👧");

    function __construct($name, array $organs, $gender)
    {
        $this->name = $name;
        $this->organs = $organs;
        $this->gender = $gender;
    }

    protected function setOrgans(array $names)
    {
        $this->organs = $names;
    }

    private function setGender($gen)
    {
        $this->gender = $gen;
    }
}


$person = new Human("Al Nahian", array("Hands", "Nose"), "Male");
var_dump($person);

$person->setOrgans(array("Chin", "Chest")); // Throws an error
$person->setGender("Man"); // Throws an error
var_dump($person);
