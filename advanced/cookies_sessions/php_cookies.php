<?php
/* 
 * Start Date: 12:06 AM, 22 April, 2022
 * End Date: 1:44 AM, 22 April, 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Cookies in PHP
 */
$cookieName = "user";
$cookieValue = "alnahian2003";
$cookieExp = time() + (86400 * 7); // Cookie expires within 7 days
setcookie($cookieName, $cookieValue, $cookieExp, "/");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Cookies</title>
</head>

<body>
    <h1>Working with PHP Cookies</h1>
    <p>
        <?php
        // Check for the cookie availability
        if (!isset($_COOKIE[$cookieName])) {
            echo "Cookie \"{$cookieName}\" isn't created yet!";
        } else {
            echo "Cookie \"{$cookieName}\" Created! </br>";
            echo "Cookie value: {$_COOKIE[$cookieName]}";
        }
        ?>
    </p>
    <p>
        <?php
        // check whether cookies are enabled or not
        if (count($_COOKIE) > 0) {
            echo "Cookies are ENABLED";
        } else {
            echo "Cookies are DISABLED";
        }
        ?>
    </p>

    <h3>
        <?php
        // Site visit counter using PHP Cookie
        $cookie_name = "counter";
        $cookie = 1;
        if (!isset($_COOKIE[$cookie_name])) {
            echo "Welcome, You're Visiting This Page for the very first time!";
            setcookie($cookie_name, $cookie);
        } else {
            $cookie = ++$_COOKIE[$cookie_name]; // Pre increment the value on each page visit
            setcookie($cookie_name, $cookie);
            echo "You've visited this page for {$_COOKIE[$cookie_name]} times";
        }
        ?>
    </h3>
</body>

</html>