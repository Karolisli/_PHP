<?php
// Uzkraunam visus reikalingus failus
require '../config.php';
require '../functions/file.php';
require '../functions/html/builder.php';
require '../functions/form/core.php';

$form = [
    'action' => '',
    'method' => 'POST',
    'fields' => [
        'email' => [
            'type' => 'email',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ]
            ],
            'name' => 'email',
            'placeholder' => 'E-mail'
        ],
        'password' => [
            'type' => 'password',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ]
            ],
            'name' => 'password',
            'placeholder' => 'Password'
        ],
    ],
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
];

session_start();

function form_success($filtered_input, &$form) {
    $here = [
        'email' => $filtered_input['email'],
        'pass' => $filtered_input['password'],
    ];

    $_SESSION = $here;
}

function form_fail($filtered_input, &$form) {
        var_dump('fail');
    }

$input = get_form_input($form);

if (!empty($input)) {
    $success = validate_form($input, $form);
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

        <form action='<?php print $form['action']; ?>' method='<?php print $form['method']; ?>'>
            
        <?php foreach($form['fields'] as $field_id => $field): ?>
        <input 
        type='<?php print $field['type']; ?>' 
        placeholder='<?php print $field['placeholder']; ?>' 
        name='<?php print $field['name']; ?>'><br>
        <?php endforeach; ?>
        <button>Login</button>
        </form>
        <!-- $form HTML generator -->
    </body>
</html>
