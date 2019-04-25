<?php

$grikiai_start = 5000;
$praejo_dienu = 0;

for ($grikiai = $grikiai_start; $grikiai > 0; $grikiai -= rand(200, 500)) {
    $praejo_dienu++;
    //print "suvalgysiu $per_diena ir liks $grikiai grikiu <br>";
}

$date = date('Y-M-d', strtotime("+$praejo_dienu days"));
$text = "Jei turesiu $grikiai_start g. grikiu, valgysiu juos $praejo_dienu dienu."
        . " Jei pradesiu siandien, grikiai baigsis $date data";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>ciklai</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <p><?php print $text; ?></p>
    </body>
</html>