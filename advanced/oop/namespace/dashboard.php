<?php

/**
 * Let's assume we're building a website where admin and users (basically subscribers) can login, logout from their dashboard. So, we're gonna use namespace to organize their roles perfectly
 */

use Users\Role\Administrator\Actions as Admin;
use Users\Role\Subscriber\Actions as Subscriber;

// use \Role\Admin as Admin;
// use \Role\Subscriber as Subscriber;

require "admin.php";
require "subscriber.php";

$newAdmin = new Admin();

$newAdmin->login();

echo "<br>";

$newSubscriber = new Subscriber();
$newSubscriber->logout();
