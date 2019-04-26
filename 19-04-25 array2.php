<?php
    $mano_atmintis = [
        'Penktadienis',
        'Paskaita',
        'Baras',
        'Viskis',
        'Alus',
        'Degtine',
        'Alus',
        'Pirmadienis',
        'Paskaita'
    ];
    $rand_flashback = rand(0, count ($mano_atmintis) - 1); 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Array2+</title>
    </head>
    <body>
        <h1>Kas buvo penktadieni?</h1>
        <h2>Mano atmintis</h2>
        <p>
            <ul>
                <?php foreach($mano_atmintis as $value): ?> 
                <li>
                    <?php echo $value; ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </p>
        <h3>Flashback</h3> 
        <?php 
            echo '#' .$rand_flashback . ': ' . $mano_atmintis[$rand_flashback]; 
        ?> 
    </body>
</html>
