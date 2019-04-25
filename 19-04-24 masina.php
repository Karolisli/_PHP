<?php

    $car_price_new = 30000; //eur
    $nuvertejimas_per_month = 0.02; // nuo easmos vertes per menesi
    $months = 24;//men
    $car_price_used = $car_price_new;
    
    for ($months; $months > 0; --$months) {
        $car_price_used -= $car_price_used * $nuvertejimas_per_month; //X=X*0.02
        }
            $nuvertejo = ($car_price_used / $car_price_new)* 100;     //Z=(X/30000)*100

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Masina</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <p>Po 24 menesiu, masinos verte bus <?php echo(round($car_price_used));?> Eur.</p>
        <p>Nuvertejo <?php echo (round($nuvertejo));?> procentu.</p>
    </body>
</html>