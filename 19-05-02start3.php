<?php

/**
 * generuoja dinamine matrica
 * @param integer $size matricos dydis
 * @return type
 */
function slot_box($size) {
    $array = [];
    for ($x = 0; $x <= $size; $x++) {
        $row = [];
        for ($z = 0; $z <= $size; $z++) {
            $row[] = rand(0, 1);
        }
        $array[] = $row;
    }
    return $array;
}

$size = rand(1, 5);
var_dump(slot_box($size));

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Slot-box</title>
    </head>
    <body>
        <?php
// put your code here
        ?>
    </body>
</html>

