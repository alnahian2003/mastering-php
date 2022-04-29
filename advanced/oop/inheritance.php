<?php
/* 
* Start Date: 12:20 AM, 30 April 2022
* End Date: 1:15 Am, 30 April 2022
* Author: Al Nahian (alnahian2003)
* Topic: Working with Inheritance in OOP PHP
*/

class Computer
{
    public $processor;
    public $motherboard;
    protected $ram;
    private $gpu;

    public function __construct($proc, $moth, $gpu, $price)
    {
        $this->processor = $proc;
        $this->motherboard = $moth;
        $this->setGpuPrice($gpu, $price);
    }

    public function setGpuPrice($gpuName, $price)
    {
        $this->gpu = $gpuName;
        echo $this->gpu . " Price is ৳" . number_format($price);
    }
}

class Laptop extends Computer
{
    public $brand;
    protected $os;
    private $price;

    public function __construct($brandName, $osName, $price)
    {
        $this->brand = $brandName;
        $this->price = $price;
        $this->setOperatingSys($osName);
        $this->getStatus();
    }

    protected function setOperatingSys($osName)
    {
        $this->os = $osName;
    }

    private function getStatus()
    {
        echo $this->brand . " Laptop with the " . $this->os . " operating system will cost ৳" . number_format($this->price);
    }
}

$pc = new Computer("Intel Core i3 10th Gen", "Gigabyte", "Nvidia GTX 3000ti", 50000);


echo nl2br("\n");

$laptop = new Laptop("Asus", "Windows 10", 35000);
