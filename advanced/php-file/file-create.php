<?php
/* 
 * Start Date: 19 April, 2022
 * End Date: 1:25 PM 19 April, 2022
 * Author: Al Nahian (alnahian2003)
 * Topic: Working With Writing/Creating File Data in PHP
 */

// Create a non-existing file using fopen() function

$fileName = "numbers.txt";
$file = fopen($fileName, "w") or die("Couldn't Open The File");

$limit = 100;
for ($i = 0; $i <= $limit; $i++) {
    fwrite($file, "$i\n");
}

fclose($file);

// Function to convert numbers into words
function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '', trim($num));
    if (!$num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array(
        '', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array(
        '', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ($tens < 20) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '');
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . (($levels && (int) ($num_levels[$i])) ? ' ' . $list3[$levels] . ' ' : '');
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Files in PHP</title>
</head>

<body>
    <small>Last Modified on: <?php echo date("h:i:s l d, M Y", stat($fileName)["mtime"]); ?></small>
    <?php foreach (file($fileName) as $key => $value) : ?>
        <h4><?php echo $value . " = " . ucwords(convertNumberToWord($value)); ?></h4>
    <?php endforeach; ?>
</body>

</html>