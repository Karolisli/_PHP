<?php
//$array = ['b','x', 'x', 'b', 's'];
//
//function count_values($array, $val){
//    $atrinktieji = 0;
//    foreach($array as $value){
//        if ($value == $val){
//            $atrinktieji++;
//        }
//    }
//    return $atrinktieji;
//}
//print count_values($array, 'x');

$array = ['b', 'x', 'x', 'b', 's'];

function change_values(&$array, $val_form, $val_to) {
    foreach ($array as &$value) {
        if ($value == $val_form) {
            $value = $val_to;
        }
    }
}

change_values($array, 'x', 'M');
var_dump($array);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>homework</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
