<?php
// Uzkraunam visus reikalingus failus
require 'config.php';
require 'functions/file.php';
require 'functions/html/builder.php';
require 'functions/form/core.php';

$nav = [
    'navigation' => [
        [
            'url' => 'index.php',
            'title' => 'Index'
        ],
        [
            'url' => 'create.php',
            'title' => 'Create'
        ],
        [
            'url' => 'join.php',
            'title' => 'Join'
        ],
        [
            'url' => 'play.php',
            'title' => 'Play'
        ],
        [
            'url'=> 'score.php',
            'title' => 'Score'
        ],
    ]
];

$form = [
    'attr' => [
        //'action' => '', Neb8tina, jeigu action yra ''
        'method' => 'POST',
    ],
    'fields' => [
        'team_name' => [
            'label' => '',
            'type' => 'text',
            'extra' => [
                'attr' => [
                    'class' => 'my-test-field',
                    'placeholder' => 'Team name'
                ],
                'validators' => [
                    'validate_not_empty',
                    'validate_not_the_same',
                    // 'validate_duplicates'
                ]
            ],
        ],
        // 'select_a_team' => [
        //     'type' => 'select',
        //     'label' => 'Choose a team',
        //     'value' => 1, // Koreliuoja su options pasirinkimo indeksu
        //     'options' => [
        //         'The leg-less',
        //         'Loot box',
        //         'Steam keys'
        //     ],
        //     'extra' => [
        //         'attr' => [
        //             'class' => 'my-select-field',
        //         ],
        //         'validators' => [
        //             'validate_not_empty'
        //         ]
        //     ]
        // ]
    ],
    'buttons' => [
        'create' => [
            'title' => 'Create a team',
            'extra' => [
                'attr' => [
                    'class' => 'blue-btn'
                ]
            ]
        ],
        // 'delete' => [
        //     'title' => 'NO',
        //     'extra' => [
        //         'attr' => [
        //             'class' => 'red-btn'
        //         ]
        //     ]
        // ]
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

function validate_not_the_same($field_input, &$form){
    if (file_exists(STORAGE_FILE)) {
        $teams = file_to_array(STORAGE_FILE);
        if (!empty($teams)) {
            foreach ($teams as $team) {
                if ($team['team_name'] == $field_input) {
                    $field['error'] = 'Team already exists!';
                    return null;
                } else {
                    $field['error'] = 'Team added!';
                }
            }
        }
    }
    return true;
}

// function validate_duplicates($field_input, &$form){
//     if(file_exists($filename)){
//         $teams = file_to_array(STORAGE_FILE);
//         if($teams){
//             foreach($teams as $teams_id => $team){
//                 if($team['team_name'] === $field_input){
//                     $field['error'] = 'Already exist';
//                     return false;
//                 }
//             }
//         }
//         return true;
//     }
// }
function form_fail($filtered_input, &$form) {
    var_dump('Form failed!');
}

function form_success($filtered_input, &$form) {
    $new_team = [];
    $old_team = file_to_array(STORAGE_FILE);
    if (!empty($old_team)) {
        $new_team = $old_team;
    }
    $new_team[] = $filtered_input;
    array_to_file($new_team, STORAGE_FILE);
}

// Get all data from $_POST
$input = get_form_input($form);

// If any data was entered, validate the input
if (!empty($input)) {
    $success = validate_form($input, $form);
    $message = $success ? 'Team added!' : 'Team already exists!';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome To Piz2a Ball!</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <script src="media/js/app.js"></script>    
    </head>
    <body>
        <!-- $nav Navigation generator -->
        <?php require 'templates/navigation.tpl.php'; ?>        

        <?php if (isset($message)): ?>
            <div class="message">
                <span class="text"><?php print $message; ?></span>
                <span class="close">X</span>
            </div>
        <?php endif; ?>

        <!-- $form HTML generator -->
        <?php require 'templates/form.tpl.php'; ?>
    </body>
</html>
