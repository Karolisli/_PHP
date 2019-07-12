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

$komandos_array = get_team_names();

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
                    'placeholder' => 'Nikas'
                ],
                'validators' => [
                    'validate_not_empty',
                    'validate_not_the_same',
                    // 'validate_duplicates'
                ]
            ],
        ],
        'select_a_team' => [
            'type' => 'select',
            'label' => 'Choose a team',
            'value' => 1, // Koreliuoja su options pasirinkimo indeksu
            'options' => $komandos_array,
            'extra' => [
                'attr' => [
                    'class' => 'my-select-field',
                ],
                'validators' => [
                    'validate_not_empty'
                ]
            ]
        ]
    ],
    'buttons' => [
        'create' => [
            'title' => 'Join a team',
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

function get_team_names(){
    $komandos = [];
    $file_data = file_to_array(STORAGE_FILE);
    if($file_data){
        foreach ($file_data as $team_id => $team){
            $komandos[] = $team['team_name'];
        }
    }
    return $komandos;
}


function form_fail($filtered_input, &$form) {
    var_dump('Form failed!');
}

function form_success($filtered_input, &$form) {
    // $team = [
    //     'team_name' => $filtered_input['team_name'],
    //     'score' => 0,
    //     'players' => [],
    // ];
    $data = [];
    $file_data = file_to_array(STORAGE_FILE);
    if($file_data){
        $data = $file_data;
    }
    $team_index = $filtered_input['team_select'];
    $team = &$file_data['team_index'];
    $data[] = $team;
    $team['players'][] = $filtered_input['player_name'];
    array_to_file($file_data, STORAGE_FILE);
    $player_data = json_encode([
        'name' => $filtered_input['player_name'],
        'team_index' => $team_index,
    ]);
    setcookie(PLAYER_COOKIE, $player_data, time() + 3600, '/');
}



// Get all data from $_POST
$input = get_form_input($form);

// If any data was entered, validate the input
if (!empty($input)) {
    $success = validate_form($input, $form);
    $message = $success ? 'Cool!' : 'Not Cool!';
}
var_dump($input);
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
