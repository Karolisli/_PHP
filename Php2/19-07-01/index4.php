<?php

var_dump($_POST);
// gauna input 
require 'function\index2.php';
function get_form_input($form) {
    $filter_parameters = [];

    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['filter'])) {
            $filter_parameters[$field_id] = $field['filter'];
        } else {
            $filter_parameters[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;
        }
    }

    return filter_input_array(INPUT_POST, $filter_parameters);
}
// tikrina ar yra validators
function validate_form($filtered_input, &$form) {
    $success = true;

    foreach ($form['fields'] as $field_id => &$field) {
        $field_value = $filtered_input[$field_id];
        $field['value'] = $field_value;
        if (isset($field['validators'])) {
            foreach ($field['validators'] as $validator) {
                $is_valid = $validator($field_value, $field);
                if (!$is_valid) {
                    $success = false;
                    break;
                }
            }
        }
    }
    if ($success) {
        if (isset($form['callbacks']['success'])) {
            $form['callbacks']['success']($filtered_input, $form);
        }
    } else {
        if (isset($form['callbacks']['fail'])) {
            $form['callbacks']['fail']($filtered_input, $form);
        }
    }
    return $success;
}
// gerai ismokt V
function form_success($filtered_input, &$form) {
    $new_data = [];
    $old_data = file_to_array('posted_data.txt');

    if(!empty($old_data)){
        $new_data = $old_data;
    }    

    $new_data[] = $filtered_input;
    array_to_file($new_data, 'posted_data.txt');
}

function form_fail($filtered_input, &$form) {
    print 'Fail, please write something';
}

function validate_not_empty($field_input, &$field) {
    if (strlen($field_input) == 0) {
        $field['error'] = 'Laukas tuscias';
    } else {
        return true;
    }
}

$form = [
    'action' => 'index4.php',
    'method' => 'POST',
    'callbacks' => [
        'success' => 'form_success',
        'fail' => 'form_fail'
    ],
    'fields' => [
        'first_name' => [
            'label' => 'Vardas',
            'type' => 'text',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
            'placeholder' => 'Onutė'
        ],
        'second_name' => [
            'label' => 'Pavardė',
            'type' => 'text',
            'validators' => [
                'validate_not_empty',
            ],
            'value' => '',
            'placeholder' => 'Kimarinskienė'
        ],
        'age' => [
            'label' => 'amzius',
            'type' => 'text',
            'value' => '',
            'validators' => [
                'validate_not_empty',
            ],
            'placeholder' => 'amzius',
            'filter' => FILTER_SANITIZE_NUMBER_INT,
        ],
    ]
];

$filtered_input = get_form_input($form);

if ($filtered_input) {
    validate_form($filtered_input, $form);
}

$data = file_to_array('posted_data.txt');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>06.01</title>
        <!-- <link rel="stylesheet" type="text/css" href="include/normalise.css">
        <link rel="stylesheet" type="text/css" href="include/style.css"> -->
    </head>
    <body>
        <form action="<?php print $form['action']; ?>" method="<?php print $form['method']; ?>">
            <?php foreach ($form['fields'] as $key => $input): ?>

                <?php if (isset($input['label'])): ?>
                    <label for="<?php print $key; ?>"><?php print $input['label']; ?></label>
                <?php endif; ?>

                <input name="<?php print $key; ?>"
                       type="<?php print $input['type']; ?>"
                       value="<?php print $input['value']; ?>"
                       placeholder="<?php print $input['placeholder']; ?>">

                    <?php if (isset($input['error'])): ?>
                        <span class="error"><?php print $input['error']; ?></span>
                    <?php endif; ?>

            <?php endforeach; ?>
            <!-- TO DO -->
            <button>Submit</button>
        </form>
        <table>
            <?php foreach ($data as $row): ?>
            <tr>
                <?php foreach($row as $column): ?>
                    <td><?php print $column ;?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>