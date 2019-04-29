<?php
    
$ataskaita = [
    [
        'name' => 'IKI Darbo Uzmokestis',
        'amount' => 600,//Eur
    ],
    [
        'name' => 'Kalvariju Nacykas',
        'amount'=> -15,//Eur
    ],
    [
        'name' => 'Baras',
        'amount' => -250,//Eur
    ],
    [
        'name'  => 'AntrasBaras',
        'amount' => -200,//Eur
    ]
];

foreach ($ataskaita as $index => $irasas) {
    if ($irasas['amount'] > 0) {
        $ataskaita[$index]['css_class'] = 'positive';
    } else {
        $ataskaita[$index]['css_class'] = 'negative';
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ataskaita</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <style>
            .positive {
                color: yellow;
            }
            
            .negative {
                color: red;
            }
        </style>
    </head>
    <body>
        <ul>
            <?php foreach ($ataskaita as $irasas): ?>
                <li class="<?php print $irasas['css_class']; ?>">
                    <span><?php print $irasas['name']; ?></span>
                    <span><?php print $irasas['amount']; ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>


