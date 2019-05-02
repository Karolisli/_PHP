<?php

/**
 * generuoja dinamine matrica
 * @param integer $size matricos dydis
 * @return type
 */
function slot_box($size) {
    $array = [];
    
    for ($x = 0; $x <= $size; $x++) {
        $row = [];
        
        for ($z = 0; $z <= $size; $z++) {
            $row[] = rand(0, 1);
        }
        
        $array[] = $row;
    }
    return $array;
}

$size = 2;
var_dump(slot_box($size));
$matrix = (slot_box($size));

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Slot-box</title>
        <style>
            div {
                border: 3px solid white;
                padding: 40px;
                margin: 1px;
            }
            
            section {
                display: flex;
                justify-content: center;
                align-items: baseline;
            }
            
            .blue {
                background-color: blue;
            }
            
            .orange {
                background-color: orange;
            }
        </style>
    </head>
    <body>
            <?php foreach ($matrix as $row): ?>
            <section>
                <?php foreach ($row as $col): ?>
                    <?php if ($col > 0): ?>
                        <div class="blue"></div>
                    <?php else: ?>
                        <div class ="orange"></div>
                    <?php endif; ?>
            <?php endforeach; ?>
            </section>
<?php endforeach; ?>
    </body>
</html>
