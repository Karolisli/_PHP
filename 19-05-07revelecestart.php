<?php
//$x = 0;
//
//function change_x(&$x){
//    $x = 1;
//}
//
//change_x($x);
//print $x; //$x=1

//$x = 0;
//$b = &$x;
//unset($b);
//
//$b = 1;
//
//print $x; //$x=0

$sheep = ['beep'];


for ($avis = 0; $avis <= 5; $avis++) {
    $sheep[]= &$sheep[$avis];
}

foreach ($sheep as $key => $value) {
    unset($sheep[$key]);
    $sheep[$key] = $value;
}
$sheep[rand(0, 6)] = 'ble px';

var_dump($sheep);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        ?>
    </body>
</html>
