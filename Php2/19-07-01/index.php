<?php

$url = "https://gist.githubusercontent.com/Goles/3196253/raw/9ca4e7e62ea5ad935bb3580dc0a07d9df033b451/CountryCodes.json";
$file = file_get_contents($url);
$decode = json_decode($file, true);

?>

<!DOCTYPE html>
<html>
<head>
    <meta carset="UTF-8">
    <meta name="viewport">
    <title>active list</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<form method="POST">
    <select name="list">
        <?php foreach($decode as $key => $value): ?>
            <option value="<?php print $key; ?>"><?php print $value['name']; ?></option>
        <?php endforeach; ?>
    </select>

        <?php if(isset($_POST['send'])):?>
            <input type="text" value="<?php print $decode[$_POST['list']]['dial_code'] ;?>"> 
        <?php endif; ?>

    <button name='send' type="submit">Submit</button>
</form>
</body>
</html>