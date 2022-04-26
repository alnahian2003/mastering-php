<?php
/* 
 * Start Date:  
 * End Date: 
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Destructor in PHP OOP
 */

class Computer
{
    public $name;
    public $price;
    function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    function __destruct()
    {
        $this->name;
        $this->price;
    }
}


$pc = new Computer("Dell", 300);

echo "PC name is {$pc->name} and the price is: $$pc->price";

echo nl2br("\n");

class File
{
    public $fileName;
    public $handler;

    function __construct($fileName, $mode = "r")
    {
        $this->fileName = $fileName;
        // open the file
        $this->handler = fopen($fileName, $mode) or die("Couldn't find the file!");
    }

    function __destruct()
    {
        // close the file
        if ($this->handler) {
            fclose($this->handler);
        }
    }

    function readFile()
    {
        // read file contents
        return fread($this->handler, filesize($this->fileName));
    }
}


$readme = new File("../../readme.md");

print_r($readme->readfile());
