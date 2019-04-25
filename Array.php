<?php

$array = [
    'Petras' => [
        'name'  => 'Perto Pizdzio',
        'conditioin' => 'prap*stas',
        'thing' => 'telefonas',
    ],
    'Tomas' => [
        'name'  => 'Tomo Ablomo',
        'conditioin' =>'naudojmas',
        'thing' => 'bulijonas',
    ],
    'Ana' => [
        'name'  => 'Anos Shitkovos',
        'conditioin' => 'pasibaiges',
        'thing' => 'rulonas',
    ]
];

var_dump($array);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Array3</title>
    </head>
    <body>
        <div class="startup">
            <span class="vardas">
                <?php print $array['Ana']['name']; ?>
            </span>
            <span class="daiktas">
                <?php print $array['Ana']['thing']; ?>
            </span>
            <span class="bukle">
                <?php print $array['Ana']['conditioin']; ?>
            </span>
        </div>
    </body>
</html>