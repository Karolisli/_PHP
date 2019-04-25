<?php

$array = [
    'kiausiniai' => [
        'name' => 'Kiaušinis',
        'amount' => 1,
        'size' => 'didelis',
    ],
    'baklazanai' => [
        'name' => 'Baklažanas',
        'amount' => 1,
        'size' => 'mazas',
    ],
    'grietine' => [
        'name' => 'Grietinė',
        'amount' => 1,
        'size' => 'mazas',
    ]
];

var_dump($array);

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Array</title>
    </head>
    <body>
        <div class="produktas">
            <span class="pavadinimas">
                <?php print $array['grietine']['name']; ?>
            </span>
            <span class="kiekis">
                <?php print $array['grietine']['amount']; ?>   
            </span>
            <span class="dydis">
                <?php print $array['grietine']['size']; ?>
            </span>
        </div>
    </body>
</html>