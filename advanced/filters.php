<?php
/* 
 * Start Date: 12:27 AM, 25 April, 2022
 * End Date: 1:50 AM, 25 April, 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Basic to Advancrd Filters in PHP
 */
function br()
{
    echo "</br>";
}

// Sanitize a String using filter_var()
$greet = "<h1>Welcome, Al Nahian!</h1>";
echo htmlspecialchars($greet);
br();
echo filter_var($greet, FILTER_SANITIZE_STRING);
/* Note: FILTER_SANITIZE_STRING is deprecated in PHP 8.0 ... htmlspecialchars() is the savior */

// Validating an Integer
$num = 0;
if (filter_var($num, FILTER_VALIDATE_INT) == true || filter_var($num, FILTER_VALIDATE_INT) === 0) {
    echo "$num is a valid integer." . br();
} else {
    echo "$num is not a valid integer." . br();
}

// Validating an IP Address
$ip = "10.16.100.244";
if (filter_var($ip, FILTER_VALIDATE_IP) == true) {
    echo "<strong>$ip</strong> is a valid ip address!" . br();
} else {
    echo "<strong>$ip</strong> is not a valid ip address!" . br();
}

// Sanitize an Email Address
$email = "ex amp le @ex am pl   e. com";
echo "Before Sanitization: " . $email . br();
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
echo "After Sanitization: " . $email . br();

// validate an email address
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo "<strong>$email</strong> is a valid email address!" . br();
} else {
    echo "<strong>$email</strong> is not a valid email address!" . br();
}

// Sanitize a URL
$url = "https://alnahian2003.github.io/বাংলা";
echo "Before Sanitization: " . $url . br();
$url = filter_var($url, FILTER_SANITIZE_URL);
echo "After Sanitization: " . $url . br();

// Validate url
if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
    echo "<strong>$url</strong> is a valid URL" . br();
} else {
    echo "<strong>$url</strong> is not a valid URL" . br();
}

// Validate an Integer Within a Range
$age = 99; // Variable to check
$minAge = 16; // minimum number
$maxAge = 96; // maximum number
$condition = filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range" => $minAge, "max_range" => $maxAge)));
if ($condition == true) {
    echo "You are eligible to view the site." . br();
} else {
    echo "You are not eligible to view the site!" . br();
}

// Validate a URL that contains Query String
$theUrl = "https://site.com?activated=true";
if (filter_var($theUrl, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) == true) {
    echo "The URL has query strings" . br();
} else {
    echo "The URL does not contains any query string" . br();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter/Sanitize in PHP</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Filter Name</th>
            <th>Filter ID</th>
        </tr>
        <?php
        foreach (filter_list() as $id => $filter) {
            echo '<tr><th>' . $filter . '</th><td>' . filter_id($filter) . '</td></tr>';
        }
        ?>
    </table>
</body>

</html>