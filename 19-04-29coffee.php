<?php 
    $dishes= [
               'nut_salad' => [
                    'name' => 'nut salad',
                    'price' => 3.44,
                    'ingridients' => [
                        'nuts',
                        'jogurt'
                    ]
                ],
                'bulldish' => [
                    'name' => 'Bulldish',
                    'price' => 4.77,
                    'ingridients' => [
                        'rice',
                        'soja sause'
                    ]
                ]
            ];
    foreach ($dishes as $key =>$value){
        echo $key . '<br>';
        foreach ($value as $name => $names){
            echo $name .'<br>';
//            echo $names .'<br>';
//            foreach ($names as $some) {
////                echo $some .'<br>';
//            }
        }           
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>dishes</title>
    </head>
    <body>
        <ul>
            <?php foreach ($dishes as $key => $value): ?>
                <li>
                    <?php echo $key; ?>
                    <ul>
                        <?php foreach ($value as $name => $names): ?>
                            <li>
                                <?php echo $name . '<br>'; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            <?php endforeach; ?>
        </ul>
    </body>
</html>
