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
    $draugo_atmintis = [
        'Baras',
        'Viskis',
        'Alus',
        'Degtine'
    ];
    $rand_flashback2 = rand(0, count ($draugo_atmintis) - 1);        
    $rand_flashback = rand(0, count ($mano_atmintis) - 1); 
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Array2+</title>
    </head>
    <body>
        <h1>Kas buvo penktadieni?</h1>
        <h2>Draugo atmintis</h2>
        <p>
            <ul>
                <?php foreach($draugo_atmintis as $value): ?> 
                <li>
                    <?php echo $value; ?>
                </li>
                 <?php endforeach; ?>
            </ul>
        </p>
        <h3>Flashback</h3>
        <?php 
            echo '#' .$rand_flashback2 . ': ' . $draugo_atmintis[$rand_flashback2]; 
        ?> 
        <p>
            <h2>Mano atmintis</h2>
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
