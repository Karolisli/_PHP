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
        'first_name'=> [
            'type' => 'text',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ]
            ],
            'name' => 'first_name',
            'placeholder' => 'First name'
        ],
        'last_name'=> [
            'type' => 'text',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                ]
            ],
            'name' => 'last_name',
            'placeholder' => 'Last name'
        ],
        'email' => [
            'type' => 'email',
            'extra' => [
                'validators' => [
                    'validate_not_empty',
                    'validate_duplicate'
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
        'first' => $filtered_input['first_name'],
        'last' => $filtered_input['last_name'],
        'email' => $filtered_input['email'],
        'pass' => $filtered_input['password'],
    ];

    // $_SESSION['teams'][] = $here;

    $data = [];
    $file_data = file_to_array(STORAGE_FILE);
    if ($file_data) {
        $data = $file_data;
    }

    $data[] = $here;

    array_to_file($data, STORAGE_FILE);

}

function form_fail($filtered_input, &$form) {
       var_dump('Form failed!');
    }
    
function validate_duplicate($field_input, &$field){
    $file_data = file_to_array(STORAGE_FILE);

    if ($file_data) {
        foreach ($file_data as $file_id => $files) {
            if ($field_input == $files['email']) {
                var_dump('Toks jau yra!');
                return false;
            }
        }
    }
    return true;
}




$input = get_form_input($form);

if (!empty($input)) {
    $success = validate_form($input, $form);
    // $message = $success ? 'Nauja komanda sukurta' : 'Klaida!';
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
        <?php require ROOT . '/templates/navigation.tpl.php'; ?>        
        <h1>
            Welcome to the GAME!!!
        </h1>
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
        <button>Submit</button>
        </form>
        <!-- $form HTML generator -->
        <table>
        <?php if (!empty($_SESSION)): ?>
        <?php foreach ($_SESSION['teams'] as $key => $value): ?>
            <tr>
                <td>
                    <?php print $value['first']; ?>
                </td>
                <td>
                    <?php print $value['last']; ?>
                </td>
                <td>
                    <?php print $value['email']; ?>
                </td>
                <td>
                    <?php print $value['pass']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
        </table>
    </body>
</html>
