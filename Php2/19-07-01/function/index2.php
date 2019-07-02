<?php

/**
 * Saves array to file
 * @param array $array
 * @param string $file_name
 * @return boolean
 */
function array_to_file($array, $file_name) {
    $encoded_array = json_encode($array);
    $success = file_put_contents($file_name, $encoded_array);

    if ($success !== false) {
        return true;
    }
}
/**
 * Decoded array from file
 * @param type $file_name
 * @return array|boolean
 */
function file_to_array($file_name) {
    $encoded_string = file_get_contents($file_name);
    if ($encoded_string !== false && $encoded_string != '') {
        return json_decode($encoded_string, true);
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta carset="UTF-8">
        <meta name="viewport">
        <title>07.01</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

    </body>
</html>