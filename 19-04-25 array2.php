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
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Array2</title>
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
    </body>
</html>