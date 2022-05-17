<?php
/* 
* Start Date: 6:25 PM, 10 May 2022
* End Date: 
* Author: Al Nahian (alnahian2003)
* Topic: Working with Interfaces in OOP PHP
*/

// Line Break
function br()
{
    echo "</br>";
}

/*
 Let's think of a situation where we're building a game. There will be 3 types of players. First, simple regular players with some basic functionalities. Second, Desktop Players. We'll extend some more functionalities in this case. Finally, Console Players where will be the functions as the Desktop Players with some different functionalities. Let's do it!

 So, the interface structure will be like this:
 Basic = Regular Players
 Advanced = Regular Players -> Desktop Players 
 Pro = Regular Players -> Desktop Players -> Console Players 
 */

//  Interface for Regular Players
interface player
{
    // Basic Player Movements
    public function moveUp();
    public function moveDown();
    public function moveLeft();
    public function moveRight();
    public function move($callback); // it will take any other movement function as param

    // Basic Actions
    public function fire();
    public function reload();
    public function throw($throwableItemName); // Grenade, Flashbang, Rock, Weapon
}


//  Interface for Desktop Players
interface desktopPlayer extends player
{
    // Special Movements and Actions for Desktop Players Only
    public function prone();
    public function crouch();
    public function scope();
    public function weapons();
}


//  Interface for Console Players
interface consolePlayer extends desktopPlayer
{
    // Special Movements and Actions for Desktop Players Only
    public function bulletTime();
    public function melee();
    public function jump();
    public function swim();
    public function drive($vehicle); // Pass a Vehicle name
}



// Let's test it out!

// Basic
class Basic implements player
{
    function moveUp()
    {
        echo "Player Has Moved to the Up" . br();
    }
    function moveDown()
    {
        echo "Player Has Moved to the Down" . br();
    }
    function moveLeft()
    {
        echo "Player Has Moved to the Left" . br();
    }
    function moveRight()
    {
        echo "Player Has Moved to the Right" . br();
    }
    // Basic Player Movements
    function move($callback)
    {
        echo "Player Has Moved to the " . ucfirst(strtolower($callback)) . br();
    }

    // Basic Actions
    function fire()
    {
        echo "Player has shot a bullet!" . br();
    }
    function reload()
    {
        echo "Reloading weapon 🔃" . br();
    }
    function throw($throwableItemName)
    {
        echo "Player has thrown a {$throwableItemName}" . br();
    } // Grenade, Flashbang, Rock, Weapon
}

class Advanced extends Basic implements desktopPlayer
{
    function prone()
    {
        echo "Player switched to Prone" . br();
    }
    function crouch()
    {
        echo "Player switched to Crouch" . br();
    }
    function scope()
    {
        echo "Player opened Scope for Sniping" . br();
    }
    function weapons()
    {
        echo "Choose a Weapon" . br();
    }
}

class Pro extends Advanced implements consolePlayer
{
    function bulletTime()
    {
        echo "Bullet Time is Running" . br();
    }
    function melee()
    {
        echo "Player performed a melee attack" . br();
    }
    function jump()
    {
        echo "Player Jumped" . br();
    }
    function swim()
    {
        echo "Player is Swimming" . br();
    }
    function drive($vehicle)
    {
        echo "Player is Driving a {$vehicle}" . br();
    }
}

// Basic Player
$basicPlayer = new Basic();
$basicPlayer->move("Down");
$basicPlayer->reload();


// Advanced Player
$advanced = new Advanced();
$advanced->crouch();

// Pro Player
$pro = new Pro();
$pro->swim();
$pro->moveDown();
