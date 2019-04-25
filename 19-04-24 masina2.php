<?php

    $car_price_new = 30000; //eur
    $nuvertejimas_per_month = 0.02; // nuo easmos vertes per menesi
    $santaupos = 15000;//eur
    $car_price_used = $car_price_new;
    
    for ($months=0; $months >= 0; $months++) {
        $car_price_used -= $car_price_used * $nuvertejimas_per_month;
        
        if($santaupos >= $car_price_used){
            break;
        }
    }
    $likutis= $santaupos - $car_price_used;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Masina2</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <p>Po <?php echo $months;?> menesiu, masinos verte bus <?php echo $car_price_used;?>.</p>
        <p>Nusipirkus tau dar liks <?php echo $likutis;?> eur.</p>
    </body>
</html>