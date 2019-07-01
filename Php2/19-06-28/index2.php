<?php


var_dump($_POST);
function get_form_input($form) {
    $filter_parameters = [];
    
    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['filter'])){
            $filter_parameters[$field_id] = $field['filter'];
        } else {
            $filter_parameters[$field_id] = FILTER_SANITIZE_SPECIAL_CHARS;            
        } 
    }
    
    return filter_input_array(INPUT_POST, $filter_parameters);
}

function validate_form($filtered_input, &$form) {
    $succsess = true;

    foreach ($form['fields'] as $field_id => &$field) {
        $field_value = $filtered_input[$field_id];
        $field['value'] = $field_value;
        if (isset($field['validators'])) {
            foreach ($field['validators'] as $validator) {
               $is_valid = $validator($field_value, $field);
               if(!$is_valid){
                    $succsess = false;
                    break;
               }
            }   
        }
    }
    
    if($succsess){
        if(isset($field['callbacks']['succsess'])){
            $form['callbacks']['succsess']($filtered_input, $form);
        }
    }else{
        if(isset($field['callbacks']['fail'])){
            $form['callbacks']['fail']($filtered_input, $form);
        }
    }
    return $succsess;
}

function form_succsess($filtered_input, &$form){
    print 'ok';
}

function form_fail($filtered_input, &$form){
    print 'not ok';
}

function validate_not_empty($field_input, &$field) {
    if (strlen($field_input) == 0) {
        $field['error'] = 'Laukas tuscias';
    } else {
        return true;
    }
}

$form = [
    'action' => 'index2.php',
    'method' => 'POST',
    'fields' => [
    'callbacks' => [
        'succsess' => 'form_succsess',
        'fail' => 'form_fail'
        ],
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
        'third_name' => [
            'label' => 'Pavardė',
            'type' => 'text',
            'validators' => [
                'validate_not_empty',
            ],
            'value' => '',
            'placeholder' => 'Kimarinskienė'
        ]
    ]
];

$filtered_input = get_form_input($form);
validate_form($filtered_input, $form);

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>06.25</title>
        <link rel="stylesheet" type="text/css" href="include/normalise.css">
        <link rel="stylesheet" type="text/css" href="include/style.css">
    </head>
    <body>
        <form action="<?php print $form['action']; ?>" method="<?php print $form['method']; ?>">
            <?php foreach ($form['fields'] as $key => $input): ?>
                <?php if (isset($input['label'])): ?>
                    <label for="<?php print $key; ?>"><?php print $input['label']; ?></label>
                <?php endif; ?>
                
                <input 
                name="<?php print $key; ?>" 
                type="<?php print $input['type']; ?>" 
                placeholder="<?php print $input['placeholder']; ?>">

                <?php if (isset($input['error'])): ?>
                    <span class="error"><?php print $input['error']; ?></span>
                <?php endif; ?>    
            <?php endforeach; ?>
            <!-- TO DO -->
            <button>Submit</button>
        </form>
    </body>
</html>