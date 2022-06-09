<?php
/* 
 * Start Date: 12:30 AM, 10 Jun, 2022
 * End Date: 1:10 AM, 10 Jun, 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With XML Parser and SimpleXML Parser in PHP
 */

libxml_use_internal_errors(true); // to retrive errors

// Access the internal xml file
$xml = simplexml_load_file("index.xml") or die("Error: Cannot create object");

// If any error
if ($xml === false) {
    echo "Cannot load the XML file <br/>"; //show error message

    foreach (libxml_get_errors() as $error) {
        echo $error->message . "<br/>";
    }
} else {
    // We can access to xml node directly
    echo $xml->bio;
    echo "<br/>";

    // we can loop through them using key value pairs too
    foreach ($xml as $value) {
        echo "{$value} <br/>";
    }
}
