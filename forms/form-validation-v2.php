<?php
/* 
 * Date: 17 April, 2022
 * Time: 
 * Author: Al Nahian (alnahian2003)
 * Topic: Advanced Form Validation in PHP
 */

/* 
Regular Expression will be useful to validate inputs more specifically. I'm gonna use some basic regular expressions to validate Name, Email Address and Url. 
*/

// Functions from previous topics
function dispError($err)
{
    if (!empty($err) && strlen($err) > 0) {
        echo $err;
    }
}

function clean($info)
{
    $info = htmlspecialchars($info);
    $info = trim($info);
    $info = stripslashes($info);

    return $info;
}

// ## Let's Do it ##

$name = $errName = $email = $errEmail = $url = $errUrl =  "";
// Check for the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Validate Name Input Field
    $name = clean($_POST["name"]);
    
    // Check if name only contains letters and whitespace
    $pattern = "/^[a-zA-Z-']*$/";
    if (!preg_match($pattern, $name)) {
        $errName = "'$name' is not allowed! Only letters and white space allowed.";
    }

    // Validate Email Input Field
    $email = clean($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Please type a valid E-Mail Address!";
    }

    // Validate Url/Website Link Input Field
    $url = clean($_POST["website"]);
    $pattern = "/\b(?:(?:https?|http?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"; // I don't even know what the heck is mean by this! 
    if (!preg_match($pattern, $url)) {
        $errUrl = "The URL is not valid! Please re-enter a valid one.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation V2</title>
    <style>
        html,
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 1.5rem;
        }

        .err {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>E-Mail/URL input validation</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <span class="err"><?php dispError($errName); ?></span>
        <br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Enter your email address">
        <span class="err"><?php dispError($errEmail); ?></span>
        <br><br>
        <label for="website">Website Url: </label>
        <input type="url" name="website" id="website" placeholder="https://example.com">
        <span class="err"><?php dispError($errUrl); ?></span>

        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>