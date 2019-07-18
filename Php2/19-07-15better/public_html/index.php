<?php
// Uzkraunam visus reikalingus failus
require '../config.php';
require '../functions/file.php';
require '../functions/html/builder.php';
require '../functions/form/core.php';

session_start();

function validate_user(){
    $file_data = file_to_array(STORAGE_FILE);
    $cookie_mails = $_SESSION['email'] ?? '';

    if ($file_data) {
        foreach ($file_data as $file_id => $files) {
            if ($files['email'] == $cookie_mails) {
                return $files['first'];
            }
        }
    }
}

$user_name = validate_user();

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
        <h1>
            <?php print 'Welcome' .' '.$user_name; ?>
        </h1>  
        <!-- $form HTML generator -->
    </body>
</html>
