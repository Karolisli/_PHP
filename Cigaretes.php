<?php

$days = 365;
$pakelio_kaina = 3.75;
$vienos_cizos_price = 3.75 / 20;
$surukyta = 0;
$prarukytaeuru = 0;
$nesurukyti_mon_thu_eurai = 0;
$viso_min = 0;
$ciklo_min = 0;
$i=0;

for ($day = 0; $day < 365; $day++) {
    $weekday = date('N', strtotime("+$day days"));
    $cizos_mon_thu = rand(15, 20);
    $cizos_fri = rand(20, 40);
    $cizos_sat_sun = rand(10, 20);
    if ($weekday <= 4) {
        $cizu_kaina = $cizos_mon_thu * $vienos_cizos_price;
        $surukyta += $cizos_mon_thu;
        $prarukytaeuru += $cizu_kaina;
        $nesurukyti_mon_thu_eurai += $cizu_kaina;
        $viso_min = $surukyta * 5;
        $ciklo_min = $cizos_mon_thu * 5;
        
    } elseif ($weekday == 5) {
        $cizu_kaina = $cizos_fri * $vienos_cizos_price;
        $surukyta += $cizos_fri;
        $prarukytaeuru += $cizu_kaina;
        $viso_min = $surukyta * 5;
        $ciklo_min = $cizos_fri * 5;
        
    } elseif ($weekday >= 6) {
        $cizu_kaina = $cizos_sat_sun * $vienos_cizos_price;
        $surukyta += $cizos_sat_sun;
        $prarukytaeuru += $cizu_kaina;
        $viso_min = $surukyta * 5;
        $ciklo_min = $cizos_sat_sun * 5;
        
    }
  for($i; $i<=$surukyta; $i++){
      $div.= "<div class=\"image\"></div>";
  }
}
$viso_hours = $viso_min / 60;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ciklai</title>
        <style type="text/css">
            .image{
                background-image: url(https://proxy.duckduckgo.com/iu/?u=http%3A%2F%2Fpngimg.com%2Fuploads%2Fcigarette%2Fcigarette_PNG4751.png&f=1);
                background-size: cover;
                width: 30px;
                height: 30px;
            }
            #cigaretes{
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: flex-start;
                align-items: stretch;
                align-content: stretch;
            }
        </style>
    </head>
    <body>    
       <h4> 
           Viso bus surukyta <?php print $surukyta; ?> vnt. uz <?php echo (round($prarukytaeuru)); ?> eur.<br> Jei nerukyciau pirmadieni-ketvirtadieni, tai sutaupyciau <?php echo (round($nesurukyti_mon_thu_eurai)); ?> eur. Viso rukyta <?php echo (round($viso_hours)); ?> val.
       </h4>           
            <div id="cigaretes">
                <?php print $div;?>
            </div>
        
    </body>
</html>