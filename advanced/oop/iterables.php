<?php
/* 
* Start Date: 9:21 PM, 29 May 2022
* End Date: 10:19 PM, 29 May 2022
* Author: Al Nahian (alnahian2003)
* Topic: Working with Iterables in OOP PHP

* Iterables is a kind of data type. The 'iterable' keyword can be used as a data type of a function argument or as the return type of a function
*/

function test(iterable $data)
{
    foreach ($data as $value) {
        echo "{$value}<br>";
    }
}

$data = [
    "Name" => "Al Nahian",
    "Age" => date("Y") - 2003,
];
test($data);


// Return iterable

function getIterable(): iterable
{
    return [
        "Name" => "Al Nahian",
        "Age" => date("Y") - 2003,
    ];
}

$iterate = getIterable();

foreach ($iterate as $value) {
    echo "{$value}<br>";
}


/**
 An iterator must have these methods:

 * • current() - Returns the element that the pointer is currently pointing to. It can be any data type

 * • key() Returns the key associated with the current element in the list. It can only be an integer, float, boolean or string

 * • next() Moves the pointer to the next element in the list

 * • rewind() Moves the pointer to the first element in the list

 * • valid() If the internal pointer is not pointing to any element (for example, if next() was called at the end of the list), this should return false. It returns true in any other case
 */


//  Let's create an Iterator class

class PersonalIterator implements Iterator
{
    private $iterableItems = [];
    private $pointer = 0;

    public function __construct($items)
    {
        $this->iterableItems = array_values($items);
    }

    public function current()
    {
        return $this->iterableItems[$this->pointer];
    }

    public function key()
    {
        return $this->pointer;
    }

    public function next()
    {
        $this->pointer++;
    }

    public function rewind()
    {
        $this->pointer = 0;
    }

    public function valid()
    {
        return $this->pointer < count($this->iterableItems);
    }

    public function printIterable(iterable $myIterable)
    {
        foreach ($myIterable as $value) {
            echo "{$value}<br>";
        }
    }
}

$iterator = new PersonalIterator(["Al Nahian", "Abdullah Al Nahian", "alnahian2003"]);

$iterator->printIterable($iterator);
