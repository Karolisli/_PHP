<?php
// Uzkraunam visus reikalingus failus
require '../config.php';
require '../functions/file.php';
require '../functions/html/builder.php';
require '../functions/form/core.php';
require '../templates/form/input.tpl.php';




$form = [
    'action' => '',
    'method' => 'POST',
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
    'fields' => [
        'first_name'=> [
            'type' => 'text',
            'validators' => [
                'validate_not_empty',
                'validate_duplicate'
            ],
            'name' => 'first',
            'placeholder' => 'First name'
        ],
        'last_name'=> [
            'type' => 'text',
            'validators' => [
                'validate_not_empty',
                'validate_duplicate'
            ],
            'name' => 'last',
            'placeholder' => 'Last name'
        ],
        'email' => [
            'type' => 'email',
            'validators' => [
                'validate_not_empty',
                'validate_duplicate'
            ],
            'name' => 'email',
            'placeholder' => 'E-mail'
        ],
        'password' => [
            'type' => 'password',
            'validators' => [
                'validate_not_empty',
                'validate_duplicate'
            ],
            'name' => 'pass',
            'placeholder' => 'Password'
        ],
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ]
];

function validate_duplicate($field_input, &$field) {
    $file_data = file_to_array(STORAGE_FILE);
    if ($file_data) {
        
    }
    return true;
}

function form_fail($filtered_input, &$form) {
//    var_dump('Form failed!');
}

function form_success($filtered_input, &$form) {
    $name = [
        'f-name' => $filtered_input['first_name'],
        'l-name' => $filtered_input['last_name'],
        'e-mail' => $filtered_input['email'],
    ];

    $data = [];
    $file_data = file_to_array(STORAGE_FILE);
    if ($file_data) {
        $data = $file_data;
    }

    $data[] = $name;
    array_to_file($data, STORAGE_FILE);
}

$input = get_form_input($form);

if (!empty($input)) {
    $success = validate_form($input, $form);
    $message = $success ? 'Registracija sekminga' : 'Klaida!';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome To PHP FightClub!</title>
        <link rel="stylesheet" href="media/css/normalize.css">
        <link rel="stylesheet" href="media/css/style.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
        <script src="media/js/app.js"></script>    
    </head>
    <body>
        <!-- $nav Navigation generator -->
        <?php require '../templates/navigation.tpl.php'; ?>        

        <?php if (isset($message)): ?>
            <div class="message">
                <span class="text"><?php print $message; ?></span>
                <span class="close">X</span>
            </div>
        <?php endif; ?>

        <!-- $form HTML generator -->
        <?php require '../templates/form.tpl.php'; ?>
    </body>
</html>
