<?php
/* 
 * Date: 17 April, 2022
 * Time: Midnight, 12:05 AM
 * Author: Al Nahian (alnahian2003)
 * Topic: Form Validation in PHP
 */

// At first, we are gonna make a function named clean() that sanitizes, validates and clean the user input or any string for a better Form Validation.

function clean($info)
{
    // htmlspecialchars() will sanitize the data or information and help preventing XSS and other attacks.
    $info = htmlspecialchars($info);

    // trim() will clean all the unnecessary Whitespaces, Tabs, etc to acquire a fresher input from the user
    $info = trim($info);

    // stripslashes() will remove any '\' so that attackers couldn't be able to perform any XSS or other attacks.
    $info = stripslashes($info);

    return $info;
}

// Let's Test it out with the form data.
$successMessage = ""; // This will show a message on the body later on submit.

if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $username = clean($_POST["username"]);
    $message = clean($_POST["message"]);

    $successMessage = "Hey, {$username}! Here's your message: {$message}";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>

<body>
    <h1>Form Validation in PHP</h1>

    <!-- Display Success Message With Those inputs When the Form Gets Submitted Successfully -->
    <h4>
        <?php if (!empty($successMessage) && strlen($successMessage) > 0) {
            echo $successMessage;
        } ?>
    </h4>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <!-- Name -->
        <label for="uname">Username: </label>
        <br>
        <input id="uname" type="text" name="username" placeholder="Enter your username">
        <br>
        <br>
        <!-- Message -->
        <label for="msg">Message: </label>
        <br>
        <textarea name="message" id="msg" cols="30" rows="10" placeholder="Write your message..." maxlength="150"></textarea>
        <br>
        <input type="submit" name="submit" value="Send">
    </form>
</body>

</html>