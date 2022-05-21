<?php
/* 
* Start Date: 11:20 AM, 21 May 2022
* End Date: 12:30 AM, 21 May 2022
* Author: Al Nahian (alnahian2003)
* Topic: Working with Static Method in OOP PHP
*/

// Line Break 
function lbr()
{
    return "</br>";
}

// Method inside the class must have 'static' keyword to declare a Static Property
class MyClass
{
    // Static Method
    public static function sayHello()
    {
        return "Hello World";
    }

    // Non Static Method
    public function sayHi()
    {
        return "Hi, Bangladesh!";
    }

    /* 
    A static method can be accessed from a method in the same class using the self keyword and double colon (::)
    */

    // Non Static Method from a Static Method.
    public function ask()
    {
        echo "From ask() function: " . self::sayHello() . lbr();
    }
}

// To instantiate the static method, use :: to call it.
echo "Without any instance: " . MyClass::sayHello() . lbr(); // Hello World


$obj = new MyClass();

echo "From sayHello() function: " . $obj->sayHello() . lbr();
echo "From sayHi() function: " . $obj->sayHi() . lbr();
$obj->ask();


// Call a static method from one class to another
// use this method to call a static method from another class "className::staticMethodName()"
lbr();
class Human
{
    public static function walk()
    {
        return MyClass::sayHello() . ", I'm Walking 👣";
    }
}

echo "From a different class: " . Human::walk() . lbr();


// Calling static method from child class

class ParentClass
{
    public static function sayName()
    {
        return "Hello! My name is ";
    }
}


class ChildClass extends ParentClass
{
    public function myName($name)
    {
        //echo $this->sayName() . $name; // this one works as well
        return Parent::sayName() . $name;
    }
}


$nm = new ChildClass();
echo "From Parent Class to Child Class: " . $nm->myName("Nahian");
