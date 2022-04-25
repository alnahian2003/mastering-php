<?php
/* 
 * Start Date: 12:18 AM, 26 April 2022
 * End Date: 
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With JSON in PHP
 */

// A life saver function to print a line break
function br()
{
    echo "</br>";
}

$names = array("Al Nahian" => date("Y") - 2003, "Jim Halpert" => date("Y") - 1979, "Michael Scott" => date("Y") - 1962, "Dwight K Schrute" => date("Y") - 1966, "Andy Bernard" => date("Y") - 1974, "Ryan Howard" => date("Y") - 1979); // we will use that variable to practice in this topic

// Convert an Array into JSON
$enc = json_encode($names);

// Create an Array data from a JSON data
$dec = json_decode($enc, true);


// Get JSON Data from a Fake JSON Server and display those data
$ch = curl_init();

$url = "https://reqres.in/api/users";

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

// Check for error
if ($error = curl_error($ch)) {
    echo $error;
} else {
    $data = json_decode($response, true);
    $data = $data["data"];
}
curl_close($ch);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP JSON</title>
    <style>
        html,
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        /* Styles for the <pre> tag */
        pre {
            font-family: Consolas, "Andale Mono WT", "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", "DejaVu Sans Mono", "Bitstream Vera Sans Mono", "Liberation Mono", "Nimbus Mono L", Monaco, "Courier New", Courier, monospace;
            font-size: 1.5rem;
            white-space: pre-wrap;
            border-left: 10px solid dodgerblue;
            padding: 10px;
            background-color: #f2f8ff;
        }

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

        .heading {
            text-align: center;
            font-size: 3rem;
        }

        .persons {
            /* Grid styles */
            display: grid;
            align-items: center;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            row-gap: 1rem;
            text-align: center;
            margin: 1rem;
        }

        .avatar {
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <!-- JSON Encode -->
    <h2>JSON Encoding:</h2>
    <pre>
<?php print_r($enc); ?>
</pre>
    <pre>
<?php var_dump($enc); ?>
</pre>


    <!-- JSON Decode -->
    <h2>JSON Decoding:</h2>
    <pre>
<?php print_r($dec); ?>
</pre>
    <pre>
<?php var_dump($dec);
print_r($data); ?>
</pre>


    <!-- Using the JSON object in html -->
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Birth Year</th>
        </tr>

        <!-- Iterate the JSON object and display values -->
        <?php
        $names = json_decode($enc, true);
        foreach ($names as $name => $age) {
        ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $age; ?></td>
                <td><?php echo abs($age - date("Y")); ?></td>
            </tr>
        <?php } // End foreach loop 
        ?>
    </table>

    <!-- JSON data from API -->
    <h1 class="heading">Behind The Team</h1>
    <div class="persons">
        <?php for ($i = 0; $i < count($data); $i++) { ?>
            <div class="person">
                <img src="<?php echo $data[$i]["avatar"] ?>" alt="<?php echo $data[$i]["first_name"] ?>" class="avatar">

                <h3 class="name"><?php echo $data[$i]["first_name"] . " " . $data[$i]["last_name"]; ?></h3>

                <p class="email"><?php echo $data[$i]["email"] ?></p>
            </div>
        <?php } ?>

        <?php foreach ($data as $person) { ?>
            <div class="person">
                <img src="<?php echo $person["avatar"] ?>" alt="<?php echo $person["first_name"] ?>" class="avatar">

                <h3 class="name"><?php echo $person["first_name"] . " " . $person["last_name"]; ?></h3>

                <p class="email"><?php echo $person["email"] ?></p>
            </div>
        <?php } ?>
    </div>
</body>

</html>