<?php
/* 
 * Date: 17 April, 2022
 * Time: Midnight, 1:59 AM
 * Author: Al Nahian (alnahian2003)
 * Topic: Form Required Fields Validation in PHP
 */

// STEP 1: At first, we are gonna sanitize, validate and clean the user input or any string like we did before on form-validation.php
function clean($info)
{
    $info = htmlspecialchars($info);
    $info = trim($info);
    $info = stripslashes($info);

    return $info;
}

// Function to display the valid only error message. Errors will only be shown if it's not empty and it has a length of more than 0
function dispError($err)
{
    if (!empty($err) && strlen($err) > 0) {
        echo $err;
    }
}

// Retrive Form Value and Display Them on Their Own Input Fields
function showValue($inputFieldName)
{
    if (isset($inputFieldName) && !empty($inputFieldName) && strlen($inputFieldName) > 0) {
        echo $inputFieldName;
    }
}

// Remain checked when the form is submitted
function checked($radio, $value)
{
    if (isset($radio) && !empty($radio) && $radio == $value) {
        echo "checked";
    }
}

// STEP 2: Now, let's think of a Form that helps user to sign up. Obviously the form may have some 'required' input fields. So, we need to use PHP to validate those required fields properly.

// If the user leaves a required field empty, then on submit, an error message will be shown. Otherwise we'll use those values and assign them to variables.

// Check for the form submit and do validations
$errUsername = $errEmail = $errGender = $errPassword = "";
$username = $email = $gender = $password = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    // Username
    if (!empty($_POST["username"]) && strlen($_POST["username"]) > 0) {
        $username = clean($_POST["username"]);
    } else {
        $errUsername = "Username is required*";
    }

    // Email 
    if (!empty($_POST["email"]) && strlen($_POST["email"]) > 0) {
        $email = clean($_POST["email"]);
    } else {
        $errEmail = "Email Address is required*";
    }

    // Gender 
    if (!empty($_POST["gender"]) && strlen($_POST["gender"]) > 0) {
        $gender = clean($_POST["gender"]);
    } else {
        $errGender = "Gender is required*";
    }

    // Password 
    if (!empty($_POST["password"]) && strlen($_POST["password"]) > 0) {
        $password = clean($_POST["password"]);
    } else {
        $errPassword = "Password is required*";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Required Fields Validation</title>
    <style>
        html,
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

            font-size: 1.2rem;
        }

        .err {
            color: red;
            font-weight: bold;
        }

        .succ {
            color: green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Sign Up</h1>
    <!-- Display Success Message After a Successful Form Submission, Otherwise Just Display The Form -->
    <?php
    if ($username && $email && $gender && $password) {
        $successMsg = "<h4 class='succ'>✔ Account created successfully!<h4>";

        echo $successMsg;
    } else {
    ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Username -->
            <label for="usrnme">Username: </label>
            <input type="text" name="username" placeholder="Enter a username" id="usrnme" value="<?php showValue($username); ?>">
            <span class="err"><?php dispError($errUsername); ?></span>
            <!-- end: Username -->

            <br>
            <br>
            <label for="email">Email Address: </label>
            <!-- Email -->
            <input type="email" name="email" id="email" value="<?php showValue($email); ?>" placeholder="Enter your email address">
            <span class="err"><?php dispError($errEmail); ?></span>
            <!-- end: Email -->

            <br>
            <br>
            <!-- Gender -->

            Gender:
            <input type="radio" name="gender" id="gen_mal" <?php checked($gender, "Male"); ?> value="Male"><label for="gen_mal">Male</label>

            <input type="radio" name="gender" id="gen_fem" <?php checked($gender, "Female"); ?> value="Female"><label for="gen_fem">Female</label>

            <input type="radio" name="gender" id="gen_ni" <?php checked($gender, "Other"); ?> value="Other"><label for="gen_ni">Other</label>
            <span class="err"><?php dispError($errGender); ?></span>
            <!-- end: Gender -->

            <br>
            <br>
            <!-- Password -->
            <label for="pass">Passowrd: </label>
            <input type="password" name="password" placeholder="Enter a strong password" value="<?php showValue($password); ?>" id="pass">
            <span class="err"><?php dispError($errPassword); ?></span>
            <!-- end: Password -->
            <br>
            <br>
            <!-- Submit -->
            <input type="submit" name="submit" value="Create Account">
            <!-- end: Submit -->
        </form>
    <?php
    }
    ?>
</body>

</html>