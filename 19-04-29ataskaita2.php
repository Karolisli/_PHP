<?php

$atrinkti_zodziai = [];
$zodziai = [
    'jonas', 'dviratis', 'laukas', 'bėga', 'krenta', 'alus',
];

foreach ($zodziai as $zodis) {
    $pateko = rand(0, 1);
    
    //var_dump("tikrinam zodi: $zodis, pateko: $pateko");    
    
    if ($pateko) {
        $atrinkti_zodziai[] = $zodis;
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ataskaita</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text_balance/css" href="style.css">
    </head>
    <body>
        <ul> 
            <?php foreach ($atrinkti_zodziai as $atrinktas_zodis): ?>
                <li><?php print $atrinktas_zodis; ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
