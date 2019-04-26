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
    'Degtine',
    'Degtine',
    'Pica',
    'Gatve',
    'Lova',
    'Antradienis'
];
//    DRAUGO \/
$rand_flashback2 = rand(0, count($draugo_atmintis) - 1);
//    MANO \/
$rand_flashback = rand(0, count($mano_atmintis) - 1);
//    BENDRA \/
$bendra_atminitis = [];
foreach ($mano_atmintis as $prisiminimas) {
    $sutampa = in_array($prisiminimas, $draugo_atmintis);
    $duplikuojasi = in_array($prisiminimas, $bendra_atminitis);

    if ($sutampa && !$duplikuojasi) {
        $bendra_atminitis[] = $prisiminimas;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Array2+</title>
    </head>
    <body>
        <h1>Kas buvo penktadieni?</h1>
        <!--DRAUGO-->
        <h2>Draugo atmintis</h2>
        <p>
        <ul>
            <?php foreach ($draugo_atmintis as $value): ?> 
                <li>
                    <?php echo $value; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </p>
    <h3>Flashback</h3>
    <?php
    echo '#' . $rand_flashback2 . ': ' . $draugo_atmintis[$rand_flashback2];
    ?> 
    <p>
        <!--MANO-->
    <h2>Mano atmintis</h2>
    <ul>
        <?php foreach ($mano_atmintis as $value): ?> 
            <li>
                <?php echo $value; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</p>
<h3>Flashback2</h3> 
<?php
echo '#' . $rand_flashback . ': ' . $mano_atmintis[$rand_flashback];
?> 
<!--BENDRA-->
<h2>Sutape prisiminimai</h2>
<p>
<ul>
    <?php foreach ($bendra_atminitis as $prisiminimas): ?>
        <li>
            <?php
            echo $prisiminimas;
            ?>
        </li>
    <?php endforeach; ?>
</ul>
</p>
</body>
</html>
